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
        $sort = $request->input('sort', 'id');
        $direction = $request->input('direction', 'desc');

        // Validate allowed sort columns
        $allowedSorts = ['id', 'username', 'firstname', 'lastname', 'tgl_daftar', 'wa_ortu', 'kelas', 'nickname', 'kursus'];
        if (!in_array($sort, $allowedSorts)) {
            $sort = 'id';
        }

        $query = MoodleUser::leftJoin('ai_user_detil', 'mdlu6_user.id', '=', 'ai_user_detil.id')
            ->select(
                'mdlu6_user.id',
                'mdlu6_user.username',
                'mdlu6_user.firstname',
                'mdlu6_user.lastname',
                'mdlu6_user.firstaccess',
                'mdlu6_user.suspended',
                'ai_user_detil.nama',
                'ai_user_detil.tgl_daftar',
                'ai_user_detil.nickname',
                'ai_user_detil.kursus',
                'ai_user_detil.kelas',
                'ai_user_detil.wa_ortu',
                'ai_user_detil.nama_ortu',
                'ai_user_detil.tempat_lahir',
                'ai_user_detil.tgl_lahir',
                'ai_user_detil.alamat',
                'ai_user_detil.nama_sekolah',
                'ai_user_detil.nama_perekom',
                'ai_user_detil.agama',
                'ai_user_detil.gender'
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
            'kursus' => 'nullable|in:Matematika,Bahasa Inggris,Junior Coder',
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
        $data['gender'] = !empty($data['gender']) ? $data['gender'] : 'Laki-laki'; // Fixed enum
        $data['kelompok'] = !empty($data['kelompok']) ? (int) $data['kelompok'] : 0;
        $data['kursus'] = $data['kursus'] ?? '';

        \App\Models\UserDetil::updateOrCreate(
            ['id' => $id],
            $data
        );

        return redirect()->route('dashboard')->with('success', 'Data user berhasil diperbarui');
    }

    public function export(Request $request)
    {
        $ids = $request->input('ids');
        if (empty($ids)) {
            return back()->with('error', 'Pilih data yang ingin diekspor.');
        }

        $users = DB::table('ai_user_detil')
            ->whereIn('id', $ids)
            ->orderBy('id', 'desc')
            ->get();

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="data_siswa_' . date('Ymd_His') . '.csv"',
        ];

        $callback = function () use ($users) {
            $file = fopen('php://output', 'w');
            // Add BOM for Excel UTF-8
            fprintf($file, chr(0xEF) . chr(0xBB) . chr(0xBF));

            // CSV Header
            fputcsv($file, [
                'ID',
                'Nama Lengkap',
                'Tanggal Daftar',
                'Kelas',
                'Tempat Lahir',
                'Tanggal Lahir',
                'Alamat',
                'WA Orang Tua',
                'Nama Orang Tua',
                'Sekolah',
                'Nickname',
                'Kursus',
                'Agama',
                'Gender',
                'Info AI Learning'
            ]);

            foreach ($users as $user) {
                fputcsv($file, [
                    $user->id,
                    $user->nama,
                    date('d/m/Y', $user->tgl_daftar),
                    $user->kelas,
                    $user->tempat_lahir,
                    date('d/m/Y', $user->tgl_lahir),
                    $user->alamat,
                    $user->wa_ortu,
                    $user->nama_ortu,
                    $user->nama_sekolah,
                    $user->nickname,
                    $user->kursus,
                    ucfirst($user->agama),
                    $user->gender,
                    $user->nama_perekom
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
