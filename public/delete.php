<?php

require(__DIR__ . '/../vendor/autoload.php');
$dotenv = Dotenv\Dotenv::createImmutable('../');
$dotenv->load();
require(__DIR__ . '/../config/bootstrap.php');

$em = GetEntityManager();

if (isset($_GET['id'])) {
  $campaign = $em->find('Models\Campaign', $_GET['id']);
  $client = $campaign->getCliente();

  $em->remove($client);
  $em->remove($campaign);

  $em->flush();
  header('Location: ../');
} else {
  echo "No hay ningun id...";
}
