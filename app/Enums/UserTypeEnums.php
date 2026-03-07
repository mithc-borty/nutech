<?php

namespace App\Enums;

enum UserTypeEnums: string
{
    case super_admin = 'SA';
    case admin       = 'AD';
    case operator    = 'OP';
    case user        = 'US';
    case guest       = 'GU';
    case support     = 'SU';
    case manager     = 'MN';
    case editor      = 'ED';


    public function label(): string
    {
        return match($this) {
            self::super_admin => 'Super Admin',
            self::admin       => 'Admin',
            self::operator    => 'Operator',
            self::user        => 'User',
            self::guest       => 'Guest',
            self::support     => 'Support',
            self::manager     => 'Manager',
            self::editor      => 'Editor',
        };
    }

    public function index(): int
    {
        return match($this) {
            self::super_admin => 1,
            self::admin       => 2,
            self::operator    => 3,
            self::user        => 4,
            self::guest       => 5,
            self::support     => 6,
            self::manager     => 7,
            self::editor      => 8,
        };
    }

    public static function types(): array
    {
        return [
            self::super_admin,
            self::admin,
            self::operator,
            self::user,
            self::guest,
            self::support,
            self::manager,
            self::editor,
        ];
    }
}