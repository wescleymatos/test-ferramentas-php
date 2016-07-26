<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$groupService = $container->get('Auth\Domain\Services\GroupService');

$app->get('/groups[/]', function (Request $request, Response $response) {
    try {
        $response->getBody()->write("Hello grupo");
        return $response;
    } catch (Throwable $e) {
        echo $e->getMessage();
    }
});

$app->get('/groups/{id}', function (Request $request, Response $response) use ($groupService) {
    try {
        $id = $request->getAttribute('id');

        if (!empty($id)) {
            $group = $groupService->getById($id);

            $response->getBody()->write("id: {$group->getId()}, name: {$group->getName()}");
            return $response;
        }
    } catch (Throwable $e) {
        echo $e->getMessage();
    }
});

$app->post('/groups[/]', function (Request $request, Response $response) use ($groupService) {
    try {
        $data = $request->getParsedBody();

        $groupService->add($data['name']);

        $response->getBody()->write("name: {$data['name']}");
        return $response;
    } catch (Throwable $e) {
        echo $e->getMessage();
    }
});

$app->put('/groups[/]', function (Request $request, Response $response) use ($groupService) {
    try {
        $data = $request->getParsedBody();

        $groupService->edit($data['id'], $data['name']);

        $response->getBody()->write("id: {$data['id']}, name: {$data['name']}");
        return $response;
    } catch (Throwable $e) {
        echo $e->getMessage();
    }
});

$app->post('/groups/delete[/]', function (Request $request, Response $response) use ($groupService) {
    try {
        $data = $request->getParsedBody();
        $groupService->delete($data['id']);

        $response->getBody()->write("daletado!");
        return $response;
    } catch (Throwable $e) {
        echo $e->getMessage();
    }
});
