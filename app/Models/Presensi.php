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

    protected $casts = [
        'id_tentor' => 'integer',
        'id_siswa' => 'integer',
        'tgl_input' => 'integer',
        'tgl_kbm' => 'integer',
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

    public function getFotoUrlAttribute()
    {
        if (empty($this->foto) || empty($this->getKey())) {
            return null;
        }

        return route('tentor.presensi.foto', $this->getKey());
    }
}
