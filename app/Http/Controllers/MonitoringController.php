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

    public function index(Request $request)
    {
        $admins = \App\Models\AdminUser::orderBy('nama', 'asc')->get();
        $selectedAdminId = $request->input('admin_id', Auth::id());

        $waktus = Waktu::orderBy('id', 'asc')->get();

        // Join with JadwalTentor and LinkJadwal to get the link availability
        $schedules = JadwalMonitoring::with(['tentor', 'siswa'])
            ->where('id_admin', $selectedAdminId)
            ->leftJoin('ai_jadwal_tentor as jt', function ($join) {
                $join->on('ai_jadwal_monitoring.id_tentor', '=', 'jt.id_tentor')
                    ->on('ai_jadwal_monitoring.hari', '=', 'jt.hari')
                    ->on('ai_jadwal_monitoring.waktu', '=', 'jt.waktu')
                    ->on('ai_jadwal_monitoring.id_siswa', '=', 'jt.id_siswa');
            })
            ->leftJoin('ai_link_jadwal as lj', 'jt.id', '=', 'lj.id_jadwal')
            ->select('ai_jadwal_monitoring.*', 'lj.link as meeting_link')
            ->get();

        $mappedSchedule = [];
        foreach ($schedules as $item) {
            $mappedSchedule[$item->hari][$item->waktu][] = $item;
        }

        $hariLabels = $this->hariLabels;

        return view('admin.monitoring.index', compact('waktus', 'mappedSchedule', 'hariLabels', 'admins', 'selectedAdminId'));
    }

    public function edit()
    {
        $waktus = Waktu::orderBy('id', 'asc')->get();

        // Load all active tentor schedules with links
        $allSchedules = JadwalTentor::with(['tentor', 'siswa', 'linkJadwal'])
            ->whereHas('tentor', function ($q) {
                $q->where('aktif', 1);
            })
            ->where('id_siswa', '>', 1)
            ->get();

        // Load currently monitored schedules for the current admin
        $monitored = JadwalMonitoring::where('id_admin', Auth::id())->get();
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
            // Only delete monitoring for the current admin
            JadwalMonitoring::where('id_admin', $adminId)->delete();

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
