<?php

namespace App\Enums;

enum UserGenderEnums: string
{
    case male   = 'M';
    case female = 'F';
    case other  = 'O';

    public function genderLabel(): string
    {
        return match($this) {
            self::male   => 'Male',
            self::female => 'Female',
            self::other  => 'Other',
        };
    }

    public function all(): array
    {
        return [
            self::male,
            self::female,
            self::other,
        ];
    }

    public static function genders(): array
    {
        return [
            self::male,
            self::female,
            self::other,
        ];
    }
}