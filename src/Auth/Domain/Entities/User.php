<?php

namespace Auth\Domain\Entities;

use Auth\Resource\Validation\AssertionConcern;
use Auth\Resource\Validation\PasswordAssertionConcern;

class User
{
    private $id;
    private $name;
    private $email;
    private $password;
    private $cpf;
    private $group;

    public function __construct(string $name, string $email, string $cpf, Group $group)
    {
        $this->name = $name;
        $this->email = $email;
        $this->cpf = $cpf;
        $this->group = $group;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        AssertionConcern::assertArgumentNotEmpty($name, 'The name is not valid.');

        $this->name = $name;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password, string $confirmPassword)
    {
        AssertionConcern::assertArgumentNotEmpty($password, 'The password is not valid.');
        AssertionConcern::assertArgumentNotEmpty($confirmPassword, 'The confirmPassword is not valid.');
        AssertionConcern::assertArgumentBetween($confirmPassword, 6, 20, 'The password is length invalid.');
        AssertionConcern::assertArgumentEquals($password, $confirmPassword, 'The password is not same.');

        $this->password = PasswordAssertionConcern::encrypt($password);
    }

    public function resetPassword()
    {
        $pass = md5(uniqid(rand(), true));
        $password = substr($pass, 0, 8);
        $this->password = PasswordAssertionConcern::encrypt($password);

        return $password;
    }

    public function validate()
    {
        AssertionConcern::assertArgumentNotEmpty($this->name, 'The name is not valid.');
        AssertionConcern::assertArgumentIsAnEmailAddress($this->email, 'The email is not valid.');
        AssertionConcern::assertArgumentNotEmpty($this->cpf, 'The cpf is not valid.');
        PasswordAssertionConcern::assertIsValid($this->password);
        AssertionConcern::assertArgumentNotEmpty($this->group, 'The group is not valid.');
    }
}
