<?php

$campaigns = $em->getRepository('Models\Campaign')->findAll();

foreach ($campaigns as $campaign) {
  switch ($campaign->getEstado()) {
    case 'CREADA':
      echo "
        <div class='campaign-box'>
          <div class='campaign-left'>
            <div class='icon -created'>
              <i class='bx bx-message-square-add'></i>
            </div>

            <div class='campaign-data'>
              <h3 class='title'>{$campaign->getNombre()}</h3>

              <div class='campaign-tags'>
                <span class='tag'>
                  <i class='bx bx-calendar-alt'></i> {$campaign->getFormattedFechaInicio()}
                </span>
                <span class='tag'>
                  <i class='bx bx-pulse'></i> {$campaign->getEstado()}
                </span>
                <span class='tag'>
                  <i class='bx bx-comment'></i> {$campaign->getCantidadMensajes()}
                </span>
              </div>
            </div>
          </div>

          <div class='campaign-right'>
            <span class='icon'>
              <i class='bx bx-dots-vertical-rounded'></i>
            </span>

            <div class='campaign-menu' data-campaign='{$campaign->getId()}'>
              <a class='button' href='./public/show.php?id={$campaign->getId()}'>
                <i class='bx bx-show'></i> Ver
              </a>

              <a class='button' href='./public/edit.php?id={$campaign->getId()}'>
                <i class='bx bxs-edit'></i> Editar
              </a>

              <a class='button' href='./public/delete.php?id={$campaign->getId()}'>
                <i class='bx bx-x-circle'></i> Eliminar
              </a>
            </div>
          </div>
        </div>
      ";
      break;
    case 'EN EJECUCIÓN':
      echo "
        <div class='campaign-box'>
          <div class='campaign-left'>
            <div class='icon -executed'>
              <i class='bx bx-message-square-detail'></i>
            </div>

            <div class='campaign-data'>
              <h3 class='title'>{$campaign->getNombre()}</h3>

              <div class='campaign-tags'>
                <span class='tag'>
                  <i class='bx bx-calendar-alt'></i> {$campaign->getFormattedFechaInicio()}
                </span>
                <span class='tag'>
                  <i class='bx bx-pulse'></i> {$campaign->getEstado()}
                </span>
                <span class='tag'>
                  <i class='bx bx-comment'></i> {$campaign->getCantidadMensajes()}
                </span>
              </div>
            </div>
          </div>

          <div class='campaign-right'>
            <span class='icon'>
              <i class='bx bx-dots-vertical-rounded'></i>
            </span>

            <div class='campaign-menu' data-campaign='{$campaign->getId()}'>
              <a class='button' href='./public/show.php?id={$campaign->getId()}'>
                <i class='bx bx-show'></i> Ver
              </a>

              <a class='button' href='./public/edit.php?id={$campaign->getId()}'>
                <i class='bx bxs-edit'></i> Editar
              </a>

              <a class='button' href='./public/delete.php?id={$campaign->getId()}'>
                <i class='bx bx-x-circle'></i> Eliminar
              </a>
            </div>
          </div>
        </div>
      ";
      break;
    case 'FINALIZADA':
      echo "
        <div class='campaign-box'>
          <div class='campaign-left'>
            <div class='icon -ended'>
              <i class='bx bx-message-square-x'></i>
            </div>

            <div class='campaign-data'>
              <h3 class='title'>{$campaign->getNombre()}</h3>

              <div class='campaign-tags'>
                <span class='tag'>
                  <i class='bx bx-calendar-alt'></i> {$campaign->getFormattedFechaInicio()}
                </span>
                <span class='tag'>
                  <i class='bx bx-pulse'></i> {$campaign->getEstado()}
                </span>
                <span class='tag'>
                  <i class='bx bx-comment'></i> {$campaign->getCantidadMensajes()}
                </span>
              </div>
            </div>
          </div>

          <div class='campaign-right'>
            <span class='icon'>
              <i class='bx bx-dots-vertical-rounded'></i>
            </span>

            <div class='campaign-menu' data-campaign='{$campaign->getId()}'>
              <a class='button' href='./public/show.php?id={$campaign->getId()}'>
                <i class='bx bx-show'></i> Ver
              </a>

              <a class='button' href='./public/edit.php?id={$campaign->getId()}'>
                <i class='bx bxs-edit'></i> Editar
              </a>

              <a class='button' href='./public/delete.php?id={$campaign->getId()}'>
                <i class='bx bx-x-circle'></i> Eliminar
              </a>
            </div>
          </div>
        </div>
      ";
      break;
  }
}
