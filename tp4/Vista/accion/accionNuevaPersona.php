<?php 
include_once '../../configuracion.php';
include_once "../estructura/cabeceraAccion.php";

$datos = data_submitted();
$resp = false;
$objTrans = new AbmPersona();
if (isset($datos['accion'])){
    if($datos['accion']=='nuevo'){
        if($objTrans->alta($datos)){
            $resp = true;
        }
    }
    if($resp){
        $mensaje = "<div class='alert alert-success' role='alert'>La persona se registró correctamente.</div>";
    }else {
        $mensaje = "<div class='alert alert-danger' role='alert'>La acción de registro de una persona no pudo concretarse.</div>";
    }
}

echo '<div class="col text-center">';
echo $mensaje;
echo '<div class="row m-3">
<a href="../NuevaPersona.php"><button class="btn btn-outline-secondary">Cargar otra persona</button></a></div>';
echo '</div>';


include_once "../estructura/pieAccion.php";
?>



