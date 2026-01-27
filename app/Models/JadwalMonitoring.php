<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalMonitoring extends Model
{
    use HasFactory;

    protected $table = 'ai_jadwal_monitoring';

    protected $fillable = [
        'id_admin',
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

    public function siswa()
    {
        return $this->belongsTo(MoodleUser::class, 'id_siswa');
    }

    public function admin()
    {
        return $this->belongsTo(AdminUser::class, 'id_admin');
    }
}
