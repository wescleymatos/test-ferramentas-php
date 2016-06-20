<?php

namespace Infraestructure\Repositories;

use Domain\Contracts\Repositories\UserRepositoryInterface;
use Domain\Entities\User;
use Infraestructure\DbContext;

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