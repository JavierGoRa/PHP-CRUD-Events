<?php

    require_once("usuarios/modelo.php");
    require_once("basedatos/usuarioPDO.php");

    $result = new usuarios();

    $sesion = $result->logear($_POST['email'], $_POST['password']);

    /* if ($sesion === false) {

?>

        <script type="text/javascript">
            var error="Error. Check login data.";
            alert(error);
            header("location:login.php");
            $result->indexErrores($arrayError)
        </script>

<?php

    } else { */

        session_start();
        $_SESSION["id"]=$sesion;
        header('Location:index.php');
        
    /* } */

?>