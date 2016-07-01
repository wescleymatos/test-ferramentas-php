<?php

namespace Auth\Domain\Services;

use Auth\Domain\Contracts\Services\GroupServiceInterface;
use Auth\Domain\Contracts\Repositories\GroupRepositoryInterface;
use Auth\Infraestructure\Repositories\GroupRepository;
use Auth\Domain\Entities\Group;

class GroupService implements GroupServiceInterface
{
    private $groupRepository;

    public function __construct(GroupRepositoryInterface $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }

    public function add(string $name)
    {
        $group = new Group($name);
        $group->validate();

        $this->groupRepository->create($group);
    }

    public function edit(int $id, string $name)
    {
        $group = $this->getById($id);
        $group->setName($name);
        $group->validate();

        $this->groupRepository->update($group);
    }

    public function delete(int $id)
    {
        $group = $this->getById($id);

        $this->groupRepository->delete($group);
    }

    public function getById(int $id): Group
    {
        $group = $this->groupRepository->get($id);
        if (empty($group)) {
            throw new \InvalidArgumentException('Este grupo está nulo');
        }

        return $group;
    }
}
