<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordResetTokenModel extends Model
{
    protected $table = 'password_reset_tokens';

    protected $fillable = [
        'email',
        'token',
        'otp_code',
        'expires_at',
    ];

    protected $dates = [
        'expires_at',
        'created_at',
        'updated_at',
    ];

    public $timestamps = true;
}