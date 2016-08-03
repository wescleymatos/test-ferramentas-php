<?php

namespace Domain\Contracts\Services;

use Domain\Entities\Group;

interface GroupServiceInterface
{
    public function add(string $name);
    public function edit(int $id, string $name);
    public function delete(int $id);
    public function getById(int $id): Group;
}
