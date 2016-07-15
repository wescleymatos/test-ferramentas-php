<?php

namespace Auth\Domain\Contracts\Repositories;

use Auth\Domain\Entities\Group;

interface GroupRepositoryInterface
{
    public function create(Group $group);
    public function update(Group $group);
    public function delete(Group $group);
    public function get(int $id): Group;
}
