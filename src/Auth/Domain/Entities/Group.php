<?php

namespace Auth\Domain\Entities;

class Group
{
    private $id;
    private $name;
    private $users = array();

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        if (empty($id)) {
            throw new \InvalidArgumentException('The id is not valid.');
        }

        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        if (empty($name)) {
            throw new \InvalidArgumentException('The name is not valid.');
        }

        $this->name = $name;
    }

    public function validate()
    {
        if (empty($this->name)) {
            throw new \InvalidArgumentException('The name is not valid.');
        }
    }
}
