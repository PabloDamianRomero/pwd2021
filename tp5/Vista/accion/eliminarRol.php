<?php
$estructuraAMostrar="desdeAccion";
$seguro=true;
$titulo="Eliminar Rol";
include_once("../estructura/cabecera.php");
$datos=data_submitted();
// Primero verifico que, si el rol a eliminar es Admin, haya otro Admin para evitar insconsistencia en la BD.
$objAbmRel=new AbmRelacion();
$arregloUs=$objAbmRel->buscar($datos);
$procede=true;
$cerrarSes=false;
if($arregloUs[0]->getObjRol()->getIdRol()==1){
    $procede=false;
    $otrosAdmin=$objAbmRel->buscar(['idrol'=>1]);
    if (count($otrosAdmin)>=2){
        $procede=true;
    }
    //Chequeo tambien si el rol a eliminarse es de la sesion activa. De ser asi, se debera cerrar la sesion luego del cambio.
    $usSesion=$sesion->getUsuario();
    if ($usSesion->getIdusuario()==$datos['idusuario']){
        $cerrarSes=true;
    }
}

// De ser posible, se continua con la eliminacion del rol.
if ($procede){
    $resp=$objAbmRel->baja($datos);
    if ($resp){
        if($cerrarSes){
            $sesion->cerrar();
        }
        echo '<div class="alert alert-success d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <div>
                        El rol se elimino con exito
                    </div>
                </div>';
                
    }else{
        echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div>
                        No se pudo eliminar el rol
                    </div>
                </div>';
    }
}else{
    echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div>
                Error al eliminar rol. Debe haber mas de un Administrador para realizar esta operacion.
            </div>
        </div>';
}

echo "<a href='../paginaSegura.php'><button type='button' class='mt-5 btn btn-warning'>Volver</button></a>";
include_once("../estructura/pie.php");
?>