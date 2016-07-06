<?php

namespace Auth\Domain\Entities;

class GroupTest extends \PHPUnit_Framework_TestCase
{
    private $group;

    public function setUp()
    {
        $this->group = new Group('admin');
    }

    public function testThrowExceptionWhenInstanceNotPassParamsConstruct()
    {
        $this->setExpectedException('TypeError');
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

    public function testGetIdAfterSet()
    {
        $this->group->setId(12);
        $return = $this->group->getId();

        $this->assertEquals(12, $return);
    }

    public function testSetIdWrongTypeHintParam()
    {
        $this->setExpectedException('TypeError');
        $this->group->setId('abc');
    }

    public function testThrowExceptionWhenSetNameEmptyParamGiven()
    {
        $this->setExpectedException('InvalidArgumentException', 'The name is not valid.');
        $this->group->setName('');
    }

    public function testValidateThrowExceptionWhenObjectNotPassParam()
    {
        $this->setExpectedException('InvalidArgumentException');

        $group = new Group('');
        $group->validate();
    }

    public function testValidateMethod()
    {
        $this->group->validate();
    }
}
