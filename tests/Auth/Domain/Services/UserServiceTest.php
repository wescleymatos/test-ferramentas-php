<?php

namespace Auth\Domain\Services;

use Auth\Domain\Entities\User;
use DI\ContainerBuilder;
use PHPUnit_Framework_TestCase;


class UserServiceTest extends PHPUnit_Framework_TestCase
{
    private $user;
    private $userService;
    private $container;

    public function setUp()
    {
        $builder = new ContainerBuilder();

        $builder->addDefinitions(PATH_ROOT . 'config.php');
        $this->container = $builder->build();

        $this->user = new User('Nome', 'Sobrenome');
        $this->userService = $this->container->get('App\Domain\Services\UserService');
    }

    public function testGetFullName()
    {
        $expected = 'Nome Sobrenome';
        $data = $this->userService->getFullName();

        $this->assertEquals($expected, $data);
    }
}
