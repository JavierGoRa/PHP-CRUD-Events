<?php

    require_once ("template/plantilla.php");
    require_once ("basedatos/usuarioPDO.php");
    $plantilla = new plantilla("Add event");

	$events = new usuarios();
	
	//Check if cookie still exists, if not then session_destroy
	//$events->checkCookie();
	
?>

<!DOCTYPE html>
    <html lang="es">

    	<?=$plantilla->showHead();?>

    <body>
    	<div class="container">
    		<?=$plantilla->cabecera();?>
    		<section>
			<?php if(isset($_POST['arrayErrores'])){
				
				$plantilla->mostrarErrores();

			}
			?>
    		<?=$plantilla->formNewEvent($events->getArrayCategory());?>
    		</section>

    		<?=$plantilla->showFooter();?>

    	</div>

    	<?=$plantilla->showScripts();?>

    </body>
    </html>