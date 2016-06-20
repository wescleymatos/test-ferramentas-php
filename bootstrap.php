<?php

require_once 'vendor/autoload.php';

use Infraestructure\DbContext;
use DI\ContainerBuilder;

$entityManager = new DbContext();
$context = $entityManager->getContext();

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions(__DIR__ . '/config.php');
$container = $containerBuilder->build();
return $container;