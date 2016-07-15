<?php

namespace Auth\Domain\Contracts\Services;

use Auth\Domain\Entities\User;

interface UserServiceInterface
{
    public function add(string $name, string $email, string $cpf, int $idGroup);
    public function edit(int $id, string $name, string $email, $cpf, int $idGroup);
    public function delete(int $id);
    public function getById(int $id): User;
}
