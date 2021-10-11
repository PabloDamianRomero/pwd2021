<?php
    $titulo = "PAGINA SEGURA";
    $estructuraAMostrar = "desdeVista";
    $seguro=true;
    
    include_once "estructura/cabecera.php";


    echo '<div style="margin-bottom: 20%" class="container-fluid text-center">
        <h1>Bienvenid@ '.$sesion->getUsuarioActual().'</h1>
        </div>';
    $roles=$sesion->getRol();
    $listado=false; //Si todavia no se mostro la lista de usuarios
    foreach ($roles as $rol){  //Necesito chequear todos los roles del usuario activo
        $idRol=$rol->getObjRol()->getIdRol();
        if (($idRol==1 || $idRol==2 || $idRol==3) && (!$listado)){
            include_once("listarUsuario.php");
            $listado=true;  //Para evitar que no muestre la lista mas de una vez
        }
    }


include_once "estructura/pie.php";
?>
