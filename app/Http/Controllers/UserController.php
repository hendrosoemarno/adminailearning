<?php

namespace App\Http\Controllers;

use App\Models\MoodleUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $status = $request->input('status', 'active'); // Default to active
        $perPage = $request->input('per_page', 20);
        $sort = $request->input('sort', 'username');
        $direction = $request->input('direction', 'asc');

        // Validate allowed sort columns
        $allowedSorts = ['id', 'username', 'firstname', 'lastname', 'firstaccess', 'wa_ortu', 'kelas'];
        if (!in_array($sort, $allowedSorts)) {
            $sort = 'username';
        }

        $query = MoodleUser::leftJoin('ai_user_detil', 'mdlu6_user.id', '=', 'ai_user_detil.id')
            ->select(
                'mdlu6_user.id',
                'mdlu6_user.username',
                'mdlu6_user.firstname',
                'mdlu6_user.lastname',
                'mdlu6_user.firstaccess',
                'mdlu6_user.suspended',
                'ai_user_detil.wa_ortu',
                'ai_user_detil.kelas',
                'ai_user_detil.nama_ortu'
            );

        if ($status === 'active') {
            $query->where('mdlu6_user.suspended', 0);
        } elseif ($status === 'suspended') {
            $query->where('mdlu6_user.suspended', 1);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('mdlu6_user.firstname', 'like', "%{$search}%")
                    ->orWhere('mdlu6_user.lastname', 'like', "%{$search}%")
                    ->orWhere('mdlu6_user.username', 'like', "%{$search}%")
                    ->orWhere('ai_user_detil.nama_ortu', 'like', "%{$search}%")
                    ->orWhere('ai_user_detil.wa_ortu', 'like', "%{$search}%")
                    ->orWhere(DB::raw("CONCAT(mdlu6_user.firstname, ' ', mdlu6_user.lastname)"), 'like', "%{$search}%");
            });
        }

        $query->orderBy($sort, $direction);

        if ($perPage === 'all') {
            $users = $query->paginate(9999)->appends($request->all());
        } else {
            $users = $query->paginate((int) $perPage)->appends($request->all());
        }

        return view('user.index', compact('users', 'search', 'sort', 'direction', 'status', 'perPage'));
    }

    public function edit($id)
    {
        $user = MoodleUser::findOrFail($id);
        $detil = $user->detil ?? new \App\Models\UserDetil(['id' => $id]);

        return view('user.edit', compact('user', 'detil'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nickname' => 'nullable|string|max:255',
            'kelas' => 'nullable|string|max:50',
            'wa_ortu' => 'nullable|string|max:20',
            'nama_ortu' => 'nullable|string|max:255',
            'nama_sekolah' => 'nullable|string|max:255',
            'alamat' => 'nullable|string',
            'tgl_lahir' => 'nullable|date',
            'tempat_lahir' => 'nullable|string|max:255',
            'gender' => 'nullable|string|max:10',
            'agama' => 'nullable|string|max:50',
            'kelompok' => 'nullable|string|max:100',
        ]);

        \App\Models\UserDetil::updateOrCreate(
            ['id' => $id],
            $request->except('_token', '_method')
        );

        return redirect()->route('dashboard')->with('success', 'Data user berhasil diperbarui');
    }
}
