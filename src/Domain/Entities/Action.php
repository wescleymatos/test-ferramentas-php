<?php

namespace Domain\Entities;

use Domain\ObjectValues\Method;
use Resource\Validation\AssertionConcern;

class Action
{
    private $id;
    private $name;
    private $method;

    public function __construct(string $name, Method $method)
    {
        $this->name = $name;
        $this->method = $method;
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

    public function getMethod(): string
    {
        return $this->method->getMethod();
    }

    public function setMethod(Method $method)
    {
        AssertionConcern::assertArgumentNotEmpty($method, 'The method is not valid.');

        $this->method = $method;
    }

    public function validate()
    {
        AssertionConcern::assertArgumentNotEmpty($this->name, 'The name is not valid.');
        AssertionConcern::assertArgumentNotEmpty($this->method, 'The method is not valid.');
    }
}
