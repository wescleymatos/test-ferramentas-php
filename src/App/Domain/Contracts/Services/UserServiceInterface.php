<?php

namespace App\Domain\Contracts\Services;

interface UserServiceInterface
{
	public function changeName($name, $lastName);
}