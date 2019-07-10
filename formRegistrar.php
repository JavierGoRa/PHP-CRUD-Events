<?php

    require_once ("template/plantilla.php");
    require_once ("basedatos/usuarioPDO.php");
    $plantilla = new plantilla("Añadir Usuario");

    $usuarios = new usuarios();

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
    		<?=$plantilla->formRegistrar();?>
    		</section>

    		<?=$plantilla->showFooter();?>

    	</div>

    	<?=$plantilla->showScripts();?>

    </body>
    </html>