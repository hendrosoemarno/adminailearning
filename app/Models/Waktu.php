<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Waktu extends Model
{
    protected $table = 'ai_waktu';

    protected $fillable = [
        'waktu'
    ];

    public $timestamps = false;
}
