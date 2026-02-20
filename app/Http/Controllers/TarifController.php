<?php

namespace App\Http\Controllers;

use App\Models\Tarif;
use App\Models\TarifLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TarifController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->input('sort', 'mapel');
        $direction = $request->input('direction', 'asc');

        $query = Tarif::query();

        if ($sort === 'total') {
            $query->select('*', DB::raw('(aplikasi + manajemen + tentor) AS total_sum'))
                ->orderBy('total_sum', $direction);
        } else {
            $query->orderBy($sort, $direction);
        }

        $tarifs = $query->get();

        return view('admin.tarif.index', compact('tarifs', 'sort', 'direction'));
    }

    public function create()
    {
        return view('admin.tarif.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'mapel' => 'required',
            'kode' => 'required|string|max:20',
            'aplikasi' => 'required|integer',
            'manajemen' => 'required|integer',
            'tentor' => 'required|integer',
        ]);

        DB::transaction(function () use ($request) {
            $tarif = Tarif::create($request->all());

            TarifLog::create([
                'mapel' => $tarif->mapel,
                'kode' => $tarif->kode,
                'aplikasi' => $tarif->aplikasi,
                'manajemen' => $tarif->manajemen,
                'tentor' => $tarif->tentor,
                'tgl_ubah' => time(),
                'tipe_ubah' => 'insert',
                'id_useradmin' => Auth::id(),
            ]);
        });

        return redirect()->route('tarifs.index')->with('success', 'Tarif berhasil ditambahkan.');
    }

    public function edit(Tarif $tarif)
    {
        return view('admin.tarif.edit', compact('tarif'));
    }

    public function update(Request $request, Tarif $tarif)
    {
        $request->validate([
            'mapel' => 'required',
            'kode' => 'required|string|max:20',
            'aplikasi' => 'required|integer',
            'manajemen' => 'required|integer',
            'tentor' => 'required|integer',
        ]);

        DB::transaction(function () use ($request, $tarif) {
            $tarif->update($request->all());

            TarifLog::create([
                'mapel' => $tarif->mapel,
                'kode' => $tarif->kode,
                'aplikasi' => $tarif->aplikasi,
                'manajemen' => $tarif->manajemen,
                'tentor' => $tarif->tentor,
                'tgl_ubah' => time(),
                'tipe_ubah' => 'update',
                'id_useradmin' => Auth::id(),
            ]);
        });

        return redirect()->route('tarifs.index')->with('success', 'Tarif berhasil diperbarui.');
    }

    public function destroy(Tarif $tarif)
    {
        DB::transaction(function () use ($tarif) {
            TarifLog::create([
                'mapel' => $tarif->mapel,
                'kode' => $tarif->kode,
                'aplikasi' => $tarif->aplikasi,
                'manajemen' => $tarif->manajemen,
                'tentor' => $tarif->tentor,
                'tgl_ubah' => time(),
                'tipe_ubah' => 'delete',
                'id_useradmin' => Auth::id(),
            ]);

            $tarif->delete();
        });

        return redirect()->route('tarifs.index')->with('success', 'Tarif berhasil dihapus.');
    }

    public function history()
    {
        $logs = TarifLog::with('admin')->orderBy('tgl_ubah', 'desc')->get();
        return view('admin.tarif.history', compact('logs'));
    }
}
