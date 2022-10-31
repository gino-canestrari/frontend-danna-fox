<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Console\EntityManagerProvider\SingleManagerProvider;

$dotenv = Dotenv\Dotenv::createImmutable('./');
$dotenv->load();
$dotenv->required(
  'DATABASE_NAME',
  'DATABASE_HOST',
  'DATABASE_DRVR',
  'DATABASE_USER',
  'DATABASE_PASS'
);

require_once(__DIR__ . '/bootstrap.php');

$entityManager = GetEntityManager();

return ConsoleRunner::run(new SingleManagerProvider($entityManager), []);
