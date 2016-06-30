<?php

namespace App\Domain\Contracts\Repositories;

use App\Domain\Entities\User;

interface UserRepositoryInterface
{
    public function create(User $user): int;
    public function update(User $user);
    public function delete(User $user);
    public function get(int $id): User;
}
