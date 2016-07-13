<?php
require '../vendor/autoload.php';

define('DSN', 'sqlite:' . __DIR__ . '/data/db.sqlite');

use Auth\Infraestructure\DbContext;
use DI\ContainerBuilder;

$entityManager = new DbContext();
$context = $entityManager->getContext();

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions(__DIR__.'/config-di.php');
$container = $containerBuilder->build();
return $container;
