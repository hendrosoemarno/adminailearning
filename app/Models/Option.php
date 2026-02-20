<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $table = 'ai_options';
    protected $fillable = ['option_key', 'option_value'];

    public static function get($key, $default = null)
    {
        $option = self::where('option_key', $key)->first();
        return $option ? $option->option_value : $default;
    }

    public static function set($key, $value)
    {
        return self::updateOrCreate(
            ['option_key' => $key],
            ['option_value' => $value]
        );
    }
}
