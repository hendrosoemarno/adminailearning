<?php

namespace App\Http\Controllers\Tentor;

use App\Http\Controllers\Controller;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PresensiController extends Controller
{
    public function index()
    {
        $tentor = Auth::guard('tentor')->user();
        $presensis = Presensi::where('id_tentor', $tentor->id)
            ->with('siswa')
            ->orderBy('tgl_kbm', 'desc')
            ->orderBy('tgl_input', 'desc')
            ->get();

        return view('tentor-portal.presensi.index', compact('presensis'));
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
