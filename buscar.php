<?php

  require_once ("class/event.php");
  require_once ("basedatos/usuarioPDO.php");

  require_once ("template/plantilla.php");

  $plantilla = new plantilla("Práctica 2");

  $expresion = $_POST['expBusqueda'];

  $events = new usuarios();

  $events->buscar($expresion, $_COOKIE['session']);

  $plantilla->search($events);

?>