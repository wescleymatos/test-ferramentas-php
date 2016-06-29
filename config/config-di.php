<?php

use App\Domain\Contracts\Repositories\UserRepositoryInterface;
use App\Domain\Contracts\Repositories\GroupRepositoryInterface;
use App\Infraestructure\Repositories\UserRepository;
use App\Infraestructure\Repositories\GroupRepository;
use App\Infraestructure\DbContext;

return [
    UserRepositoryInterface::class => DI\object(UserRepository::class),
    GroupRepositoryInterface::class => DI\object(GroupRepository::class),
    DbContext::class => DI\object(DbContext::class)
];
