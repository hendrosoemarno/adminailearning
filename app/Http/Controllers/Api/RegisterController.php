<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $rowNumber = $request->input('row_number');
        $data = $request->input('data', []);

        $username = strtolower(trim($data['username'] ?? ''));
        $email = strtolower(trim($data['email'] ?? ''));

        $validator = Validator::make($data, [
            'username' => 'required|string|unique:mdlu6_user,username',
            'email' => 'required|email|unique:mdlu6_user,email',
            'password' => 'required|string',
            'firstname' => 'required|string',
            'lastname' => 'nullable|string',
            'nama' => 'nullable|string',
            'nickname' => 'nullable|string',
            'kursus' => 'nullable|in:Matematika,Bahasa Inggris,Junior Coder',
            'kelas' => 'nullable|string',
            'tempat_lahir' => 'nullable|string',
            'tgl_lahir' => 'nullable|integer',
            'gender' => 'nullable|in:Laki-laki,Perempuan',
            'agama' => 'nullable|in:islam,kristen,katolik,hindu,budha',
            'alamat' => 'nullable|string',
            'nama_ortu' => 'nullable|string',
            'wa_ortu' => 'nullable|string',
            'nama_sekolah' => 'nullable|string',
            'nama_perekom' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validasi gagal',
                'row_number' => $rowNumber,
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            DB::beginTransaction();

            $now = time();
            $namaLengkap = trim(($data['nama'] ?? '') ?: (($data['firstname'] ?? '') . ' ' . ($data['lastname'] ?? '')));
            $passwordRaw = $data['password'];

            // Normalize WA number (+62)
            $waOrtu = trim($data['wa_ortu'] ?? '');
            if ($waOrtu !== '') {
                if (strpos($waOrtu, '+62') !== 0) {
                    if (strpos($waOrtu, '0') === 0) {
                        $waOrtu = '+62' . substr($waOrtu, 1);
                    } else {
                        $waOrtu = '+62' . $waOrtu;
                    }
                }
            }

            // 1. Insert into Moodle user table
            $moodleId = DB::table('mdlu6_user')->insertGetId([
                'auth' => 'manual',
                'confirmed' => 1,
                'mnethostid' => 1,
                'username' => $username,
                'password' => Hash::make($passwordRaw),
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'] ?? '',
                'email' => $email,
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
                'kelas' => $data['kelas'] ?? '',
                'tempat_lahir' => $data['tempat_lahir'] ?? '',
                'tgl_lahir' => $data['tgl_lahir'] ?? null,
                'alamat' => $data['alamat'] ?? '',
                'wa_ortu' => $waOrtu,
                'nama_perekom' => $data['nama_perekom'] ?? '',
                'nama_sekolah' => $data['nama_sekolah'] ?? '',
                'nama_ortu' => $data['nama_ortu'] ?? '',
                'agama' => $data['agama'] ?? 'islam',
                'gender' => $data['gender'] ?? 'Laki-laki',
                'nickname' => $data['nickname'] ?? '',
                'cek' => 1,
                'kelompok' => 0,
                'kursus' => $data['kursus'] ?? '',
            ]);

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Pendaftaran berhasil diproses',
                'row_number' => $rowNumber,
                'data' => [
                    'user_id' => $moodleId,
                    'username' => $username,
                    'email' => $email,
                    'wa_ortu' => $waOrtu,
                    'password' => $passwordRaw,
                ],
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('N8N register failed: ' . $e->getMessage(), [
                'row_number' => $rowNumber,
                'username' => $username,
            ]);

            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan server saat memproses pendaftaran.',
                'row_number' => $rowNumber,
            ], 500);
        }
    }
}
