<?php

namespace Auth\Infraestructure;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class DbContext
{
    private $isDevMode = true;
    private $conn = array(
        'driver' => 'pdo_sqlite',
        'path' => DNS
    );

    public function __construct()
    {
    }

    public function getContext()
    {
        return EntityManager::create(
            $this->conn,
            Setup::createYAMLMetadataConfiguration(
                array('/var/www/public/test-tools/config/yaml'),
                $this->isDevMode
            )
        );
    }
}
