<?php

namespace App\Infraestructure\Repositories;

use App\Domain\Contracts\Repositories\GroupRepositoryInterface;
use App\Domain\Entities\Group;
use App\Infraestructure\DbContext;

class GroupRepository implements GroupRepositoryInterface
{
    private $context;
    const entityNamespace = 'App\Domain\Entities\Group';

    public function __construct(DbContext $context)
    {
        $this->context = $context->getContext();
    }

    public function create(Group $group)
    {
        $this->context->persist($group);
        $this->context->flush();
    }

    public function update(Group $group)
    {
        $this->context->merge($group);
        $this->context->flush();
    }

    public function delete(Group $group)
    {
        $this->context->remove($group);
        $this->context->flush();
    }

    public function get($id)
    {
        return $this->context->find(self::entityNamespace, $id);
    }
}
