<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function showForm()
    {
        return view('register');
    }

    /**
     * Check if username already exists in Moodle user table.
     */
    public function checkUsername(Request $request)
    {
        $username = strtolower(trim($request->input('username', '')));

        if (empty($username)) {
            return response()->json(['available' => false, 'message' => 'Username tidak boleh kosong.']);
        }

        if (strlen($username) < 3) {
            return response()->json(['available' => false, 'message' => 'Username minimal 3 karakter.']);
        }

        if (!preg_match('/^[a-z0-9._]+$/', $username)) {
            return response()->json(['available' => false, 'message' => 'Username hanya boleh huruf kecil, angka, titik, dan underscore.']);
        }

        $exists = DB::table('mdlu6_user')->where('username', $username)->exists();

        if ($exists) {
            return response()->json(['available' => false, 'message' => 'Username sudah digunakan.']);
        }

        return response()->json(['available' => true, 'message' => 'Username tersedia.']);
    }

    /**
     * Generate password from nickname + birth year.
     * Rules:
     * - Ucfirst(nickname) + "." + birth_year
     * - If < 8 chars, append 1,2,3... until exactly 8
     */
    public static function generatePassword($nickname, $birthYear)
    {
        $password = ucfirst(strtolower(trim($nickname))) . '.' . $birthYear;

        if (strlen($password) < 8) {
            $counter = 1;
            while (strlen($password) < 8) {
                $password .= $counter;
                $counter++;
            }
        }

        return $password;
    }

    /**
     * AJAX endpoint to preview the generated password.
     */
    public function previewPassword(Request $request)
    {
        $nickname = $request->input('nickname', '');
        $birthDate = $request->input('tgl_lahir', '');

        if (empty($nickname) || empty($birthDate)) {
            return response()->json(['password' => '']);
        }

        $birthYear = date('Y', strtotime($birthDate));
        $password = self::generatePassword($nickname, $birthYear);

        return response()->json(['password' => $password]);
    }

    /**
     * Handle the registration form submission.
     */
    public function register(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:100',
            'lastname' => 'nullable|string|max:100',
            'username' => 'required|string|min:3|max:100|regex:/^[a-z0-9._]+$/',
            'email' => 'required|email|max:100',
            'nickname' => 'required|string|max:30',
            'tgl_lahir' => 'required|date',
            'kelas' => 'required|string|max:10',
            'tempat_lahir' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'wa_ortu' => 'required|string|max:30',
            'nama_ortu' => 'required|string|max:100',
            'nama_sekolah' => 'required|string|max:100',
            'nama_perekom' => 'nullable|string|max:100',
            'agama' => 'required|in:islam,kristen,katolik,hindu,budha',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'kursus' => 'required|in:Matematika,Bahasa Inggris,Junior Coder',
        ], [
            'firstname.required' => 'Nama depan wajib diisi.',
            'username.required' => 'Username wajib diisi.',
            'username.regex' => 'Username hanya boleh huruf kecil, angka, titik, dan underscore.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'nickname.required' => 'Nama panggilan wajib diisi.',
            'tgl_lahir.required' => 'Tanggal lahir wajib diisi.',
            'kelas.required' => 'Kelas wajib diisi.',
            'tempat_lahir.required' => 'Tempat lahir wajib diisi.',
            'alamat.required' => 'Alamat wajib diisi.',
            'wa_ortu.required' => 'No. WhatsApp orang tua wajib diisi.',
            'nama_ortu.required' => 'Nama orang tua wajib diisi.',
            'nama_sekolah.required' => 'Nama sekolah wajib diisi.',
            'agama.required' => 'Agama wajib dipilih.',
            'gender.required' => 'Jenis kelamin wajib dipilih.',
            'kursus.required' => 'Kursus wajib dipilih.',
        ]);

        // Check username uniqueness
        $usernameExists = DB::table('mdlu6_user')
            ->where('username', strtolower($request->username))
            ->exists();

        if ($usernameExists) {
            return back()->withErrors(['username' => 'Username sudah digunakan.'])->withInput();
        }

        // Check email uniqueness
        $emailExists = DB::table('mdlu6_user')
            ->where('email', $request->email)
            ->exists();

        if ($emailExists) {
            return back()->withErrors(['email' => 'Email sudah terdaftar.'])->withInput();
        }

        // Generate password
        $birthYear = date('Y', strtotime($request->tgl_lahir));
        $plainPassword = self::generatePassword($request->nickname, $birthYear);

        // Normalize WA number
        $waOrtu = trim($request->wa_ortu);
        if (strpos($waOrtu, '+62') !== 0) {
            if (strpos($waOrtu, '0') === 0) {
                $waOrtu = '+62' . substr($waOrtu, 1);
            } else {
                $waOrtu = '+62' . $waOrtu;
            }
        }

        $now = time();
        $namaLengkap = trim($request->firstname . ' ' . ($request->lastname ?? ''));

        try {
            DB::beginTransaction();

            // 1. Insert into Moodle user table
            $moodleId = DB::table('mdlu6_user')->insertGetId([
                'auth' => 'manual',
                'confirmed' => 1,
                'mnethostid' => 1,
                'username' => strtolower($request->username),
                'password' => Hash::make($plainPassword),
                'firstname' => $request->firstname,
                'lastname' => $request->lastname ?? '',
                'email' => $request->email,
                'country' => 'ID',
                'lang' => 'en',
                'calendartype' => 'gregorian',
                'timezone' => 'Asia/Jakarta',
                'timecreated' => $now,
                'timemodified' => $now,
                'descriptionformat' => 1,
                'mailformat' => 1,
                'maildisplay' => 2,
                'autosubscribe' => 1,
                // Fields with empty string defaults
                'idnumber' => '',
                'icq' => '',
                'skype' => '',
                'yahoo' => '',
                'aim' => '',
                'msn' => '',
                'phone1' => '',
                'phone2' => '',
                'institution' => '',
                'department' => '',
                'address' => '',
                'city' => '',
                'theme' => '',
                'lastip' => '',
                'secret' => '',
                'url' => '',
            ]);

            // 2. Insert into ai_user_detil
            DB::table('ai_user_detil')->insert([
                'id' => $moodleId,
                'nama' => $namaLengkap,
                'tgl_daftar' => $now,
                'kelas' => $request->kelas,
                'tempat_lahir' => $request->tempat_lahir,
                'tgl_lahir' => strtotime($request->tgl_lahir),
                'alamat' => $request->alamat,
                'wa_ortu' => $waOrtu,
                'nama_perekom' => $request->nama_perekom ?? '-',
                'nama_sekolah' => $request->nama_sekolah,
                'nama_ortu' => $request->nama_ortu,
                'agama' => $request->agama,
                'gender' => $request->gender,
                'nickname' => $request->nickname,
                'cek' => 1,
                'kelompok' => 0,
                'kursus' => $request->kursus,
            ]);

            DB::commit();

            return redirect()->route('register.success')->with([
                'reg_success' => true,
                'reg_nama' => $namaLengkap,
                'reg_username' => strtolower($request->username),
                'reg_password' => $plainPassword,
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Registration failed: ' . $e->getMessage());
            return back()->withErrors(['general' => 'Registrasi gagal. Silakan coba lagi. Error: ' . $e->getMessage()])->withInput();
        }
    }

    public function success()
    {
        if (!session('reg_success')) {
            return redirect()->route('register');
        }
        return view('register_success');
    }
}
