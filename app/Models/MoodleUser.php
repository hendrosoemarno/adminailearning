<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class MoodleUser extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'mdlu6_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'password',
        'email',
        'firstname',
        'lastname',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Moodle uses unix timestamps
    const CREATED_AT = 'timecreated';
    const UPDATED_AT = 'timemodified';

    // Disable laravel timestamps management if we don't want to mess up moodle logic, 
    // or keep it but ensure format 'U' is used.
    // However, Moodle timestamps are integers.
    // Laravel expects Carbon but can handle 'U'.
    // Better to disable auto timestamps if we are only reading for login to avoid accidental updates?
    // User wants "login yang menggunakan tabel moodle", likely just reading.

    public $timestamps = false; // Easier to just disable unless we need them.

    public function siswaTarifs()
    {
        return $this->hasMany(SiswaTarif::class, 'id_siswa');
    }

    public function getSiswaTarifForTentor($tentorId)
    {
        return $this->siswaTarifs()->where('id_tentor', $tentorId)->first();
    }

    public function tentors()
    {
        return $this->belongsToMany(Tentor::class, 'ai_tentor_siswa', 'id_siswa', 'id_tentor');
    }

    public function detil()
    {
        return $this->hasOne(UserDetil::class, 'id');
    }

    // If we need to write:
    // protected $dateFormat = 'U';
}
