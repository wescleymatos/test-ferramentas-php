<?php

$container = require_once '../app/bootstrap.php';

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];
$c = new \Slim\Container($configuration);
$app = new \Slim\App($c);

$app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write("Hello Mundo");
        return $response;
    }
);

require_once '../app/routes/group.php';
require_once '../app/routes/user.php';

$app->run();
