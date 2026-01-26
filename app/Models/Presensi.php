<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;

    protected $table = 'ai_presensi';

    protected $fillable = [
        'id_tentor',
        'id_siswa',
        'tgl_input',
        'tgl_kbm',
        'foto'
    ];

    public $timestamps = false;

    public function tentor()
    {
        return $this->belongsTo(Tentor::class, 'id_tentor');
    }

    public function siswa()
    {
        return $this->belongsTo(MoodleUser::class, 'id_siswa');
    }
}
