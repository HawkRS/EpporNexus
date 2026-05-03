<?php

namespace App\Constants;

class UserRoles
{
    public const DIRECTOR = 'director';
    public const GERENTE = 'gerente';
    public const VENDEDOR = 'vendedor';

    public static function all(): array
    {
        return [
            self::DIRECTOR,
            self::GERENTE,
            self::VENDEDOR,
        ];
    }
}
