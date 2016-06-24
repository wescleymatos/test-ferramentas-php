<?php 

require_once "vendor/autoload.php";
$container = require_once "bootstrap.php";
define('PATH_ROOT', '/var/www/public/test-doctrine/');


use App\Domain\Services\UserService;


try {
	$userService = $container->get('App\Domain\Services\UserService');
	$userService->changeName('Carlos', 'Alves');
} catch (Exception $e) {
	echo $e->getMessage();
}

