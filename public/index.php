<?php

$container = require_once "../config/bootstrap.php";

$app = new \Slim\App;

$app->get(
    '/', 
    function (
        Psr\Http\Message\ServerRequestInterface $request, 
        Psr\Http\Message\ResponseInterface $response
    ) {
        $response->getBody()->write("Hello Mundo");

        return $response;
    }
);

require_once '../app/routes/group.php';

$app->run();