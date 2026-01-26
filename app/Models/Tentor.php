<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Tentor extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'ai_tentor';

    protected $fillable = [
        'email',
        'password',
        'nama',
        'nickname',
        'mapel',
        'alamat',
        'wa',
        'tempat_lahir',
        'tgl_lahir',
        'tahun_lulus',
        'pendidikan_terakhir',
        'ket_pendidikan',
        'aktif'
    ];

    public $timestamps = false;
}
