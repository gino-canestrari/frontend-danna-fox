<?php


require(__DIR__ . '/../../vendor/autoload.php');
$dotenv = Dotenv\Dotenv::createImmutable('../');
$dotenv->load();
require(__DIR__ . '/../../config/bootstrap.php');

$em = GetEntityManager();

$localidades = $em->getRepository('Models\Locality')->findAll();
$count = $em->getRepository('Models\Campaign')->count([]);
?>

<div class="content-box -active" id="home">

  <div class="content-header">
    <h2 class="title">Campañas Actuales</h2>
    <!-- TODO: Insertar cantidad dinamicamente -->
    <span class="quantity"><?php echo $count . '/' . $count ?></span>
  </div>

  <div class="content-body">
    <!-- TODO: Cargar dinamicamente las campañas -->
    <?php include("./includes/campaigns.php") ?>
  </div>

</div>

<div class="content-box" id="add-campaign">

  <div class="content-header">
    <h2 class="title">Agregar Campaña</h2>
  </div>

  <div class="content-body">
    <form action="./public/add.php" method="post" name="add">
      <div class="row content-form">
        <div class="col-xs-4 form-group">
          <label for="nombre">Nombre</label>
          <input class="form-control" type="text" name="nombre" id="nombre" maxlength="255" required>
        </div>

        <div class="col-xs-4 form-group">
          <label for="apellido">Apellido</label>
          <input class="form-control" type="text" name="apellido" id="apellido" maxlength="255" required>
        </div>

        <div class="col-xs-4 form-group">
          <label for="telefono">Telefono</label>
          <input class="form-control" type="number" name="telefono" id="telefono" maxlength="10" required>
        </div>

        <div class="col-xs-4 form-group">
          <label for="razon_social">Razón Social</label>
          <input class="form-control" type="text" name="razon_social" id="razon_social" maxlength="255" required>
        </div>

        <div class="col-xs-4 form-group">
          <label for="cuitcuil">Cuit/Cuil</label>
          <input class="form-control" type="number" name="cuitcuil" id="cuitcuil" maxlength="11" required>
        </div>

        <div class="col-xs-4 form-group">
          <label for="email">Email</label>
          <input class="form-control" type="email" name="email" id="email" maxlength="255" required>
        </div>

        <div class="col-xs-6 form-group">
          <label for="nombre_campania">Nombre Campaña</label>
          <input class="form-control" type="text" name="nombre_campania" id="nombre_campania" maxlength="50" required>
        </div>

        <div class="col-xs-6 form-group">
          <label for="cantidad_mensajes">Cantidad Mensajes</label>
          <select class="form-control" name="cantidad_mensajes" id="cantidad_mensajes" required>
            <option value="7000">7.000</option>
            <option value="14000">14.000</option>
            <option value="21000">21.000</option>
            <option value="28000">28.000</option>
            <option value="35000">35.000</option>
            <option value="42000">42.000</option>
            <option value="49000">49.000</option>
            <option value="56000">56.000</option>
            <option value="63000">63.000</option>
            <option value="70000">70.000</option>
          </select>
        </div>

        <div class="col-xs-12 form-group">
          <label for="text">Descripción</label>
          <textarea class="form-control" name="text" id="text" maxlength="160" required></textarea>
        </div>

        <div class="col-xs-12 form-group">
          <label for="localidades">Localidades</label>
          <select class="form-control" name="localidades[]" id="localidades" required multiple="multiple">
            <?php
            foreach ($localidades as $localidad) {
              echo '<option value="' . $localidad->getId() . '">' . $localidad->getNombre() . '</option>';
            }
            ?>
          </select>
        </div>

        <div class="col-xs-12 form-group">
          <button class="btn btn-block" name="submit">Enviar</button>
        </div>
      </div>

    </form>
  </div>

</div>