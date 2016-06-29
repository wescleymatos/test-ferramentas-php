<?php

use App\Domain\Contracts\Repositories\UserRepositoryInterface;
use App\Domain\Contracts\Repositories\GroupRepositoryInterface;
use App\Infraestructure\Repositories\UserRepository;
use App\Infraestructure\Repositories\GroupRepository;
use App\Domain\Contracts\Services\UserServiceInterface;
use App\Domain\Contracts\Services\GroupServiceInterface;
use App\Domain\Services\UserService;
use App\Domain\Services\GroupService;
use App\Infraestructure\DbContext;

return [
    UserRepositoryInterface::class => DI\object(UserRepository::class),
    GroupRepositoryInterface::class => DI\object(GroupRepository::class),
    UserServiceInterface::class => DI\object(UserService::class),
    GroupServiceInterface::class => DI\object(GroupService::class),
    DbContext::class => DI\object(DbContext::class)
];
