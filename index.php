<?php

	require_once("function/controlsession.php");

	session_start();

	if (!isset($_SESSION['id'])) {

		header("location:login.php");
	
	} else { 

		require_once ("class/event.php");

		require_once ("basedatos/usuarioPDO.php");

		require_once ("template/plantilla.php");

		$events = new usuarios();

		$nameCompanyTemplate = $events->getNameCompany($_SESSION['id']);

		$countEvents = $events->getCountEvents($_SESSION['id']);

		$plantilla = new plantilla($nameCompanyTemplate[0]);

		//Check if cookie still exists, if not then session_destroy
		//$events->checkCookie();

		//set cookie to create query of this company
		setcookie('session', $_SESSION['id'], time() + 31622400);

		$events->getEvents($_SESSION['id']);

		$plantilla->index($events, $_SESSION['id'], $countEvents[0]);
 

		/* $file = file_get_contents('SelskApp-iconpng.png');
		$hola = base64_encode($file);
		echo "<img src='data:image/jpg;base64,".$hola."' />"; */

	}

?>