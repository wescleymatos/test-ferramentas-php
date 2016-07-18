<?php

namespace Auth\Domain\Services;

use Auth\Domain\Contracts\Services\UserServiceInterface;
use Auth\Domain\Contracts\Services\GroupServiceInterface;
use Auth\Domain\Contracts\Repositories\UserRepositoryInterface;
use Auth\Infraestructure\Repositories\UserRepository;
use Auth\Domain\Entities\User;

class UserService implements UserServiceInterface
{
    private $userRepository;
    private $groupService;

    public function __construct(UserRepositoryInterface $userRepository, GroupServiceInterface $groupService)
    {
        $this->userRepository = $userRepository;
        $this->groupService = $groupService;
    }

    public function register(string $name, string $email, string $cpf, string $password, string $confirmPassword, int $idGroup)
    {
        $group = $this->groupService->getById($idGroup);

        $user = new User($name, $email, $cpf, $group);
        $user->setPassword($password, $confirmPassword);
        $user->validate();

        $this->userRepository->create($user);
    }

    public function edit(int $id, string $name, string $email, $cpf, int $idGroup)
    {
        $group = $this->groupService->getById($idGroup);

        $user = $this->getById($id);
        $user->setName($name);
        $user->setEmail($email);
        $user->setCpf($cpf);
        $user->setGroup($group);
        $user->validate();

        $this->userRepository->update($user);
    }

    public function delete(int $id)
    {
        $user = $this->getById($id);

        $this->userRepository->delete($user);
    }

    public function getById(int $id): User
    {
        $user = $this->userRepository->get($id);
        if (empty($user)) {
            throw new \InvalidArgumentException('Este usuário está nulo');
        }

        return $user;
    }
}
