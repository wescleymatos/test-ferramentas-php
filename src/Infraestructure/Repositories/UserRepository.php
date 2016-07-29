<?php

namespace Infraestructure\Repositories;

use Domain\Contracts\Repositories\UserRepositoryInterface;
use Domain\Entities\User;
use Infraestructure\DbContext;

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
        return $this->context->find('Domain\Entities\User', $id);
    }
}
