<?php

    include ("basedatos/usuarioPDO.php");

    $aplicacion = new usuarios();

    var_dump($aplicacion);

    function eliminar($id){
        try {
            $this->$aplicacion = $this->$aplicacion->prepare("delete from usuarios where id = :id");
            $aplicacion->bindValue(':id', $id);
            $aplicacion->execute();
        } catch (PDOException $e) {
            if ($e->errorInfo[0] == 23000) {
                exit('<script type="text/javascript">alert("Actualmente existe un problema. Pruebe mas tarde");window.location.href="./index.php"</script>');
            } else {
                exit($e->getMessage());
            }
        }
    }

?>