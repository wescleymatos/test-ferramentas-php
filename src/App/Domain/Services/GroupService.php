<?php

namespace App\Domain\Services;

use App\Domain\Contracts\Services\GroupServiceInterface;
use App\Domain\Contracts\Repositories\GroupRepositoryInterface;
use App\Infraestructure\Repositories\GroupRepository;
use App\Domain\Entities\Group;

class GroupService implements GroupServiceInterface
{
    private $groupRepository;

    public function __construct(GroupRepositoryInterface $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }

    public function add($name)
    {
        $group = new Group($name);
        $group->validate();

        $this->groupRepository->create($group);
    }

    public function edit($id, $name)
    {
        $group = $this->getById($id);
        $group->setName($name);
        $group->validate();

        $this->groupRepository->update($group);
    }

    public function delete($id)
    {
        $group = $this->getById($id);

        $this->groupRepository->delete($group);
    }

    public function getById($id)
    {
        $group = $this->groupRepository->get($id);
        if (empty($group)) {
            throw new \InvalidArgumentException('Este grupo está nulo');
        }

        return $group;
    }
}
