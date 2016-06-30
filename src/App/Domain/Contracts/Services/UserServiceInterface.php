<?php

namespace App\Domain\Contracts\Services;

use App\Domain\Entities\User;

interface UserServiceInterface
{
    public function add(string $name, string $lastName, int $idGroup);
    public function edit(int $id, string $name, string $lastName, int $idGroup);
    public function delete(int $id);
    public function getById(int $id): User;
}
