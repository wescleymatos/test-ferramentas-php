<?php

$groupService = $container->get('App\Domain\Services\GroupService');

$app->get(
    '/groups[/]',
    function (
        Psr\Http\Message\ServerRequestInterface $request,
        Psr\Http\Message\ResponseInterface $response
    ) {
        $response->getBody()->write("Hello grupo");
        return $response;
    }
);

$app->get(
    '/groups/{id}',
    function (
        Psr\Http\Message\ServerRequestInterface $request,
        Psr\Http\Message\ResponseInterface $response
    ) use ($groupService) {
        $id = $request->getAttribute('id');

        $group = $groupService->getById($id);

        $response->getBody()->write("id: {$group->getId()}, name: {$group->getName()}");
        return $response;
    }
);

$app->post(
    '/groups[/]',
    function (
        Psr\Http\Message\ServerRequestInterface $request,
        Psr\Http\Message\ResponseInterface $response
    ) use ($groupService) {
        $data = $request->getParsedBody();

        $groupService->add($data['name']);

        $response->getBody()->write("name: {$data['name']}");
        return $response;
    }
);

$app->put(
    '/groups[/]',
    function (
        Psr\Http\Message\ServerRequestInterface $request,
        Psr\Http\Message\ResponseInterface $response
    ) use ($groupService) {
        $data = $request->getParsedBody();

        $groupService->edit($data['id'], $data['name']);

        $response->getBody()->write("id: {$data->getId()}, name: {$data->getName()}");
        return $response;
    }
);

$app->post(
    '/groups/delete/{id}',
    function (
        Psr\Http\Message\ServerRequestInterface $request,
        Psr\Http\Message\ResponseInterface $response,
        $args
    ) use ($groupService) {
var_dump($args); exit();
        $data = $request->getParsedBody();
        $groupService->delete($data['id']);

        $response->getBody()->write("daletado!");
        return $response;
    }
);
