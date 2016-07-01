<?php

namespace Auth\Domain\Contracts\Services;

use Auth\Domain\Entities\Group;

interface GroupServiceInterface
{
    public function add(string $name);
    public function edit(int $id, string $name);
    public function delete(int $id);
    public function getById(int $id): Group;
}
