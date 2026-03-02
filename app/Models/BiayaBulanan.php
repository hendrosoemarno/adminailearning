<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiayaBulanan extends Model
{
    use HasFactory;

    protected $table = 'ai_biaya_bulanan';
    public $timestamps = false; // Using updated_at manually via DB default

    protected $fillable = [
        'month',
        'id_siswa',
        'id_tentor',
        'id_tarif',
        'tanggal_masuk',
        'custom_total_meet',
        'is_salary_hidden',
        'sort_order',
        'biaya',
        'ai_learning',
        'gaji_tentor',
        'total_meet',
        'realisasi_kbm',
        'updated_at'
    ];

    public function siswa()
    {
        return $this->belongsTo(MoodleUser::class, 'id_siswa');
    }

    public function tentor()
    {
        return $this->belongsTo(Tentor::class, 'id_tentor');
    }

    public function tarif()
    {
        return $this->belongsTo(Tarif::class, 'id_tarif');
    }
}
