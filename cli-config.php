<?php

// cli-config.php
require_once "vendor/autoload.php";

use System\Core\Factories\DatabaseFactory;

$builder = new DI\ContainerBuilder();
$container = $builder->build();

$db = $container->get(DatabaseFactory::class);

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($db->getEntity());