<?php

namespace App\Domain\Services;

use App\Domain\Contracts\Services\UserServiceInterface;
use App\Domain\Contracts\Repositories\UserRepositoryInterface;
use App\Domain\Entities\User;
use App\Infraestructure\Repositories\UserRepository;

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

	public function getFullName()
	{
		return 'Nome Sobrenome';
	}
}