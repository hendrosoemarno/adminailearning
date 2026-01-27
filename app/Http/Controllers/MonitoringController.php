<?php

namespace App\Http\Controllers;

use App\Models\JadwalMonitoring;
use App\Models\JadwalTentor;
use App\Models\Waktu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MonitoringController extends Controller
{
    private $hariLabels = [
        1 => 'Senin',
        2 => 'Selasa',
        3 => 'Rabu',
        4 => 'Kamis',
        5 => 'Jumat',
        6 => 'Sabtu',
        7 => 'Ahad'
    ];

    public function index()
    {
        $waktus = Waktu::orderBy('id', 'asc')->get();
        // We show all monitoring schedules from all admins or just current? 
        // User asked "halaman monitoring di admin", usually means view all that are set to be monitored.
        $schedules = JadwalMonitoring::with(['tentor', 'siswa'])->get();

        $mappedSchedule = [];
        foreach ($schedules as $item) {
            $mappedSchedule[$item->hari][$item->waktu][] = $item;
        }

        $hariLabels = $this->hariLabels;

        return view('admin.monitoring.index', compact('waktus', 'mappedSchedule', 'hariLabels'));
    }

    public function edit()
    {
        $waktus = Waktu::orderBy('id', 'asc')->get();

        // Load all active tentor schedules (Master Jadwal style)
        $allSchedules = JadwalTentor::with(['tentor', 'siswa'])
            ->whereHas('tentor', function ($q) {
                $q->where('aktif', 1);
            })
            ->where('id_siswa', '>', 1)
            ->get();

        // Load currently monitored schedules to check them
        $monitored = JadwalMonitoring::all();
        $monitoredKeys = [];
        foreach ($monitored as $m) {
            $key = "{$m->hari}-{$m->waktu}-{$m->id_tentor}-{$m->id_siswa}";
            $monitoredKeys[$key] = true;
        }

        $mappedAll = [];
        foreach ($allSchedules as $item) {
            $mappedAll[$item->hari][$item->waktu][] = $item;
        }

        $hariLabels = $this->hariLabels;

        return view('admin.monitoring.edit', compact('waktus', 'mappedAll', 'hariLabels', 'monitoredKeys'));
    }

    public function update(Request $request)
    {
        $selected = $request->input('monitor', []); // Array of "hari-waktu-tentor-siswa"
        $adminId = Auth::id();

        // Transaction for safety
        \DB::transaction(function () use ($selected, $adminId) {
            // Simplified: Current implementation clears and rewrites. 
            // In a multi-admin system, we might want to only clear for current admin, 
            // but user said "tabel ai_jadwal_monitoring" which seems to be a shared list of what's being monitored.
            JadwalMonitoring::truncate();

            foreach ($selected as $key) {
                list($hari, $waktu, $idTentor, $idSiswa) = explode('-', $key);
                JadwalMonitoring::create([
                    'id_admin' => $adminId,
                    'id_tentor' => $idTentor,
                    'hari' => $hari,
                    'waktu' => $waktu,
                    'id_siswa' => $idSiswa
                ]);
            }
        });

        return redirect()->route('monitoring.index')->with('success', 'Jadwal monitoring berhasil diperbarui.');
    }
}
