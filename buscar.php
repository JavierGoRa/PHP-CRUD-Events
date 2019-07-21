<?php

  require_once ("class/event.php");
  require_once ("basedatos/usuarioPDO.php");

  require_once ("template/plantilla.php");

  $expresion = $_POST['expBusqueda'];
  $id = $_GET["id"];

  var_dump($expresion);
  var_dump($id);
    
  $events = new usuarios();

  $nameCompany = $events->getNameCompany($id);

  $plantilla = new plantilla($nameCompany[0]);

  $countEvents = $events->getCountEvents($id);

  $events->buscar($expresion, $id);

  $plantilla->index($events, $id, $countEvents);

?>