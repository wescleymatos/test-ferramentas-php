<?php

namespace App\Domain\Contracts\Repositories;

use App\Domain\Entities\Group;

interface GroupRepositoryInterface
{
    public function create(Group $group): int;
    public function update(Group $group);
    public function delete(Group $group);
    public function get(int $id): Group;
}
