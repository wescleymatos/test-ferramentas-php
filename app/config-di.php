<?php

use Auth\Domain\Contracts\Repositories\UserRepositoryInterface;
use Auth\Domain\Contracts\Repositories\GroupRepositoryInterface;
use Auth\Infraestructure\Repositories\UserRepository;
use Auth\Infraestructure\Repositories\GroupRepository;
use Auth\Domain\Contracts\Services\UserServiceInterface;
use Auth\Domain\Contracts\Services\GroupServiceInterface;
use Auth\Domain\Services\UserService;
use Auth\Domain\Services\GroupService;
use Auth\Infraestructure\DbContext;

return [
    UserRepositoryInterface::class => DI\object(UserRepository::class),
    GroupRepositoryInterface::class => DI\object(GroupRepository::class),
    UserServiceInterface::class => DI\object(UserService::class),
    GroupServiceInterface::class => DI\object(GroupService::class),
    DbContext::class => DI\object(DbContext::class)
];
