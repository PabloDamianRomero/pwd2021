<?php
include_once "../../configuracion.php";
include_once "../estructura/cabeceraAccion.php";

$mensaje = "";
$datos = data_submitted();

if (isset($datos['accion']) and isset($datos['patente']) and isset($datos['nroDni'])){
    if($datos['accion']=='nuevo'){
        $objAbmAuto = new AbmAuto();
        $objAbmPersona = new AbmPersona();
        $objDuenio = $objAbmPersona->crearPersonaDatos($datos);
        if($objDuenio != null){ // Se pudo crear el objDuenio
            $nuevaCol['patente'] = $datos['patente'];
            $nuevaCol['marca'] = $datos['marca'];
            $nuevaCol['modelo'] = $datos['modelo'];
            $nuevaCol['objDuenio'] = $objDuenio;
            if($objAbmAuto->alta($nuevaCol)){
                $mensaje = "<div class='alert alert-success' role='alert'>Auto cargado correctamente.</div>";
            }else{
                $mensaje = "<div class='alert alert-danger' role='alert'>No se pudo cargar el auto.</div>";
            }
        }else{
            $mensaje = "<div class='alert alert-danger' role='alert'>No se pudo cargar a la persona.</div>";
        }
    }
}else{
    $mensaje = "<div class='alert alert-danger' role='alert'>Faltan datos para realizar la operación.</div>";
}

echo '<div class="col text-center">';
echo $mensaje;
echo '</div>';

include_once "../estructura/pieAccion.php";
?>

