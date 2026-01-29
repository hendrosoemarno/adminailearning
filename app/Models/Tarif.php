<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    use HasFactory;

    protected $table = 'ai_tarif';

    protected $fillable = [
        'mapel',
        'kode',
        'aplikasi',
        'manajemen',
        'tentor'
    ];

    public $timestamps = false;
}
