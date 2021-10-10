<?php
$estructuraAMostrar="desdeAccion";
$seguro=true;
$titulo="Nuevo Rol";
include_once("../estructura/cabecera.php");
$datos=data_submitted();
if (isset($datos['idrol'])){
    $abmRel=new AbmRelacion();
    //Primero chequeo que el usuario no posea ya el nuevo rol asignado.
    $arreglo=$abmRel->buscar(['idusuario'=>$datos['idusuario']]);
    $yaExiste=false;
    foreach ($arreglo as $objeto){
        if ($objeto->getObjRol()->getIdRol()==$datos['idrol']){
            $yaExiste=true;
        }
    }
    //Si no tiene el rol, procede a asignarlo.
    if (!$yaExiste){
        $resp=$abmRel->alta($datos);
        if ($resp){
            echo '<div class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                <div>
                    El rol fue asignado con exito
                </div>
            </div>';
        }else{
            echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div>
                    Error en la asignacion del rol
                </div>
            </div>';
        }
    }else{
        echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div>
                    Error.  El usuario ya posee el rol asignado.
                </div>
            </div>';
    }
    
}else{
    echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div>
                    No se encontro ningun id para el nuevo rol
                </div>
            </div>';
}
echo "<a href='../paginaSegura.php'><button type='button' class='mt-5 btn btn-warning'>Volver</button></a>";
include_once("../estructura/pie.php");
?>