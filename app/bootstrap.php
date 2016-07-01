<?php
require_once '../vendor/autoload.php';

use App\Infraestructure\DbContext;
use DI\ContainerBuilder;

$entityManager = new DbContext();
$context = $entityManager->getContext();

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions(__DIR__.'/config-di.php');
$container = $containerBuilder->build();
return $container;
