<?php

namespace App\Domain\Contracts\Services;

interface GroupServiceInterface
{
    public function add($name);
    public function edit($id, $name);
    public function delete($id);
    public function getById($id);
}
