<?php
require '../vendor/autoload.php';

use Auth\Infraestructure\DbContext;
use DI\ContainerBuilder;

$conn = [
    'driver' => 'pdo_sqlite',
    'path' => __DIR__ . '/data/db.sqlite'
];
$entityManager = new DbContext($conn, __DIR__ . '/mapper/yaml');
$context = $entityManager->getContext();

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions(__DIR__.'/config-di.php');
$container = $containerBuilder->build();
return $container;
