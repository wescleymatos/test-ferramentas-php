<?php 

require_once "vendor/autoload.php";
$container = require_once "bootstrap.php";

use App\Domain\Services\UserService;
use App\Resource\Validation\AssertionConcern;

try {
	$userService = $container->get('App\Domain\Services\UserService');
	$userService->changeName('Carlos', 'Alves');

    AssertionConcern::assertStateFalse(false, 'email inválido!');
} catch (Exception $e) {
	echo $e->getMessage();
}

