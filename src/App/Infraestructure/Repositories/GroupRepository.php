<?php

namespace App\Infraestructure\Repositories;

use App\Domain\Contracts\Repositories\GroupRepositoryInterface;
use App\Domain\Entities\Group;
use App\Infraestructure\DbContext;

class GroupRepository implements GroupRepositoryInterface
{
    private $context;

    public function __construct(DbContext $context)
    {
        $this->context = $context;
    }

    public function create(Group $group)
    {
        $db = $this->context->getContext();
        $db->persist($group);
        $db->flush();
    }

    public function update(Group $group)
    {
        throw new \BadMethodCallException('Not implemented');
    }

    public function delete(Group $group)
    {
        throw new \BadMethodCallException('Not implemented');
    }

    public function get($id)
    {
        $db = $this->context->getContext();
        return $db->find('App\Domain\Entities\Group', $id);
    }
}
