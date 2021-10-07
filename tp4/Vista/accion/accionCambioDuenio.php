<?php
include_once '../../configuracion.php';
include_once "../estructura/cabeceraAccion.php";

$datos = data_submitted();
$mensaje = "";
if (isset($datos['accion']) and isset($datos['patente']) and isset($datos['dniDuenio'])){
    if($datos['accion']=='editar'){
        $objAbmAuto = new AbmAuto();
        $patenteBusca['patente'] = $datos['patente'];
        $autoBuscado = $objAbmAuto->buscar($patenteBusca); // busco si existe el auto en la bd
        if(count($autoBuscado)>0){ // si encontró al auto busco a la persona
            $dnibusca['nroDni'] = $datos['dniDuenio'];
            $objAbmPersona = new AbmPersona();
            $personaBuscada = $objAbmPersona->buscar($dnibusca);
            if(count($personaBuscada)>0){ // si existe la persona
                $nuevoObjAuto = $objAbmAuto->cambiarDuenioAlAuto($autoBuscado[0], $personaBuscada[0]); // cambio el objDuenio viejo del array asociativo del auto por el nuevo
                 $nuevaCol = $objAbmAuto->crearArregloParaAutoNuevo($nuevoObjAuto); // genero un nuevo arreglo con las claves de un auto para poder modificar sus datos
                  if($objAbmAuto->modificacion($nuevaCol)){
                      $mensaje = "<div class='alert alert-success' role='alert'>Dueño del auto cambiado correctamente.</div>";
                  }else{
                      $mensaje = "<div class='alert alert-danger' role='alert'>No se pudo cambiar de dueño.</div>";
                  }

            }else{
                $mensaje = "<div class='alert alert-danger' role='alert'>No existe la persona con dni ingresado.</div>";
            }
        }else{
            $mensaje = "<div class='alert alert-danger' role='alert'>La patente ingresada no existe.</div>";
        }
    }
}

echo '<div class="col text-center">';
echo $mensaje;
echo '<div class="row m-3">
<a href="../CambioDuenio.php"><button class="btn btn-outline-secondary">Volver</button></a></div>';
echo '</div>';

include_once "../estructura/pieAccion.php";
?>