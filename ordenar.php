<?php

  require_once ("class/event.php");
  require_once ("basedatos/usuarioPDO.php");

  require_once ("template/plantilla.php");

  $criterio = $_GET['criterio'];
  $id = $_GET['id'];

  var_dump($criterio);
  var_dump($id);

  $plantilla = new plantilla("Práctica 2");

  $events = new usuarios();

  $countEvents = $events->getCountEvents($id);
 
  $events->ordenar($id, $criterio);
  
  $plantilla->index($events, $id, $countEvents);


?>