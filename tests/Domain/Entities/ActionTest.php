<?php

namespace Domain\Entities;

use Domain\ObjectValues\Method;

class ActionTest extends \PHPUnit_Framework_TestCase
{

    private $action;
    private $method;

    public function setUp()
    {
        $this->method = new Method('GET');
        $this->action = new Action('groups', $this->method);
    }

    public function testGetIdAfterSet()
    {
        $this->action->setId(12);
        $return = $this->action->getId();

        $this->assertEquals(12, $return);
    }

    public function testSetIdWrongTypeHintParam()
    {
        $this->setExpectedException('TypeError');
        $this->action->setId('abc');
    }

    public function testGetNameToConstructGiven()
    {
        $return = $this->action->getName();

        $this->assertEquals('groups', $return);
    }

    public function testGetNameAfterSet()
    {
        $this->action->setName('gerente');
        $return = $this->action->getName();

        $this->assertEquals('gerente', $return);
    }

    public function testThrowExceptionWhenSetNameEmptyParamGiven()
    {
        $this->setExpectedException('InvalidArgumentException', 'The name is not valid.');

        $this->action->setName('');
    }

    public function testGetMethodToConstructGiven()
    {
        $return = $this->action->getMethod();

        $this->assertEquals('GET', $return);
    }

    public function testGetMethodAfterSet()
    {
        $method = new Method('POST');
        $method->validate();
        $this->action->setMethod($method);

        $return = $this->action->getMethod();

        $this->assertEquals('POST', $return);
    }

    public function testSetMethodThereIsNoExist()
    {
        $this->setExpectedException('InvalidArgumentException', 'This method is not valid.');

        $method = new Method('HEAD');
        $method->validate();

        $this->action->setName($method);
    }

    public function testSetMethodCanNotEmpty()
    {
        $this->setExpectedException('InvalidArgumentException', 'This method is not valid.');

        $method = new Method('');
        $method->validate();

        $this->action->setName($method);
    }

    public function testValidateMethod()
    {
        $this->action->validate();
    }
}
