<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserModel extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'username',
        'user_type',
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'phone',
        'password',
        'gender',
        'address1',
        'address2',
        'state',
        'country',
        'pin',
        'nationality',
        'is_active',
        'is_blocked',
        'is_deleted',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'is_active' => 'boolean',
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