<?php

namespace App\Enums\Users;

enum RoleUsers: string
{
    case ADMIN = 'admin';
    case USER = 'user';

    public function label(): string
    {
        return match ($this) {
            self::ADMIN => 'مدیر کل',
            self::USER => 'کاربر عادی',
        };
    }
}
