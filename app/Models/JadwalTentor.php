<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalTentor extends Model
{
    protected $table = 'ai_jadwal_tentor';

    protected $fillable = [
        'id_tentor',
        'hari',
        'waktu',
        'id_siswa'
    ];

    public $timestamps = false;

    public function tentor()
    {
        return $this->belongsTo(Tentor::class, 'id_tentor');
    }

    public function timeSlot()
    {
        return $this->belongsTo(Waktu::class, 'waktu');
    }

    public function siswa()
    {
        return $this->belongsTo(MoodleUser::class, 'id_siswa');
    }

    public function linkJadwal()
    {
        return $this->hasOne(LinkJadwal::class, 'id_jadwal');
    }
}
