<?php
    include_once("../../configuracion.php");
    $datos=data_submitted();
    $sesion= new Session();
    $sesion->iniciar($datos['usnombre'],md5($datos['uspass']));
    $valido=$sesion->validar();
    if ($valido){
        header("Location:../paginaSegura.php");
    }else{
        $msj=$sesion->getMensajeError();
        $sesion->cerrar();
        header("Location:../login.php?error=$msj");
    }
?>