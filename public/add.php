<?php

use Models\Campaign;
use Models\Client;

require(__DIR__ . '/../vendor/autoload.php');
$dotenv = Dotenv\Dotenv::createImmutable('../');
$dotenv->load();
require(__DIR__ . '/../config/bootstrap.php');

$em = GetEntityManager();
$createdCampaigns = $em->getRepository('Models\Campaign')->count(['estado' => 'CREADA']);
$executedCampaigns = $em->getRepository('Models\Campaign')->count(['estado' => 'EN EJECUCIÓN']);
$count = $createdCampaigns + $executedCampaigns;

if (isset($_POST['submit'])) {

  if ($count >= 10) {
    echo "No se pueden ingresar mas campañas...";
    echo $count;
    return;
  }

  $client = new Client();
  $campaign = new Campaign();

  $existingClient = $em->getRepository('Models\Client')->findOneBy(['cuilcuit' => $_POST['cuitcuil']]);

  if (isset($existingClient)) {
    echo "Ya existe un cliente con ese Cuil/Cuit";
    return;
  } else {
    $client->setNombre($_POST['nombre']);
    $client->setApellido($_POST['apellido']);
    $client->setCuilCuit($_POST['cuitcuil']);
    $client->setTelefono($_POST['telefono']);
    $client->setEmail($_POST['email']);
    $client->setRazonSocial($_POST['razon_social']);
    $campaign->setCliente($client);
  }

  $campaign->setNombre($_POST['nombre_campania']);
  $campaign->setTexto($_POST['text']);
  $campaign->setCantidadMensajes($_POST['cantidad_mensajes']);
  $campaign->setEstado('CREADA');

  $em->persist($campaign);
  $em->flush();

  $campaignLocalities = $campaign->getLocalidades();

  $rawLocalities = $_POST['localidades'];
  foreach ($rawLocalities as $id) {
    $locality = $em->find('Models\Locality', $id);
    $campaignLocalities->add($locality);
  }
  $em->persist($campaign);
  $em->flush();

  header('Location: ../');
} else {
  echo "El formulario no ha sido enviado correctamente...";
}
