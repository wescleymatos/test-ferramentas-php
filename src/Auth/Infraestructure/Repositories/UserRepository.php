<?php

namespace Auth\Infraestructure\Repositories;

use Auth\Domain\Contracts\Repositories\UserRepositoryInterface;
use Auth\Domain\Entities\User;
use Auth\Infraestructure\DbContext;

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
