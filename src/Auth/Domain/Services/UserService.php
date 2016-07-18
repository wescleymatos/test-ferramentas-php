<?php

namespace Auth\Domain\Services;

use Auth\Domain\Contracts\Repositories\UserRepositoryInterface;
use Auth\Domain\Contracts\Services\GroupServiceInterface;
use Auth\Domain\Contracts\Services\UserServiceInterface;
use Auth\Domain\Entities\User;
use Auth\Infraestructure\Repositories\UserRepository;
use Auth\Resource\Validation\PasswordAssertionConcern;

class UserService implements UserServiceInterface
{
    private $userRepository;
    private $groupService;

    public function __construct(UserRepositoryInterface $userRepository, GroupServiceInterface $groupService)
    {
        $this->userRepository = $userRepository;
        $this->groupService = $groupService;
    }

    public function authenticate(string $email, string $password): User
    {
        $user = $this->getByEmail($email);

        if (PasswordAssertionConcern::verify($password, $user->getPassword())) {
            throw new \Exception('Invalid credentials.');
        }

        return $user;
    }

    public function register(string $name, string $email, string $cpf, string $password, string $confirmPassword, int $idGroup)
    {
        $group = $this->groupService->getById($idGroup);

        $user = new User($name, $email, $cpf, $group);
        $user->setPassword($password, $confirmPassword);
        $user->validate();

        $this->userRepository->create($user);
    }

    public function changeInformation(string $name, string $email, $cpf, int $idGroup)
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

    public function changePassword(string $email, string $password, string $newPassword, string $confirmNewPassword)
    {
        $user = $this->authenticate($email, $password);

        $user->setPassword($newPassword, $confirmNewPassword);
        $user->validate();

        $this->userRepository->update($user);
    }

    public function resetPassword(string $email): string
    {
        $user = $this->getByEmail($email);
        $password = $user->resetPassword();
        $user->validate();

        $this->userRepository->update($user);

        return $password;
    }

    public function remove(string $email)
    {
        $user = $this->getById($id);

        $this->userRepository->delete($user);
    }

    public function getByEmail(string $email): User
    {
        $user = $this->userRepository->get($email);
        if (empty($user)) {
            throw new \InvalidArgumentException('Este usuário está nulo');
        }

        return $user;
    }
}
