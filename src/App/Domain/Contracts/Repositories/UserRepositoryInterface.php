<?php

namespace App\Domain\Contracts\Repositories;

use App\Domain\Entities\User;

interface UserRepositoryInterface
{
    public function create(User $user);
    public function update(User $user);
    public function delete(User $user);
    public function get($id);
}
