<?php

use Domain\Contracts\Repositories\UserRepositoryInterface;
use Infraestructure\Repositories\UserRepository;
use Infraestructure\DbContext;

return [
	UserRepositoryInterface::class => DI\object(UserRepository::class),
	DbContext::class => DI\object(DbContext::class)
];