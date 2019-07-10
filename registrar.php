<?php

    require_once ("class/company.php");
    require_once ("basedatos/usuarioPDO.php");
    require_once ("template/plantilla.php");

    $plantilla = new plantilla();

    $name = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
	$region = filter_var($_POST['region'],FILTER_SANITIZE_STRING);
    $location = filter_var($_POST['location'],FILTER_SANITIZE_STRING);
    $cif = filter_var($_POST['cif'],FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'],FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'],FILTER_SANITIZE_STRING);

	$events = new usuarios();

    $newCompany = new company(null, $name, $region, $location, $cif, $email, $password);

    if ($events->addNewCompany($newCompany) == false) {
        $plantilla->indexError('This email or CIF already exists');
    } else {
        header("location:index.php");
    }

?>