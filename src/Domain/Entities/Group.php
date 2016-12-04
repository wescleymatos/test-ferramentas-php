<?php

namespace Domain\Entities;

use Resource\Validation\AssertionConcern;

class Group
{
    private $id;
    private $name;
    private $users;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        AssertionConcern::assertArgumentNotEmpty($id, 'The id is not valid.');

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

    public function getUsers(): array
    {
        return $this->users->getValues();
    }

    public function validate()
    {
        AssertionConcern::assertArgumentNotEmpty($this->name, 'The name is not valid.');
    }
}
