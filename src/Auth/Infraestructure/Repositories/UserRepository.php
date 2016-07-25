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
        $this->context = $context->getContext();
    }

    public function create(User $user)
    {
        $this->context->merge($user);
        $this->context->flush();
    }

    public function update(User $user)
    {
        $this->context->merge($user);
        $this->context->flush();
    }

    public function delete(User $user)
    {
        $this->context->remove($user);
        $this->context->flush();
    }

    public function get(int $id): User
    {
        return $this->context->find('Auth\Domain\Entities\User', $id);
    }
}
