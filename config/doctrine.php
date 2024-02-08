<?php
// doctrine.php

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

require_once __DIR__."/../vendor/autoload.php";

$dbParams = parse_ini_file(__DIR__ . '/bdd.ini');

$config = ORMSetup::createAttributeMetadataConfiguration(
    [__DIR__.'/../src/entities/'],
    true
);
$connection = DriverManager::getConnection($dbParams, $config);

$entityManager = new EntityManager(
    $connection,
    $config
);

