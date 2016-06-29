<?php

namespace App\Domain\Contracts\Repositories;

use App\Domain\Entities\User;

interface UserRepositoryInterface
{
    public function create(User $user);
}
