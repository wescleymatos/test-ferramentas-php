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
        $this->context = $context->getContext();
    }

    public function create(Group $group) :int
    {
        $stm = $this->context->prepare('INSERT INTO groups (name) VALUES (:name)');
        $stm->bindValue(':name', $group->getName(), \PDO::PARAM_STR);

        if (!$stm->execute()) {
            throw new \RuntimeException('Fail to insert group data');
        }

        return $this->context->lastInsertId();
    }

    public function update(Group $group)
    {
        $stm = $this->context->prepare('UPDATE groups SET name = :name WHERE id = :id');
        $stm->bindValue(':id', $group->getId(), \PDO::PARAM_INT);
        $stm->bindValue(':name', $group->getName(), \PDO::PARAM_STR);

        if (!$stm->execute()) {
            throw new \RuntimeException('Fail to update group data');
        }
    }

    public function delete(Group $group)
    {
        $stm = $this->context->prepare('DELETE FROM groups WHERE id = :id');
        $stm->bindValue(':id', $group->getId(), \PDO::PARAM_INT);

        if (!$stm->execute()) {
            throw new \RuntimeException('Fail to delete group data');
        }
    }

    public function get(int $id): Group
    {
        $stm = $this->context->prepare('SELECT * FROM groups WHERE id = :id');
        $stm->bindValue(':id', $id, \PDO::PARAM_INT);

        if (!$stm->execute()) {
            throw new \RuntimeException('Fail to select group data');
        }

        $stm->setFetchMode(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, 'App\Domain\Entities\Group');
        return $stm->fetch();
    }
}
