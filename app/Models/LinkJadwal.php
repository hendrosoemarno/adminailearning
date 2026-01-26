<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LinkJadwal extends Model
{
    protected $table = 'ai_link_jadwal';

    protected $fillable = [
        'id_jadwal',
        'link'
    ];

    public $timestamps = false;
}
