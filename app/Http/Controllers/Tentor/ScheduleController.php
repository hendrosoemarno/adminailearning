<?php

namespace App\Http\Controllers\Tentor;

use App\Http\Controllers\Controller;
use App\Models\Tentor;
use App\Models\JadwalTentor;
use App\Models\LinkJadwal;
use App\Models\Waktu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
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
        $tentor = Auth::guard('tentor')->user();
        $waktus = Waktu::orderBy('id', 'asc')->get();
        $schedules = JadwalTentor::with(['siswa', 'linkJadwal'])
            ->where('id_tentor', $tentor->id)
            ->get();

        $mappedSchedule = [];
        foreach ($schedules as $item) {
            $mappedSchedule[$item->hari][$item->waktu] = $item;
        }

        $hariLabels = $this->hariLabels;

        return view('tentor-portal.schedule.index', compact('tentor', 'waktus', 'mappedSchedule', 'hariLabels'));
    }

    public function edit()
    {
        $tentor = Auth::guard('tentor')->user();
        $waktus = Waktu::orderBy('id', 'asc')->get();
        $schedules = JadwalTentor::with('linkJadwal')
            ->where('id_tentor', $tentor->id)
            ->get();

        $students = $tentor->siswas()->orderBy('firstname', 'asc')->get();

        $mappedSchedule = [];
        foreach ($schedules as $item) {
            $mappedSchedule[$item->hari][$item->waktu] = $item;
        }

        $hariLabels = $this->hariLabels;

        return view('tentor-portal.schedule.edit', compact('tentor', 'waktus', 'mappedSchedule', 'hariLabels', 'students'));
    }

    public function update(Request $request)
    {
        $tentor = Auth::guard('tentor')->user();
        $inputSchedules = $request->input('schedule', []);
        $links = $request->input('links', []);

        foreach ($inputSchedules as $hari => $slots) {
            foreach ($slots as $waktuId => $idSiswa) {
                $existing = JadwalTentor::where('id_tentor', $tentor->id)
                    ->where('hari', $hari)
                    ->where('waktu', $waktuId)
                    ->first();

                if ($idSiswa == "empty") {
                    if ($existing) {
                        LinkJadwal::where('id_jadwal', $existing->id)->delete();
                        $existing->delete();
                    }
                } else {
                    if ($existing) {
                        $existing->update(['id_siswa' => $idSiswa]);
                        $jadwalId = $existing->id;
                    } else {
                        $newJadwal = JadwalTentor::create([
                            'id_tentor' => $tentor->id,
                            'hari' => $hari,
                            'waktu' => $waktuId,
                            'id_siswa' => $idSiswa
                        ]);
                        $jadwalId = $newJadwal->id;
                    }

                    $linkVal = $links[$hari][$waktuId] ?? null;
                    if ($linkVal) {
                        LinkJadwal::updateOrCreate(
                            ['id_jadwal' => $jadwalId],
                            ['link' => $linkVal]
                        );
                    } else {
                        LinkJadwal::where('id_jadwal', $jadwalId)->delete();
                    }
                }
            }
        }

        return redirect()->route('tentor.schedule.index')->with('success', 'Jadwal Anda berhasil diperbarui.');
    }
}
