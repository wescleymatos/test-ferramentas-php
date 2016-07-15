<?php
require '../vendor/autoload.php';

use DI\ContainerBuilder;

define('DEVMOD', true);
define('MAPPER',  __DIR__ . '/mapper/yaml');
define('CONN', [
    'driver' => 'pdo_sqlite',
    'path' => __DIR__ . '/data/db.sqlite'
]);

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions(__DIR__.'/config-di.php');
$container = $containerBuilder->build();
return $container;
