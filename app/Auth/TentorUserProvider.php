<?php

namespace App\Auth;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Hash;

class TentorUserProvider extends EloquentUserProvider
{
    /**
     * Validate a user's credentials.
     *
     * Password tentor disimpan sebagai MD5 (agar kompatibel dengan aplikasi
     * CodeIgniter yang berbagi database yang sama). Hash TIDAK di-upgrade
     * sehingga password tetap bisa digunakan di kedua aplikasi.
     *
     * Verifikasi tetap mendukung Bcrypt sebagai fallback (untuk data lama
     * yang sudah ter-hash bcrypt), tetapi tidak menyimpan perubahan apa pun.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  array  $credentials
     * @return bool
     */
    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        $plain = $credentials['password'];
        $hash = $user->getAuthPassword();

        // Prioritas: cek MD5 dulu (format utama di CI & Laravel)
        if ($hash === md5($plain)) {
            return true;
        }

        // Fallback: cek bcrypt tanpa mengubah data (untuk kompatibilitas)
        return Hash::check($plain, $hash);
    }
}
