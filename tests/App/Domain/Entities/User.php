<?php

namespace Domain\Entities;

class User
{
    private $id;
    private $name;
    private $lastName;

    public function __construct($name, $lastName)
    {
        $this->name = $name;
        $this->lastName = $lastName;
    }

    public function setName($name)
    {
        if (empty($name)) {
            throw new \Exception('The name is not valid.');
        }

        $this->name = $name;
    }

    public function setLastName($lastName)
    {
        if (empty($lastName)) {
            throw new \Exception('The last name is not valid.');
        }

        $this->lastName = $lastName;
    }

    public function getFullName()
    {
        return sprintf('My name is %s %s', $this->name, $this->lastName);
    }

    public function validate()
    {
        if (empty($this->name)) {
            throw new \Exception('The name is not valid.');
        }

        if (empty($this->lastName)) {
            throw new \Exception('The last name is not valid.');
        }
    }
}

