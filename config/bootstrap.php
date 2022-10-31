<?php

use Doctrine\ORM\ORMSetup;
use Doctrine\ORM\EntityManager;

require_once(__DIR__ . '/../vendor/autoload.php');

function GetEntityManager()
{

  $dbparams = array(
    'host' => $_ENV['DATABASE_HOST'],
    'port' => $_ENV['DATABASE_PORT'],
    'dbname' => $_ENV['DATABASE_NAME'],
    'user' => $_ENV['DATABASE_USER'],
    'password' => $_ENV['DATABASE_PASS'],
    'driver' => $_ENV['DATABASE_DRVR'],
    'charset' => $_ENV['DATABASE_CHAR']
  );

  $config = ORMSetup::createAnnotationMetadataConfiguration(
    paths: array($_ENV['ENTITY_DIR']),
    isDevMode: true
  );

  $config->setAutoGenerateProxyClasses(true);

  return EntityManager::create($dbparams, $config);
}
