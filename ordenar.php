<?php

  require_once ("class/event.php");
  require_once ("basedatos/usuarioPDO.php");

  require_once ("template/plantilla.php");

  $criterio = $_GET['criterio'];
  $id = $_GET['id'];

  $events = new usuarios();

  $nameCompany = $events->getNameCompany($id);

  $plantilla = new plantilla($nameCompany[0]);

  $countEvents = $events->getCountEvents($id);

  switch ($criterio) {
    case 'name':
      $events->ordenarPorNombre($id);
    break;
    case 'locations':
      $events->ordenarPorLocalizacion($id);
    break;
    case 'category':
      $events->ordenarPorCategoria($id);
    break;
  }
  
  $plantilla->index($events, $id, $countEvents);

?>