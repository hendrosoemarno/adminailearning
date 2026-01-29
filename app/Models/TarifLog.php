<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarifLog extends Model
{
    use HasFactory;

    protected $table = 'ai_tarif_log';

    protected $fillable = [
        'mapel',
        'kode',
        'aplikasi',
        'manajemen',
        'tentor',
        'tgl_ubah',
        'tipe_ubah',
        'id_useradmin'
    ];

    public $timestamps = false;

    public function admin()
    {
        return $this->belongsTo(AdminUser::class, 'id_useradmin');
    }
}
