<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$userService = $container->get('Auth\Domain\Services\UserService');

$app->get('/users[/]', function (Request $request, Response $response) {
    $response->getBody()->write("Hello usuario");
    return $response;
});

$app->get('/users/{email}', function (Request $request, Response $response) use ($userService) {
    $email = $request->getAttribute('email');

    $user = $userService->getByEmail($email);

    $response->getBody()->write("id: {$user->getId()}, name: {$user->getName()}");
    return $response;
});

$app->post('/users[/]', function (Request $request, Response $response) use ($userService) {
    try {
        $data = $request->getParsedBody();
        $userService->register($data['name'], $data['email'], $data['cpf'], $data['password'], $data['confirmPassword'], (int)$data['idGroup']);
        $response->getBody()->write("name: {$data['name']}, email: {$data['email']}");

    } catch (Exception $e) {
        $response->getBody()->write($e->getMessage());
    }


    return $response;
});

$app->put('/users[/]', function (Request $request, Response $response) use ($userService) {
    $data = $request->getParsedBody();

    $userService->edit($data['id'], $data['name'], $data['last']);

    $response->getBody()->write("id: {$data['id']}, name: {$data['name']}");
    return $response;
});
