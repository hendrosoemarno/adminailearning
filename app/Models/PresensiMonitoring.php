<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresensiMonitoring extends Model
{
    use HasFactory;

    protected $table = 'ai__presensi_monitoring';

    protected $fillable = [
        'id_useradmin',
        'id_tentor',
        'id_siswa',
        'tgl_input',
        'tgl_monitoring'
    ];

    public $timestamps = false;

    public function admin()
    {
        return $this->belongsTo(AdminUser::class, 'id_useradmin');
    }

    public function tentor()
    {
        return $this->belongsTo(Tentor::class, 'id_tentor');
    }

    public function siswa()
    {
        return $this->belongsTo(MoodleUser::class, 'id_siswa');
    }
}
