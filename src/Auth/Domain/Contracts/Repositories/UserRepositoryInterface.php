<?php

namespace Auth\Domain\Contracts\Repositories;

use Auth\Domain\Entities\User;

interface UserRepositoryInterface
{
    public function create(User $user): int;
    public function update(User $user);
    public function delete(User $user);
    public function get(int $id): User;
}
