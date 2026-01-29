<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiswaTarifLog extends Model
{
    use HasFactory;

    protected $table = 'ai_siswa_tarif_log';

    protected $fillable = [
        'id_siswa',
        'id_tarif',
        'id_useradmin',
        'tgl_update',
    ];

    public $timestamps = false;

    public function admin()
    {
        return $this->belongsTo(AdminUser::class, 'id_useradmin');
    }

    public function siswa()
    {
        return $this->belongsTo(MoodleUser::class, 'id_siswa');
    }

    public function tarif()
    {
        return $this->belongsTo(Tarif::class, 'id_tarif');
    }
}
