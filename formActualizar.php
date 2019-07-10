<?php

	require_once ("template/plantilla.php");
	$plantilla = new plantilla("Update event");
	require_once ("basedatos/usuarioPDO.php");
	require_once ("class/event.php");

	$events = new usuarios();

	//Check if cookie still exists, if not then session_destroy
	//$events->checkCookie();

	$id = $_GET["id"];


?>

<!DOCTYPE html>
<html lang="es">

	<?=$plantilla->showHead();?>

<body>

	<div class="container">
		<?=$plantilla->cabecera();?>
		<?=$plantilla->showNavegacion();?>
		<section>
		<?=$plantilla->formularioActualizar($id, $events->getEventKey($id), $events->getArrayCategory());?>
		</section>

		<?=$plantilla->showFooter();?>

	</div>

	<?=$plantilla->showScripts();?>

</body>
</html>