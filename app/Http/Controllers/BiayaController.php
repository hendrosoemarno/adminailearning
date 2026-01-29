<?php

namespace App\Http\Controllers;

use App\Models\Tentor;
use App\Models\MoodleUser;
use App\Models\Tarif;
use App\Models\SiswaTarif;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BiayaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort', 'nama');
        $direction = $request->input('direction', 'asc');

        $allowedSorts = ['nama', 'mapel'];
        if (!in_array($sort, $allowedSorts)) {
            $sort = 'nama';
        }

        $query = Tentor::where('aktif', 1);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('nickname', 'like', "%{$search}%");
            });
        }

        $tentors = $query->orderBy($sort, $direction)->get();

        return view('admin.biaya.index', compact('tentors', 'search', 'sort', 'direction'));
    }

    public function show(Request $request, Tentor $tentor)
    {
        $sort = $request->input('sort', 'firstname');
        $direction = $request->input('direction', 'asc');

        // Fetch available packages for the tentor's mapel
        $availablePackages = Tarif::where('mapel', $tentor->mapel)->orderBy('kode', 'asc')->get();

        $siswas = $tentor->siswas()->with(['siswaTarif.tarif'])->get();

        foreach ($siswas as $siswa) {
            $tarif = $siswa->siswaTarif->tarif ?? null;

            if ($tarif) {
                $siswa->biaya = $tarif->aplikasi + $tarif->manajemen + $tarif->tentor;
                $siswa->ai_learning = $tarif->aplikasi + $tarif->manajemen;
                $siswa->gaji_tentor = $tarif->tentor;
                $siswa->paket_kode = $tarif->kode;
                $siswa->id_tarif = $tarif->id;

                // Calculate Total Meet: Extract number from code (e.g., "SD 2x" -> 2)
                preg_match('/\d+/', $tarif->kode, $matches);
                $multiplier = isset($matches[0]) ? (int) $matches[0] : 0;
                $siswa->total_meet = $multiplier * 4;
            } else {
                $siswa->biaya = 0;
                $siswa->ai_learning = 0;
                $siswa->gaji_tentor = 0;
                $siswa->paket_kode = '-';
                $siswa->id_tarif = null;
                $siswa->total_meet = 0;
            }
        }

        // Apply Sorting to collection
        if ($direction == 'asc') {
            $siswas = $siswas->sortBy($sort);
        } else {
            $siswas = $siswas->sortByDesc($sort);
        }

        return view('admin.biaya.show', compact('tentor', 'siswas', 'sort', 'direction', 'availablePackages'));
    }

    public function salary(Request $request, Tentor $tentor)
    {
        $month = $request->input('month', date('Y-m'));
        $siswas = $tentor->siswas()->with(['siswaTarif.tarif'])->get();

        foreach ($siswas as $siswa) {
            $tarif = $siswa->siswaTarif->tarif ?? null;

            if ($tarif) {
                // Split Kode: "SD 2x" -> Materi: "SD", Paket: "2x"
                $parts = explode(' ', $tarif->kode);
                $siswa->materi = $parts[0] ?? '-';
                $siswa->paket = $parts[1] ?? '-';
                $siswa->gaji = $tarif->tentor;
                $siswa->total = $tarif->tentor;

                // Calculate Total Meet
                preg_match('/\d+/', $tarif->kode, $matches);
                $multiplier = isset($matches[0]) ? (int) $matches[0] : 0;
                $siswa->total_meet = $multiplier * 4;
            } else {
                $siswa->materi = '-';
                $siswa->paket = '-';
                $siswa->gaji = 0;
                $siswa->total = 0;
                $siswa->total_meet = 0;
            }

            // Calculate Realisasi KBM
            $siswa->realisasi_kbm = Presensi::where('id_tentor', $tentor->id)
                ->where('id_siswa', $siswa->id)
                ->whereRaw("DATE_FORMAT(FROM_UNIXTIME(tgl_kbm), '%Y-%m') = ?", [$month])
                ->count();

            $siswa->rencana_kbm = "Penuh";
            $siswa->perhitungan = "-";
        }

        return view('admin.biaya.salary', compact('tentor', 'siswas', 'month'));
    }

    public function updatePaket(Request $request)
    {
        $request->validate([
            'id_siswa' => 'required|exists:mdlu6_user,id',
            'id_tarif' => 'required|exists:ai_tarif,id',
        ]);

        $idSiswa = $request->id_siswa;
        $idTarif = $request->id_tarif;

        SiswaTarif::updateOrCreate(
            ['id_siswa' => $idSiswa],
            ['id_tarif' => $idTarif]
        );

        $tarif = Tarif::find($idTarif);

        // Calculate response data
        preg_match('/\d+/', $tarif->kode, $matches);
        $multiplier = isset($matches[0]) ? (int) $matches[0] : 0;
        $totalMeet = $multiplier * 4;

        return response()->json([
            'success' => true,
            'data' => [
                'biaya' => $tarif->aplikasi + $tarif->manajemen + $tarif->tentor,
                'ai_learning' => $tarif->aplikasi + $tarif->manajemen,
                'gaji_tentor' => $tarif->tentor,
                'total_meet' => $totalMeet . ' Pertemuan'
            ]
        ]);
    }
}
