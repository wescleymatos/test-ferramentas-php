<?php

namespace App\Domain\Entities;

use Doctrine\Common\Collections\ArrayCollection;

class Group
{
    private $id;
    private $name;
    private $users;

    public function __construct($name)
    {
        $this->name = $name;
        $this->users = new ArrayCollection();
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

    public function validate()
    {
        if (empty($this->name)) {
            throw new \Exception('The name is not valid.');
        }
    }
}
