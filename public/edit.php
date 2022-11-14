<?php

use Doctrine\Common\Collections\ArrayCollection;

require(__DIR__ . '/../vendor/autoload.php');
$dotenv = Dotenv\Dotenv::createImmutable('../');
$dotenv->load();
require(__DIR__ . '/../config/bootstrap.php');

$em = GetEntityManager();
$createdCampaigns = $em->getRepository('Models\Campaign')->count(['estado' => 'CREADA']);
$executedCampaigns = $em->getRepository('Models\Campaign')->count(['estado' => 'EN EJECUCIÓN']);

if (isset($_POST['edit'])) {

  $campaign = isset($_GET['id']) ? $em->getReference('Models\Campaign', $_GET['id']) : null;

  if (isset($campaign)) {

    $client = $campaign->getCliente();
    $localities = new ArrayCollection();
    $rawLocalities = $_POST['localidades'];

    foreach ($rawLocalities as $id) {
      $locality = $em->find('Models\Locality', $id);
      $localities->add($locality);
    }

    $campaign->setLocalidades($localities);
    $campaign->setNombre($_POST['nombre_campania']);
    $campaign->setTexto($_POST['text']);

    if (!empty($_POST['cantidad_mensajes'])) {
      $campaign->setCantidadMensajes($_POST['cantidad_mensajes']);
    }

    if (!empty($_POST['estado'])) {
      $campaign->setEstado($_POST['estado']);
    }

    $client->setNombre($_POST['nombre']);
    $client->setApellido($_POST['apellido']);
    $client->setTelefono($_POST['telefono']);
    $client->setRazonSocial($_POST['razon_social']);
    $client->setCuilCuit($_POST['cuitcuil']);
    $client->setEmail($_POST['email']);

    $campaign->setCliente($client);

    $em->flush();
    header('Location: ../?id=' . $_GET['id']);
  }
}
