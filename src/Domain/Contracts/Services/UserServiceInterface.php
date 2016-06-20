<?php

namespace Domain\Contracts\Services;

interface UserServiceInterface
{
	public function changeName($name, $lastName);
}