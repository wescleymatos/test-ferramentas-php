<?php

namespace Auth\Domain\Entities;

use PHPUnit\Framework\TestCase;
use Auth\Resource\Validation\PasswordAssertionConcern;

class UserTest extends TestCase
{
    private $user;
    private $group;

    public function setUp()
    {
        $this->group = new Group('admin');
        $this->user = new User('wescley matos', 'teste@teste.com', '97062018660', $this->group);
    }

    public function testThrowExceptionWhenInstanceNotPassParamsConstruct()
    {
        $this->setExpectedException('TypeError');
        new User;
    }

    public function testGetIdAfterSet()
    {
        $this->user->setId(12);
        $return = $this->user->getId();

        $this->assertEquals(12, $return);
    }

    public function testSetIdWrongTypeHintParam()
    {
        $this->setExpectedException('TypeError');
        $this->user->setId('abc');
    }

    public function testGetNameToConstructGiven()
    {
        $return = $this->user->getName();

        $this->assertEquals('wescley matos', $return);
    }

    public function testGetNameAfterSet()
    {
        $this->user->setName('antonio matos');
        $return = $this->user->getName();

        $this->assertEquals('antonio matos', $return);
    }

    public function testGetPasswordThrowExceptionWhenNotReturnString()
    {
        $this->setExpectedException('TypeError');

        $this->user->getPassword();
    }

    public function testGetPasswordAfterSet()
    {
        $this->user->setPassword('123456', '123456');
        $return = $this->user->getPassword();

        $this->assertTrue(PasswordAssertionConcern::verify('123456', $return));
    }

    public function testPasswordDifferentConfirmPassword()
    {
        $this->setExpectedException('InvalidArgumentException', 'The password is not same.');

        $this->user->setPassword('123456', '12345667');
        $return = $this->user->getPassword();
    }

    public function testThrowExceptionWhenPasswordLessThanDefineLength()
    {
        $this->setExpectedException('InvalidArgumentException', 'The password is length invalid.');

        $this->user->setPassword('12345', '12345');
        $return = $this->user->getPassword();
    }

    public function testThrowExceptionWhenPasswordMoreThanDefineLength()
    {
        $this->setExpectedException('InvalidArgumentException', 'The password is length invalid.');

        $this->user->setPassword('234512345123451234512', '234512345123451234512');
        $return = $this->user->getPassword();
    }

    public function testResetPassword()
    {
        $return = $this->user->resetPassword();
        $this->assertNotEmpty($return);
    }

    public function testGetCpfToConstructGiven()
    {
        $return = $this->user->getCpf();

        $this->assertEquals('97062018660', $return);
    }

    public function testGetCpfAfterSet()
    {
        $this->user->setCpf('25125507458');
        $return = $this->user->getCpf();

        $this->assertEquals('25125507458', $return);
    }

    public function testThrowExceptionWhenHasTheSameNumber()
    {
        $this->setExpectedException('InvalidArgumentException', 'CPF is not valid.');

        $this->user->setCpf('11111111111');
    }

    public function testThrowExceptionWhenPassTenNumbers()
    {
        $this->setExpectedException('InvalidArgumentException', 'CPF is not valid.');

        $this->user->setCpf('9706201866');
    }

    public function testValidateThrowExceptionWhenNameIsEmpty()
    {
        $this->setExpectedException('InvalidArgumentException', 'The name is not valid.');

        $group = new Group('admin');
        $user = new User('', 'teste@teste.com', '97062018660', $this->group);

        $user->validate();
    }

    public function testValidateThrowExceptionWhenEmailIsNotValid()
    {
        $this->setExpectedException('InvalidArgumentException', 'The email is not valid.');

        $group = new Group('admin');
        $user = new User('wescley', 'teste@teste', '97062018660', $this->group);

        $user->validate();
    }

    public function testValidateThrowExceptionWhenEmailIsEmpty()
    {
        $this->setExpectedException('InvalidArgumentException', 'The email is not valid.');

        $group = new Group('admin');
        $user = new User('wescley', '', '97062018660', $this->group);

        $user->validate();
    }

    public function testValidateThrowExceptionWhenCpfIsNotValid()
    {
        $this->setExpectedException('InvalidArgumentException', 'CPF is not valid.');

        $group = new Group('admin');
        $user = new User('wescley', 'teste@teste.com', '9706201866', $this->group);

        $user->validate();
    }

    public function testValidateThrowExceptionWhenCpfIsEmpty()
    {
        $this->setExpectedException('InvalidArgumentException', 'CPF can not be null.');

        $group = new Group('admin');
        $user = new User('wescley', 'teste@teste.com', '', $this->group);

        $user->validate();
    }

    public function testValidateThrowExceptionWhenGroupIsEmpty()
    {
        $this->setExpectedException('TypeError');

        $user = new User('wescley', 'teste@teste.com', '97062018660', '');

        $user->validate();
    }

    public function testValidateMethod()
    {
        $this->user->setPassword('123456', '123456');
        $this->user->validate();
    }
}
