<?php

$userService = $container->get('App\Domain\Services\UserService');

$app->get(
    '/users[/]',
    function (
        Psr\Http\Message\ServerRequestInterface $request,
        Psr\Http\Message\ResponseInterface $response
    ) {
        $response->getBody()->write("Hello usuario");
        return $response;
    }
);

$app->get(
    '/users/{id}',
    function (
        Psr\Http\Message\ServerRequestInterface $request,
        Psr\Http\Message\ResponseInterface $response
    ) use ($userService) {
        $id = $request->getAttribute('id');

        $user = $userService->getById($id);

        $response->getBody()->write("id: {$user->getId()}, name: {$user->getName()}");
        return $response;
    }
);

$app->post(
    '/users[/]',
    function (
        Psr\Http\Message\ServerRequestInterface $request,
        Psr\Http\Message\ResponseInterface $response
    ) use ($userService) {
        try {
        $data = $request->getParsedBody();
        $userService->add($data['name'], $data['last']);
        $response->getBody()->write("name: {$data['name']}, last: {$data['last']}");

        } catch (Exception $e) {
            $response->getBody()->write($e->getMessage());
        }


        return $response;
    }
);

$app->put(
    '/users[/]',
    function (
        Psr\Http\Message\ServerRequestInterface $request,
        Psr\Http\Message\ResponseInterface $response
    ) use ($userService) {
        $data = $request->getParsedBody();

        $userService->edit($data['id'], $data['name'], $data['last']);

        $response->getBody()->write("id: {$data['id']}, name: {$data['name']}");
        return $response;
    }
);
