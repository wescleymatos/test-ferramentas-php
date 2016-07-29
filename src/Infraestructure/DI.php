<?php

use Domain\Contracts\Repositories\UserRepositoryInterface;
use Domain\Contracts\Repositories\GroupRepositoryInterface;
use Infraestructure\Repositories\UserRepository;
use Infraestructure\Repositories\GroupRepository;
use Domain\Contracts\Services\UserServiceInterface;
use Domain\Contracts\Services\GroupServiceInterface;
use Domain\Services\UserService;
use Domain\Services\GroupService;
use Infraestructure\DbContext;

return [
    UserRepositoryInterface::class => DI\object(UserRepository::class),
    GroupRepositoryInterface::class => DI\object(GroupRepository::class),
    UserServiceInterface::class => DI\object(UserService::class),
    GroupServiceInterface::class => DI\object(GroupService::class),
    DbContext::class => DI\object(DbContext::class)->constructor(CONN, MAPPER, DEVMOD)
];
