<?php

namespace Auth\Domain\Entities;

class GroupTest extends \PHPUnit_Framework_TestCase
{
    private $group;

    public function setUp()
    {
        $this->group = new Group('admin');

        set_error_handler(array($this, 'errorHandler'));
    }

    public function errorHandler($errno, $errstr, $errfile, $errline)
    {
        throw new \InvalidArgumentException(
            sprintf(
                'Missing argument. %s %s %s %s',
                $errno,
                $errstr,
                $errfile,
                $errline
            )
        );
    }

    public function testThrowExceptionWhenInstanceNotPassParamsConstruct()
    {
        $this->setExpectedException('\InvalidArgumentException');
        new Group;
    }

    public function testGetNameToConstructGiven()
    {
        $return = $this->group->getName();

        $this->assertEquals('admin', $return);
    }

    public function testGetNameAfterSet()
    {
        $this->group->setName('gerente');
        $return = $this->group->getName();

        $this->assertEquals('gerente', $return);
    }


    public function testSetIdWrongTypeHintParam()
    {
        $this->group->setId(123);
        $return = $this->group->getId();

        $this->assertEquals(123, $return);
    }

    public function testThrowExceptionWhenSetNameEmptyParamGiven()
    {
        $this->setExpectedException('\InvalidArgumentException', 'The name is not valid.');
        $this->group->setName('');
    }

    public function testThrowExceptionWhenObjectNotValidation()
    {
        $this->setExpectedException('\InvalidArgumentException');

        $group = new Group('');
        $group->validate();
    }
}
