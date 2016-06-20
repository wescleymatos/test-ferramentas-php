<?php

namespace App\Infraestructure\Repositories;

use App\Domain\Contracts\Repositories\UserRepositoryInterface;
use App\Domain\Entities\User;
use App\Infraestructure\DbContext;

class UserRepository implements UserRepositoryInterface
{
	private $context;

	function __construct(DbContext $context) 
	{
		$this->context = $context;
	}

	public function create(User $user)
	{
		$em = $this->context->getContext();
		$em->persist($user);
		$em->flush();
	}
}