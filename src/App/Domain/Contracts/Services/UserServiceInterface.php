<?php

namespace App\Domain\Contracts\Services;

interface UserServiceInterface
{
    public function add($name, $lastName, $idGroup);
    public function edit($id, $name, $lastName);
    public function delete($id);
    public function getById($id);
}
