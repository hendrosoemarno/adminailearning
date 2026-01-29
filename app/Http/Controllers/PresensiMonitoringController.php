<?php

namespace App\Http\Controllers;

use App\Models\JadwalMonitoring;
use App\Models\PresensiMonitoring;
use App\Models\Waktu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PresensiMonitoringController extends Controller
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
        $logs = PresensiMonitoring::with(['admin', 'tentor', 'siswa'])
            ->orderBy('tgl_input', 'desc')
            ->get();

        return view('admin.presensi-monitoring.index', compact('logs'));
    }

    public function create()
    {
        $waktus = Waktu::orderBy('id', 'asc')->get();
        $schedules = JadwalMonitoring::with(['tentor', 'siswa'])->get();

        $mappedSchedule = [];
        foreach ($schedules as $item) {
            $mappedSchedule[$item->hari][$item->waktu][] = $item;
        }

        $hariLabels = $this->hariLabels;

        return view('admin.presensi-monitoring.create', compact('waktus', 'mappedSchedule', 'hariLabels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_tentor' => 'required',
            'id_siswa' => 'required',
            'tgl_monitoring' => 'required|date'
        ]);

        PresensiMonitoring::create([
            'id_useradmin' => Auth::id(),
            'id_tentor' => $request->id_tentor,
            'id_siswa' => $request->id_siswa,
            'tgl_input' => time(),
            'tgl_monitoring' => strtotime($request->tgl_monitoring)
        ]);

        return redirect()->route('presensi-monitoring.index')->with('success', 'Berhasil mencatat monitoring.');
    }

    public function edit($id)
    {
        $log = PresensiMonitoring::findOrFail($id);
        return view('admin.presensi-monitoring.edit', compact('log'));
    }

    public function update(Request $request, $id)
    {
        $log = PresensiMonitoring::findOrFail($id);

        $request->validate([
            'tgl_monitoring' => 'required|date'
        ]);

        $log->update([
            'tgl_monitoring' => strtotime($request->tgl_monitoring)
        ]);

        return redirect()->route('presensi-monitoring.index')->with('success', 'Berhasil memperbarui monitoring.');
    }

    public function destroy($id)
    {
        $log = PresensiMonitoring::findOrFail($id);
        $log->delete();

        return redirect()->route('presensi-monitoring.index')->with('success', 'Berhasil menghapus monitoring.');
    }
}
