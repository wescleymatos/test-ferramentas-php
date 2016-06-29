<?php

$app->get(
    '/groups',
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
    ) use ($container) {

        $retorno = '';

        try {
            $id = $request->getAttribute('id');

            $groupService = $container->get('App\Domain\Services\GroupService');
            $group = $groupService->getById($id);

            $retorno = $response->getBody()->write("id: {$group->getId()}");
        } catch (\Exception $e) {
            $retorno = $e->getMessage();
        }

        return $retorno;
    }
);
