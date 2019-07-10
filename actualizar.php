<?php

	require_once ("class/event.php");
	require_once ("basedatos/usuarioPDO.php");

    require_once ("template/plantilla.php");
    $events = new usuarios();

    //Check if cookie still exists, if not then session_destroy
    //$events->checkCookie()

    $id = $_GET["id"];

    $name =  $_POST["name"];
    $locations =  $_POST["locations"];
    $date =  $_POST["date"];
    $date_start =  $_POST["date_start"];
    $date_end =  $_POST["date_end"];
    $details =  $_POST["details"];
    $email_contact =  $_POST["email_contact"];
    $category =  $_POST["id_category"];
    $link_info =  $_POST["link_info"];
    $link_tickets =  $_POST["link_tickets"];

    $count_clicks = $events->getCountClicks($id);

    $updateEvent = new event(null, $name, $locations, $date, $date_start, $date_end, $details, $email_contact, $count_clicks[0], $category, $link_info, $link_tickets, $_COOKIE['session']);

    $plantilla = new plantilla("Práctica 2");

    $events->actualizarDato($id, $updateEvent);

    header("location:index.php");

?>