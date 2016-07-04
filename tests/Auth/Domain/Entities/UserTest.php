<?php

namespace Auth\Domain\Entities;

use Auth\Resource\Validation\PasswordAssertionConcern;

class UserTest extends \PHPUnit_Framework_TestCase
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

    public function testSetPasswordAfterSet()
    {
        $this->user->setPassword('123456', '123456');
        $return = $this->user->getPassword();

        $this->assertEquals(PasswordAssertionConcern::encrypt('123456'), $return);
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
}
