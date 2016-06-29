<?php

namespace App\Infraestructure\Repositories;

use App\Domain\Contracts\Repositories\UserRepositoryInterface;
use App\Domain\Entities\User;
use App\Infraestructure\DbContext;

class UserRepository implements UserRepositoryInterface
{
    private $context;
    const entityNamespace = 'App\Domain\Entities\User';

    public function __construct(DbContext $context)
    {
        $this->context = $context->getContext();
    }

    public function create(User $user)
    {
        $this->context->persist($user);
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

    public function get($id)
    {
        return $this->context->find(self::entityNamespace, $id);
    }
}
