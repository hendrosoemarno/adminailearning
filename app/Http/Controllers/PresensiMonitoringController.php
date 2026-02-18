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

    public function index(Request $request)
    {
        $sort = $request->input('sort', 'tgl_input');
        $direction = $request->input('direction', 'desc');

        $query = PresensiMonitoring::with(['admin', 'tentor', 'siswa']);

        // Handle sorting
        if ($sort === 'admin') {
            $query->leftJoin('useradmins', 'ai_presensi_monitoring.id_useradmin', '=', 'useradmins.id')
                ->orderBy('useradmins.nama', $direction)
                ->select('ai_presensi_monitoring.*');
        } elseif ($sort === 'tentor') {
            $query->leftJoin('ai_tentor', 'ai_presensi_monitoring.id_tentor', '=', 'ai_tentor.id')
                ->orderBy('ai_tentor.nama', $direction)
                ->select('ai_presensi_monitoring.*');
        } elseif ($sort === 'siswa') {
            $query->leftJoin('mdlu6_user', 'ai_presensi_monitoring.id_siswa', '=', 'mdlu6_user.id')
                ->orderBy('mdlu6_user.firstname', $direction)
                ->select('ai_presensi_monitoring.*');
        } else {
            $query->orderBy($sort, $direction);
        }

        $logs = $query->get();

        return view('admin.presensi-monitoring.index', compact('logs', 'sort', 'direction'));
    }

    public function export(Request $request)
    {
        $sort = $request->input('sort', 'tgl_input');
        $direction = $request->input('direction', 'desc');

        $query = PresensiMonitoring::with(['admin', 'tentor', 'siswa']);

        if ($sort === 'admin') {
            $query->leftJoin('useradmins', 'ai_presensi_monitoring.id_useradmin', '=', 'useradmins.id')
                ->orderBy('useradmins.nama', $direction)
                ->select('ai_presensi_monitoring.*');
        } elseif ($sort === 'tentor') {
            $query->leftJoin('ai_tentor', 'ai_presensi_monitoring.id_tentor', '=', 'ai_tentor.id')
                ->orderBy('ai_tentor.nama', $direction)
                ->select('ai_presensi_monitoring.*');
        } elseif ($sort === 'siswa') {
            $query->leftJoin('mdlu6_user', 'ai_presensi_monitoring.id_siswa', '=', 'mdlu6_user.id')
                ->orderBy('mdlu6_user.firstname', $direction)
                ->select('ai_presensi_monitoring.*');
        } else {
            $query->orderBy($sort, $direction);
        }

        $logs = $query->get();

        $fileName = 'Log_Monitoring_' . date('Y-m-d_H-i-s') . '.csv';
        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        $columns = ['Waktu Input', 'Administrator', 'Tentor', 'Siswa', 'Tgl Monitoring'];

        $callback = function () use ($logs, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($logs as $log) {
                fputcsv($file, [
                    date('d-m-Y H:i:s', $log->tgl_input),
                    $log->admin->nama ?? '-',
                    $log->tentor->nama ?? '-',
                    $log->siswa->firstname ?? '-',
                    date('d-m-Y', $log->tgl_monitoring),
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
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
