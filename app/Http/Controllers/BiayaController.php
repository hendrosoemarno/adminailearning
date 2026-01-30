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
            $siswaTarif = $siswa->siswaTarif;

            if ($tarif) {
                // Get custom values or defaults
                $customTotalMeet = $siswaTarif->custom_total_meet;
                $tanggalMasuk = $siswaTarif->tanggal_masuk;

                // Calculate default total meet from package
                preg_match('/\d+/', $tarif->kode, $matches);
                $multiplier = isset($matches[0]) ? (int) $matches[0] : 0;
                $defaultTotalMeet = $multiplier * 4;

                // Use custom or default
                $totalMeet = $customTotalMeet ?? $defaultTotalMeet;

                // Calculate proportions
                $meetRatio = $defaultTotalMeet > 0 ? $totalMeet / $defaultTotalMeet : 1;

                // Calculate Gaji (proportional)
                $gaji = $tarif->tentor * $meetRatio;

                // Calculate Manajemen (proportional)
                $manajemen = $tarif->manajemen * $meetRatio;

                // Calculate Aplikasi (based on tanggal_masuk)
                $aplikasi = $tarif->aplikasi;
                if ($tanggalMasuk) {
                    $day = (int) date('d', strtotime($tanggalMasuk));
                    if ($day > 20) {
                        $aplikasi = $aplikasi * 0.5; // 1/2
                    } elseif ($day >= 11 && $day <= 20) {
                        $aplikasi = $aplikasi * (2 / 3); // 2/3
                    }
                    // else: full (100%)
                }

                $siswa->biaya = $gaji + $manajemen + $aplikasi;
                $siswa->ai_learning = $manajemen + $aplikasi;
                $siswa->gaji_tentor = $gaji;
                $siswa->paket_kode = $tarif->kode;
                $siswa->id_tarif = $tarif->id;
                $siswa->total_meet = $totalMeet;
                $siswa->default_total_meet = $defaultTotalMeet;
                $siswa->tanggal_masuk = $tanggalMasuk;
                $siswa->custom_total_meet = $customTotalMeet;
                $siswa->is_custom = ($customTotalMeet !== null || $tanggalMasuk !== null);
            } else {
                $siswa->biaya = 0;
                $siswa->ai_learning = 0;
                $siswa->gaji_tentor = 0;
                $siswa->paket_kode = '-';
                $siswa->id_tarif = null;
                $siswa->total_meet = 0;
                $siswa->default_total_meet = 0;
                $siswa->tanggal_masuk = null;
                $siswa->custom_total_meet = null;
                $siswa->is_custom = false;
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
        $sort = $request->input('sort', 'id');
        $direction = $request->input('direction', 'asc');

        $siswas = $tentor->siswas()->with(['siswaTarif.tarif'])->get();

        foreach ($siswas as $siswa) {
            $tarif = $siswa->siswaTarif->tarif ?? null;
            $siswaTarif = $siswa->siswaTarif;

            if ($tarif) {
                // Split Kode: "SD 2x" -> Materi: "SD", Paket: "2x"
                $parts = explode(' ', $tarif->kode);
                $siswa->materi = $parts[0] ?? '-';
                $siswa->paket = $parts[1] ?? '-';

                // Get custom values or defaults
                $customTotalMeet = $siswaTarif->custom_total_meet;
                $tanggalMasuk = $siswaTarif->tanggal_masuk;

                // Calculate default total meet from package
                preg_match('/\d+/', $tarif->kode, $matches);
                $multiplier = isset($matches[0]) ? (int) $matches[0] : 0;
                $defaultTotalMeet = $multiplier * 4;

                // Use custom or default
                $totalMeet = $customTotalMeet ?? $defaultTotalMeet;

                // Calculate proportions
                $meetRatio = $defaultTotalMeet > 0 ? $totalMeet / $defaultTotalMeet : 1;

                // Calculate Gaji (proportional) - USING CUSTOM FORMULA
                $gaji = $tarif->tentor * $meetRatio;

                $siswa->gaji = $gaji;
                $siswa->total = $gaji;
                $siswa->total_meet = $totalMeet;

                // Handle custom meet display logic
                if ($customTotalMeet !== null && $customTotalMeet != $defaultTotalMeet) {
                    $siswa->rencana_kbm = $customTotalMeet . "x Pertemuan";
                    $perMeet = $defaultTotalMeet > 0 ? $tarif->tentor / $defaultTotalMeet : 0;
                    $siswa->perhitungan = $customTotalMeet . " x Rp." . number_format($perMeet, 0, ',', '.');
                } else {
                    $siswa->rencana_kbm = "Penuh";
                    $siswa->perhitungan = "-";
                }
            } else {
                $siswa->materi = '-';
                $siswa->paket = '-';
                $siswa->gaji = 0;
                $siswa->total = 0;
                $siswa->total_meet = 0;
                $siswa->rencana_kbm = "Penuh";
                $siswa->perhitungan = "-";
            }

            // Calculate Realisasi KBM
            $siswa->realisasi_kbm = Presensi::where('id_tentor', $tentor->id)
                ->where('id_siswa', $siswa->id)
                ->whereRaw("DATE_FORMAT(FROM_UNIXTIME(tgl_kbm), '%Y-%m') = ?", [$month])
                ->count();
        }

        // Apply Sorting to collection
        if ($direction == 'asc') {
            $siswas = $siswas->sortBy($sort);
        } else {
            $siswas = $siswas->sortByDesc($sort);
        }

        return view('admin.biaya.salary', compact('tentor', 'siswas', 'month', 'sort', 'direction'));
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

    public function updateCustomData(Request $request)
    {
        $request->validate([
            'id_siswa' => 'required|exists:mdlu6_user,id',
            'field' => 'required|in:tanggal_masuk,custom_total_meet',
            'value' => 'nullable'
        ]);

        $siswaTarif = SiswaTarif::where('id_siswa', $request->id_siswa)->firstOrFail();

        // Update field
        if ($request->field == 'tanggal_masuk') {
            $siswaTarif->tanggal_masuk = $request->value ?: null;
        } else {
            $siswaTarif->custom_total_meet = $request->value > 0 ? (int) $request->value : null;
        }
        $siswaTarif->save();

        // Recalculate billing
        $tarif = $siswaTarif->tarif;

        // Calculate default total meet
        preg_match('/\d+/', $tarif->kode, $matches);
        $multiplier = isset($matches[0]) ? (int) $matches[0] : 0;
        $defaultTotalMeet = $multiplier * 4;

        // Use custom or default
        $totalMeet = $siswaTarif->custom_total_meet ?? $defaultTotalMeet;
        $meetRatio = $defaultTotalMeet > 0 ? $totalMeet / $defaultTotalMeet : 1;

        // Calculate Gaji (proportional)
        $gaji = $tarif->tentor * $meetRatio;

        // Calculate Manajemen (proportional)
        $manajemen = $tarif->manajemen * $meetRatio;

        // Calculate Aplikasi (based on tanggal_masuk)
        $aplikasi = $tarif->aplikasi;
        if ($siswaTarif->tanggal_masuk) {
            $day = (int) date('d', strtotime($siswaTarif->tanggal_masuk));
            if ($day > 20) {
                $aplikasi = $aplikasi * 0.5; // 1/2
            } elseif ($day >= 11 && $day <= 20) {
                $aplikasi = $aplikasi * (2 / 3); // 2/3
            }
        }

        $totalBiaya = $gaji + $manajemen + $aplikasi;
        $aiLearning = $manajemen + $aplikasi;

        return response()->json([
            'success' => true,
            'data' => [
                'biaya' => $totalBiaya,
                'ai_learning' => $aiLearning,
                'gaji_tentor' => $gaji,
                'total_meet' => $totalMeet,
                'default_total_meet' => $defaultTotalMeet,
                'is_custom' => ($siswaTarif->custom_total_meet !== null || $siswaTarif->tanggal_masuk !== null)
            ]
        ]);
    }
}
