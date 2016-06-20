<?php 

require_once "vendor/autoload.php";
$container = require_once "bootstrap.php";

use Domain\Services\UserService;


try {
	$userService = $container->get('Domain\Services\UserService');
	$userService->changeName('Carlos', 'Alves');
} catch (Exception $e) {
	echo $e->getMessage();
}

