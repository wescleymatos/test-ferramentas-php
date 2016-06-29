<?php

namespace App\Domain\Entities;

class User
{
    private $id;
    private $name;
    private $lastName;
    private $group;

    public function __construct($group, $name, $lastName)
    {
        $this->name = $name;
        $this->lastName = $lastName;
        $this->group = $group;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        if (empty($name)) {
            throw new \Exception('The name is not valid.');
        }

        $this->name = $name;
    }

    public function getLastName()
    {
        return $this->lastName;
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
        if (empty($this->group)) {
            throw new \Exception('The group is not valid.');
        }

        if (empty($this->name)) {
            throw new \Exception('The name is not valid.');
        }

        if (empty($this->lastName)) {
            throw new \Exception('The last name is not valid.');
        }
    }
}
