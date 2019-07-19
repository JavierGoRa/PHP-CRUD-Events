<?php

    require_once ("class/event.php");
    require_once ("basedatos/usuarioPDO.php");
    require_once ("template/plantilla.php");
    require_once("function/controlsession.php");

	$name = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
	$locations = filter_var($_POST['locations'],FILTER_SANITIZE_STRING);
    $date = filter_var($_POST['date'],FILTER_SANITIZE_STRING);
    $date_start = filter_var($_POST['date_start'],FILTER_SANITIZE_STRING);
    $date_end = filter_var($_POST['date_end'],FILTER_SANITIZE_STRING);
    $details = filter_var($_POST['details'],FILTER_SANITIZE_STRING);
    $email_contact = filter_var($_POST['email_contact'],FILTER_SANITIZE_EMAIL);
    $category = filter_var($_POST['id_category'],FILTER_SANITIZE_STRING);
    $link_info = filter_var($_POST['link_info'],FILTER_SANITIZE_STRING);
    $link_tickets = filter_var($_POST['link_tickets'],FILTER_SANITIZE_STRING);
    $image = base64_encode($_FILES['image_event']['tmp_name']);

    var_dump($image);

    $plantilla = new plantilla();

	$events = new usuarios();

    //$events->checkCookie();

    $newEvent = new event(null, $name, $locations, $date, $date_start, $date_end, $details, $email_contact, 0, $category, $link_info, $link_tickets, $image, $_COOKIE['session'], 1);

    /* var_dump($image);
    $file = file_get_contents($image);
    $hola = base64_encode($file);
    var_dump($hola);
	echo "<img src='data:image/jpg;base64,".$hola."' />";

    exit; */

    /* var_dump($_COOKIE['session']);

    var_dump($newEvent); */

    $events->insertar($newEvent);

    header("location:index.php");


    /* if ($events->insertar($newEvent) == false) {
        $plantilla->indexError('This email contact already exists');
    } else {
        header("location:index.php");
    } */
    
?>