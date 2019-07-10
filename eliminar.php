<?php

  require_once ("class/event.php");
  require_once ("basedatos/usuarioPDO.php");

  $key = $_GET["id"];

  $events = new usuarios();

  //Check if cookie still exists, if not then session_destroy
  //$events->checkCookie();

  $events->deleteEvent($key);

  header("location:index.php");

?>