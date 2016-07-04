<?php

namespace Auth\Resource\Validation;

class PasswordAssertionConcern
{
    public static function assertIsValid(string $password)
    {
        AssertionConcern.assertArgumentNotEmpty($password, 'Password is not valid.');
    }

    public static function encrypt(string $password): string
    {
        $options = [
            'cost' => 7,
            'salt' => 'BCryptRequer46\467||i65ires22Chrcts46ffr6i8o'
        ];

        return password_hash($password, PASSWORD_BCRYPT, $options);
    }
}
