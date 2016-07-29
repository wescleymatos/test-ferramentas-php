<?php
require './vendor/autoload.php';

use DI\ContainerBuilder;

define('DEVMOD', true);
define('MAPPER',  __DIR__ . '/src/Infraestructure/Mapper/yaml');
define('CONN', [
    'driver' => 'pdo_sqlite',
    'path' => __DIR__ . '/app/data/db.sqlite'
]);

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions(__DIR__.'/src/Infraestructure/DI.php');
$container = $containerBuilder->build();
return $container;
