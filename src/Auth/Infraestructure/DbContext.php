<?php

namespace Auth\Infraestructure;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class DbContext
{
    private $isDevMode;
    private $mapper;
    private $conn;

    public function __construct($conn, $mapper, $isDevMode = true)
    {
        $this->conn = $conn;
        $this->mapper = $mapper;
        $this->isDevMode = $isDevMode;
    }

    public function getContext()
    {
        return EntityManager::create(
            $this->conn,
            Setup::createYAMLMetadataConfiguration(
                array($this->mapper),
                $this->isDevMode
            )
        );
    }
}
