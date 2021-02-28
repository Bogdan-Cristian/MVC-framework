<?php

namespace System\Core\Factories;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use System\Core\FileSystem\RootFS;

class DatabaseFactory
{
    public $rootFS;

    public $conn;

    public $config;

    public function __construct(RootFS $rootFS)
    {
        $this->rootFS = $rootFS;

        
        // Config
        $isDevMode = true;
        $proxyDir = null;
        $cache = null;
        $useSimpleAnnotationReader = false;

        $this->config = Setup::createAnnotationMetadataConfiguration(array($this->rootFS->getRoot() . "src" . DIRECTORY_SEPARATOR . "Migrations"), $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);
        $this->conn = require $this->rootFS->getRoot() . "public" . DIRECTORY_SEPARATOR . "db_config.php";
    }

    public function getConfig()
    {
        return $this->config;
    }

    public function getConnection()
    {
        return $this->conn;
    }

    public function getEntity()
    {
        return  EntityManager::create($this->conn, $this->config);
    }
    
}