<?php

namespace Auth\Domain\ObjectValues;

use Auth\Resource\Validation\AssertionConcern;

class Method
{
    private $method;
    const METHODS = [
        'GET' => 'GET',
        'POST' => 'POST',
        'PUT' => 'PUT',
        'DELETE' => 'DELETE'
    ];

    public function __construct(string $method)
    {
        $this->method = $method;
    }

    public function getMethod()
    {
        return self::METHODS[$this->method];
    }

    public function validate()
    {
        AssertionConcern::assertArgumentNotEmpty($this->method, 'This method is not valid.');
        AssertionConcern::assertArgumentInArray($this->method, self::METHODS, 'This method is not valid.');
    }
}
