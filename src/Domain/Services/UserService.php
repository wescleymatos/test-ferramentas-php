<?php

namespace Domain\Services;

use Domain\Contracts\Services\UserServiceInterface;
use Domain\Contracts\Repositories\UserRepositoryInterface;
use Domain\Entities\User;
use Infraestructure\Repositories\UserRepository;

class UserService implements UserServiceInterface
{
	private $userRepository;
	
	public function __construct(UserRepositoryInterface $userRepository) 
	{
		$this->userRepository = $userRepository;
	}

	public function changeName($name, $lastName)
	{
		$user = new User($name, $lastName);
		$user->validate();

		$this->userRepository->create($user);
	}
}