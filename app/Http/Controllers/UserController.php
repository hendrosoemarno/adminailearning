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
        $detil = $user->detil;

        if (!$detil) {
            $detil = new \App\Models\UserDetil(['id' => $id]);
            $detil->tgl_daftar = time();
        }

        // Convert timestamps to Y-m-d for HTML5 date input
        if ($detil->tgl_daftar && is_numeric($detil->tgl_daftar)) {
            $detil->tgl_daftar = date('Y-m-d', $detil->tgl_daftar);
        }
        if ($detil->tgl_lahir && is_numeric($detil->tgl_lahir)) {
            $detil->tgl_lahir = date('Y-m-d', $detil->tgl_lahir);
        }

        return view('user.edit', compact('user', 'detil'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nickname' => 'nullable|string|max:255',
            'kelas' => 'nullable',
            'wa_ortu' => 'nullable|string|max:24',
            'nama_ortu' => 'nullable|string|max:255',
            'nama_sekolah' => 'nullable|string|max:255',
            'alamat' => 'nullable|string',
            'tgl_lahir' => 'nullable|date',
            'tempat_lahir' => 'nullable|string|max:255',
            'gender' => 'nullable|string|max:20',
            'agama' => 'nullable|string|max:50',
            'kelompok' => 'nullable',
            'tgl_daftar' => 'nullable|date',
            'nama_perekom' => 'nullable|string|max:255',
        ]);

        $data = $request->except('_token', '_method');

        // Convert dates to timestamps (int) as required by the schema
        if (!empty($data['tgl_lahir'])) {
            $data['tgl_lahir'] = strtotime($data['tgl_lahir']);
        } else {
            $data['tgl_lahir'] = 0;
        }

        if (!empty($data['tgl_daftar'])) {
            $data['tgl_daftar'] = strtotime($data['tgl_daftar']);
        } else {
            $existing = \App\Models\UserDetil::find($id);
            $data['tgl_daftar'] = ($existing && $existing->tgl_daftar) ? $existing->tgl_daftar : time();
        }

        // Handle NOT NULL fields with defaults
        $data['nama'] = $data['nama'] ?? '';
        $data['kelas'] = $data['kelas'] ?? 0;
        $data['tempat_lahir'] = $data['tempat_lahir'] ?? '';
        $data['alamat'] = $data['alamat'] ?? '';
        $data['wa_ortu'] = $data['wa_ortu'] ?? '';
        $data['nama_perekom'] = $data['nama_perekom'] ?? '';
        $data['nama_sekolah'] = $data['nama_sekolah'] ?? '';
        $data['nama_ortu'] = $data['nama_ortu'] ?? '';
        $data['agama'] = !empty($data['agama']) ? $data['agama'] : 'islam'; // Enum NO NULL
        $data['gender'] = !empty($data['gender']) ? $data['gender'] : ''; // Enum NO NULL, but has '' option
        $data['kelompok'] = !empty($data['kelompok']) ? (int) $data['kelompok'] : 0;

        \App\Models\UserDetil::updateOrCreate(
            ['id' => $id],
            $data
        );

        return redirect()->route('dashboard')->with('success', 'Data user berhasil diperbarui');
    }
}
