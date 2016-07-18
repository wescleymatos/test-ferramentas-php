<?php

namespace Auth\Domain\Contracts\Services;

use Auth\Domain\Entities\User;

interface UserServiceInterface
{
    public function authenticate(string $email, string $password): User;
    public function register(string $name, string $email, string $cpf, string $password, string $confirmPassword, int $idGroup);
    public function changeInformation(string $name, string $email, $cpf, int $idGroup);
    public function changePassword(string $email, string $password, string $newPassword, string $confirmNewPassword);
    public function resetPassword(string $email): string;
    public function remove(string $email);
    public function getByEmail(string $email): User;
}
