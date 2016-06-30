<?php

namespace App\Domain\Entities;

class Group
{
    private $id;
    private $name;
    //protected $users;

    public function __construct($name = null)
    {
        $this->name = $name;
        //$this->users = new ArrayCollection();
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
        if (empty($name)) {
            throw new \Exception('The name is not valid.');
        }

        $this->name = $name;
    }

    public function validate()
    {
        if (empty($this->name)) {
            throw new \Exception('The name is not valid.');
        }
    }
}
