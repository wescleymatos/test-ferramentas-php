<?php
require '../vendor/autoload.php';

use Auth\Infraestructure\DbContext;
use DI\ContainerBuilder;

$entityManager = new DbContext();
$context = $entityManager->getContext();

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions(__DIR__.'/config-di.php');
$container = $containerBuilder->build();
return $container;
