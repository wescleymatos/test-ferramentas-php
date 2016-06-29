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

    public function add($name, $lastName)
    {
        $user = new User($name, $lastName);
        $user->validate();

        $this->userRepository->create($user);
    }

    public function edit($id, $name, $lastName)
    {
        $user = $this->getById($id);
        $user->setName($name);
        $user->setLastName($lastName);
        $user->validate();

        $this->userRepository->update($user);
    }

    public function delete($id)
    {
        $user = $this->getById($id);

        $this->userRepository->delete($user);
    }

    public function getById($id)
    {
        $user = $this->userRepository->get($id);
        if (empty($user)) {
            throw new \InvalidArgumentException('Este usuário está nulo');
        }

        return $user;
    }
}
