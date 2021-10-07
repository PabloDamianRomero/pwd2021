<?php
include_once '../../configuracion.php';
include_once "../estructura/cabeceraAccion.php";

$datos = data_submitted();
$mensaje = "";
$objTrans = new AbmPersona();
$resp = false;
if (isset($datos['accion'])){
    if($datos['accion']=='editar'){
        if($objTrans->modificacion($datos)){
            $resp = true;
        }
    }
    if($resp){
        $mensaje = "<div class='alert alert-success' role='alert'>Datos de la persona editados correctamente</div>";
    }else {
        $mensaje = "<div class='alert alert-danger' role='alert'>No se pudo editar la información de la persona</div>";
    }
}


echo '<div class="col text-center">';
echo $mensaje;
echo '<div class="row m-3">
<a href="../listaPersonas.php"><button class="btn btn-outline-secondary">Ver personas</button></a></div>';
echo '</div>';

include_once "../estructura/pieAccion.php";
