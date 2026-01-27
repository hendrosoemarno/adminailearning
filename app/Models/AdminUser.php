<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class AdminUser extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'ai_useradmin';

    protected $fillable = [
        'username',
        'password',
        'nama',
    ];

    protected $hidden = [
        'password',
    ];

    public $timestamps = false;
}
