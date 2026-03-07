<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SettingModel extends Model
{
    protected $table = 'settings';

    protected $fillable = [
        'setting_key',
        'setting_value',
        'is_blocked',
        'is_deleted',
    ];

    protected $casts = [
        'is_blocked' => 'boolean',
        'is_deleted' => 'boolean',
    ];

    protected static function booted()
    {
        static::addGlobalScope('active', function ($query) {
            $query->where('is_blocked', false)
                  ->where('is_deleted', false);
        });
    }
}