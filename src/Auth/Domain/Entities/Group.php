<?php

namespace Auth\Domain\Entities;

use Auth\Resource\Validation\AssertionConcern;
use Doctrine\Common\Collections\ArrayCollection;

class Group
{
    private $id;
    private $name;
    private $users;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->users = new ArrayCollection();
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

    public function validate()
    {
        AssertionConcern::assertArgumentNotEmpty($this->name, 'The name is not valid.');
    }
}
