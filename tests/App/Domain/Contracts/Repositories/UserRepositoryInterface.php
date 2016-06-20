<?php

namespace Domain\Contracts\Repositories;

use Domain\Entities\User;

interface UserRepositoryInterface
{
	public function create(User $user);
}