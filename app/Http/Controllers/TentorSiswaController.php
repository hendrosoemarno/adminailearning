<?php

namespace App\Http\Controllers;

use App\Models\Tentor;
use App\Models\MoodleUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TentorSiswaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort', 'nickname');
        $direction = $request->input('direction', 'asc');

        $allowedSorts = ['nama', 'nickname', 'mapel', 'siswas_count'];
        if (!in_array($sort, $allowedSorts)) {
            $sort = 'nickname';
        }

        $query = Tentor::where('aktif', 1)->withCount('siswas');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('nickname', 'like', "%{$search}%");
            });
        }

        $tentors = $query->orderBy($sort, $direction)->get();
        return view('admin.active-tentors', compact('tentors', 'search', 'sort', 'direction'));
    }

    public function manageStudents(Request $request, Tentor $tentor)
    {
        $studentSearch = $request->input('student_search');

        // Bagian 1: Seluruh siswa aktif (suspended = 0)
        $query = MoodleUser::where('suspended', 0)->where('deleted', 0);

        if ($studentSearch) {
            $query->where(function ($q) use ($studentSearch) {
                $q->where('firstname', 'like', "%{$studentSearch}%")
                    ->orWhere('lastname', 'like', "%{$studentSearch}%")
                    ->orWhere('username', 'like', "%{$studentSearch}%");
            });
        }

        $allActiveStudents = $query->orderBy('firstname', 'asc')->get();

        // Bagian 2: Siswa yang terhubung dengan tentor ini
        $assignedStudents = $tentor->siswas()->orderBy('firstname', 'asc')->get();
        $assignedStudentIds = $assignedStudents->pluck('id')->toArray();

        // Filter out assigned students from the "available" list for better UX
        $availableStudents = $allActiveStudents->reject(function ($user) use ($assignedStudentIds) {
            return in_array($user->id, $assignedStudentIds);
        });

        return view('admin.tentor-students', compact('tentor', 'availableStudents', 'assignedStudents', 'studentSearch'));
    }

    public function addStudent(Request $request, Tentor $tentor)
    {
        $studentId = $request->input('id_siswa');

        // Use syncWithoutDetaching to avoid duplicates if already exists
        $tentor->siswas()->syncWithoutDetaching([$studentId]);

        return back()->with('success', 'Siswa berhasil ditambahkan ke tentor.');
    }

    public function removeStudent(Request $request, Tentor $tentor)
    {
        $studentId = $request->input('id_siswa');

        $tentor->siswas()->detach($studentId);

        return back()->with('success', 'Siswa berhasil dikeluarkan dari tentor.');
    }

    public function showSchedule(Tentor $tentor)
    {
        $waktus = \App\Models\Waktu::orderBy('id', 'asc')->get();
        $schedules = \App\Models\JadwalTentor::with(['siswa', 'linkJadwal'])
            ->where('id_tentor', $tentor->id)
            ->get();

        // Map schedule for easy array access [hari][waktu_id]
        $mappedSchedule = [];
        foreach ($schedules as $item) {
            $mappedSchedule[$item->hari][$item->waktu] = $item;
        }

        $hariLabels = [
            1 => 'Senin',
            2 => 'Selasa',
            3 => 'Rabu',
            4 => 'Kamis',
            5 => 'Jumat',
            6 => 'Sabtu',
            7 => 'Ahad'
        ];

        return view('admin.tentor-schedule', compact('tentor', 'waktus', 'mappedSchedule', 'hariLabels'));
    }

    public function editSchedule(Tentor $tentor)
    {
        $waktus = \App\Models\Waktu::orderBy('id', 'asc')->get();
        $schedules = \App\Models\JadwalTentor::with('linkJadwal')
            ->where('id_tentor', $tentor->id)
            ->get();

        // Tentor's assigned students for the dropdown
        $students = $tentor->siswas()->orderBy('firstname', 'asc')->get();

        $mappedSchedule = [];
        foreach ($schedules as $item) {
            $mappedSchedule[$item->hari][$item->waktu] = $item;
        }

        $hariLabels = [
            1 => 'Senin',
            2 => 'Selasa',
            3 => 'Rabu',
            4 => 'Kamis',
            5 => 'Jumat',
            6 => 'Sabtu',
            7 => 'Ahad'
        ];

        return view('admin.tentor-schedule-edit', compact('tentor', 'waktus', 'mappedSchedule', 'hariLabels', 'students'));
    }

    public function updateSchedule(Request $request, Tentor $tentor)
    {
        $inputSchedules = $request->input('schedule', []); // [hari][waktu_id]
        $links = $request->input('links', []); // [hari][waktu_id]

        foreach ($inputSchedules as $hari => $slots) {
            foreach ($slots as $waktuId => $idSiswa) {
                // Find existing
                $existing = \App\Models\JadwalTentor::where('id_tentor', $tentor->id)
                    ->where('hari', $hari)
                    ->where('waktu', $waktuId)
                    ->first();

                if ($idSiswa == "empty") {
                    if ($existing) {
                        // Delete link if exists
                        \App\Models\LinkJadwal::where('id_jadwal', $existing->id)->delete();
                        $existing->delete();
                    }
                } else {
                    if ($existing) {
                        $existing->update(['id_siswa' => $idSiswa]);
                        $jadwalId = $existing->id;
                    } else {
                        $newJadwal = \App\Models\JadwalTentor::create([
                            'id_tentor' => $tentor->id,
                            'hari' => $hari,
                            'waktu' => $waktuId,
                            'id_siswa' => $idSiswa
                        ]);
                        $jadwalId = $newJadwal->id;
                    }

                    // Handle link
                    $linkVal = $links[$hari][$waktuId] ?? null;
                    if ($linkVal) {
                        \App\Models\LinkJadwal::updateOrCreate(
                            ['id_jadwal' => $jadwalId],
                            ['link' => $linkVal]
                        );
                    } else {
                        \App\Models\LinkJadwal::where('id_jadwal', $jadwalId)->delete();
                    }
                }
            }
        }

        return redirect()->route('tentor-siswa.schedule', $tentor)->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function allSchedules()
    {
        $waktus = \App\Models\Waktu::orderBy('id', 'asc')->get();

        $schedules = \App\Models\JadwalTentor::with(['tentor', 'siswa', 'linkJadwal'])
            ->whereHas('tentor', function ($q) {
                $q->where('aktif', 1);
            })
            ->where('id_siswa', '>', 1)
            ->get();

        $mappedSchedule = [];
        foreach ($schedules as $item) {
            $mappedSchedule[$item->hari][$item->waktu][] = $item;
        }

        $hariLabels = [
            1 => 'Senin',
            2 => 'Selasa',
            3 => 'Rabu',
            4 => 'Kamis',
            5 => 'Jumat',
            6 => 'Sabtu',
            7 => 'Ahad'
        ];

        return view('admin.all-schedules', compact('waktus', 'mappedSchedule', 'hariLabels'));
    }

    public function availableSchedules(Request $request)
    {
        $mapel = $request->input('mapel', 'mat');
        $waktus = \App\Models\Waktu::orderBy('id', 'asc')->get();

        $schedules = \App\Models\JadwalTentor::with(['tentor'])
            ->join('ai_tentor', 'ai_jadwal_tentor.id_tentor', '=', 'ai_tentor.id')
            ->where('ai_jadwal_tentor.id_siswa', 1)
            ->where('ai_tentor.mapel', $mapel)
            ->where('ai_tentor.aktif', 1)
            ->select('ai_jadwal_tentor.*')
            ->get();

        $mappedSchedule = [];
        foreach ($schedules as $item) {
            $mappedSchedule[$item->hari][$item->waktu][] = $item;
        }

        $hariLabels = [
            1 => 'Senin',
            2 => 'Selasa',
            3 => 'Rabu',
            4 => 'Kamis',
            5 => 'Jumat',
            6 => 'Sabtu',
            7 => 'Ahad'
        ];

        $title = "Jadwal Bisa - " . ($mapel == 'mat' ? 'Matematika' : ($mapel == 'bing' ? 'Bahasa Inggris' : 'Coding'));

        return view('admin.available-schedules', compact('waktus', 'mappedSchedule', 'hariLabels', 'mapel', 'title'));
    }
}
