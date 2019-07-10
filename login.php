<?php

    require_once("template/plantilla.php");
    require_once("usuarios/modelo.php");
    require_once("basedatos/usuarioPDO.php");

    $plantilla = new plantilla();

    /* $usuario = $usuarioModelo->getUserEmail($email);

    if ($usuario === false){
        $errores[] = "usuario no registrado";
        session_start();
        $_SESSION['error'] = $errores;

        var_dump($errores);

        ?>

        <script type="text/typetext">
            alert(<?=$errores?>);
        </script>

<?php

    }  else if (!password_verify[]){

    }  */ 

?> 

<!DOCTYPE html>
    <html lang="es">

    	<?=$plantilla->showHead();?>

    <body>
    	<div class="container">
    		<?=$plantilla->cabecera();?>
    		<section>
    		<?=$plantilla->formIniciarSesion();?>
    		</section>

    		<?=$plantilla->showFooter();?>

    	</div>

    	<?=$plantilla->showScripts();?>

    </body>
    </html>