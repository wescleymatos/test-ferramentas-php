<?php

namespace Infraestructure\Repositories;

use Domain\Contracts\Repositories\GroupRepositoryInterface;
use Domain\Entities\Group;
use Infraestructure\DbContext;

class GroupRepository implements GroupRepositoryInterface
{
    private $context;

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

    public function get(int $id): Group
    {
        return $this->context->find('Domain\Entities\Group', $id);
    }
}
