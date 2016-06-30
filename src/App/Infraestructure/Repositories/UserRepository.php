<?php

namespace App\Infraestructure\Repositories;

use App\Domain\Contracts\Repositories\UserRepositoryInterface;
use App\Domain\Entities\User;
use App\Infraestructure\DbContext;

class UserRepository implements UserRepositoryInterface
{
    private $context;

    public function __construct(DbContext $context)
    {
    }

    public function create(User $user): int
    {
    }

    public function update(User $user)
    {
    }

    public function delete(User $user)
    {
    }

    public function get(int $id): User
    {
    }
}
