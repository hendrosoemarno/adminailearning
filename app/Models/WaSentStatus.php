<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaSentStatus extends Model
{
    use HasFactory;

    protected $table = 'ai_wa_sent_status';
    protected $fillable = ['student_id', 'month', 'is_sent'];
}
