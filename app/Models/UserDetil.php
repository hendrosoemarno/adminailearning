<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetil extends Model
{
    use HasFactory;

    protected $table = 'ai_user_detil';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'nama',
        'tgl_daftar',
        'kelas',
        'tempat_lahir',
        'tgl_lahir',
        'alamat',
        'wa_ortu',
        'nama_perekom',
        'nama_sekolah',
        'nama_ortu',
        'agama',
        'gender',
        'nickname',
        'cek',
        'kelompok'
    ];

    public function user()
    {
        return $this->belongsTo(MoodleUser::class, 'id');
    }
}
