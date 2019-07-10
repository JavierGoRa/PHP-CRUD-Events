<?php
    require_once ("template/plantilla.php");

    public function valUsername($username){
        foreach ($this->usuarios as $key => $value) {
            if ($value->getUsername() == $username) {
                return true;
            } 
        }
        return false;
    }

    public function valUsuario(usuario $usuario){
        $arrayErrores=array();
        if ($this->valUsername($usuario->getUsername()) !== false) {
            $arrayErrores[]="Username ya existente";
        }
        return $arrarErrore;
    }


?>