<?php

namespace App\Http\Controllers\Tentor;

use App\Http\Controllers\Controller;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PresensiController extends Controller
{
    public function index(Request $request)
    {
        $tentor = Auth::guard('tentor')->user();

        $dateFromVal = $request->input('date_from', date('Y-m-d', strtotime('-31 days')));
        $dateToVal = $request->input('date_to', date('Y-m-d'));

        $sortableColumns = ['tgl_kbm', 'tgl_input', 'foto', 'siswa'];
        $sort = in_array($request->input('sort'), $sortableColumns) ? $request->input('sort') : 'tgl_kbm';
        $direction = strtolower($request->input('direction', 'desc')) === 'asc' ? 'asc' : 'desc';

        $query = Presensi::where('id_tentor', $tentor->id)->with('siswa');

        if ($dateFromVal) {
            $query->where('tgl_kbm', '>=', strtotime($dateFromVal . ' 00:00:00'));
        }
        if ($dateToVal) {
            $query->where('tgl_kbm', '<=', strtotime($dateToVal . ' 23:59:59'));
        }

        if ($sort === 'siswa') {
            $query->leftJoin('mdlu6_user', 'ai_presensi.id_siswa', '=', 'mdlu6_user.id')
                ->select('ai_presensi.*')
                ->orderBy('mdlu6_user.firstname', $direction)
                ->orderBy('mdlu6_user.lastname', $direction)
                ->orderBy('ai_presensi.tgl_kbm', 'desc');
        } else {
            $query->orderBy('ai_presensi.' . $sort, $direction);
        }

        $presensis = $query->get();

        return view('tentor-portal.presensi.index', compact('presensis', 'dateFromVal', 'dateToVal', 'sort', 'direction'));
    }

    public function create()
    {
        $tentor = Auth::guard('tentor')->user();
        $siswas = $tentor->siswas()->get();
        return view('tentor-portal.presensi.create', compact('siswas'));
    }

    public function store(Request $request)
    {
        $tentor = Auth::guard('tentor')->user();

        $request->validate([
            'id_siswa' => 'required|exists:mdlu6_user,id',
            'tgl_kbm' => 'required|date',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $fotoPath = $request->file('foto')->store('presensi', 'public');

        Presensi::create([
            'id_tentor' => $tentor->id,
            'id_siswa' => $request->id_siswa,
            'tgl_kbm' => strtotime($request->tgl_kbm),
            'tgl_input' => time(),
            'foto' => $fotoPath
        ]);

        return redirect()->route('tentor.presensi.index')->with('success', 'Presensi berhasil disimpan.');
    }

    public function edit(Presensi $presensi)
    {
        $tentor = Auth::guard('tentor')->user();

        if ($presensi->id_tentor !== $tentor->id) {
            abort(403);
        }

        $siswas = $tentor->siswas()->get();
        return view('tentor-portal.presensi.edit', compact('presensi', 'siswas'));
    }

    public function update(Request $request, Presensi $presensi)
    {
        $tentor = Auth::guard('tentor')->user();

        if ($presensi->id_tentor !== $tentor->id) {
            abort(403);
        }

        $request->validate([
            'id_siswa' => 'required|exists:mdlu6_user,id',
            'tgl_kbm' => 'required|date',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = [
            'id_siswa' => $request->id_siswa,
            'tgl_kbm' => strtotime($request->tgl_kbm),
        ];

        if ($request->hasFile('foto')) {
            // Delete old photo
            if ($presensi->foto) {
                Storage::disk('public')->delete($presensi->foto);
            }
            $data['foto'] = $request->file('foto')->store('presensi', 'public');
        }

        $presensi->update($data);

        return redirect()->route('tentor.presensi.index')->with('success', 'Presensi berhasil diperbarui.');
    }

    public function destroy(Presensi $presensi)
    {
        $tentor = Auth::guard('tentor')->user();

        if ($presensi->id_tentor !== $tentor->id) {
            abort(403);
        }

        if ($presensi->foto) {
            Storage::disk('public')->delete($presensi->foto);
        }

        $presensi->delete();

        return redirect()->route('tentor.presensi.index')->with('success', 'Presensi berhasil dihapus.');
    }
}
