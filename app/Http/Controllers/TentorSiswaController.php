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
        $query = Tentor::where('aktif', 1);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('nickname', 'like', "%{$search}%");
            });
        }

        $tentors = $query->orderBy('nickname', 'asc')->get();
        return view('admin.active-tentors', compact('tentors', 'search'));
    }

    public function manageStudents(Tentor $tentor)
    {
        // Bagian 1: Seluruh siswa aktif (suspended = 0)
        // Moodle users where suspended = 0 are considered active students.
        $allActiveStudents = MoodleUser::where('suspended', 0)
            ->where('deleted', 0)
            ->orderBy('firstname', 'asc')
            ->get();

        // Bagian 2: Siswa yang terhubung dengan tentor ini
        $assignedStudents = $tentor->siswas()->orderBy('firstname', 'asc')->get();
        $assignedStudentIds = $assignedStudents->pluck('id')->toArray();

        // Filter out assigned students from the "available" list for better UX
        $availableStudents = $allActiveStudents->reject(function ($user) use ($assignedStudentIds) {
            return in_array($user->id, $assignedStudentIds);
        });

        return view('admin.tentor-students', compact('tentor', 'availableStudents', 'assignedStudents'));
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
}
