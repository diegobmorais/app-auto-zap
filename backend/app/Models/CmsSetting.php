<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CmsSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key', 
        'value'
    ];

    // Helper: obter valor com fallback
    public static function get($key, $default = null)
    {
        $setting = static::where('key', $key)->first();
        return $setting?->value ?? $default;
    }

    // Helper: definir valor
    public static function set($key, $value)
    {
        $setting = static::firstOrNew(['key' => $key]);
        $setting->value = $value;
        $setting->save();

        return $setting;
    }

    // Helper: obter múltiplos valores de uma vez
    public static function getMany($keys)
    {
        return static::whereIn('key', $keys)->pluck('value', 'key')->toArray();
    }
}
