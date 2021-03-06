<?php

namespace Domain\Contracts\Repositories;

use Domain\Entities\User;

interface UserRepositoryInterface
{
    public function create(User $user);
    public function update(User $user);
    public function delete(User $user);
    public function get(int $id): User;
}
