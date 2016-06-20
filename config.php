<?php

use App\Domain\Contracts\Repositories\UserRepositoryInterface;
use App\Infraestructure\Repositories\UserRepository;
use App\Infraestructure\DbContext;

return [
	UserRepositoryInterface::class => DI\object(UserRepository::class),
	DbContext::class => DI\object(DbContext::class)
];