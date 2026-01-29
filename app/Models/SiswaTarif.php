<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiswaTarif extends Model
{
    use HasFactory;

    protected $table = 'ai_siswa_tarif';

    protected $fillable = [
        'id_siswa',
        'id_tarif',
    ];

    public $timestamps = false;

    public function siswa()
    {
        return $this->belongsTo(MoodleUser::class, 'id_siswa');
    }

    public function tarif()
    {
        return $this->belongsTo(Tarif::class, 'id_tarif');
    }
}
