<?php
    $titulo = "PAGINA SEGURA";
    $estructuraAMostrar = "desdeVista";
    $seguro=true;
    //include_once "../configuracion.php";
    include_once "estructura/cabecera.php";
    // $sesion=new Session();
    // $activa=$sesion->activa();
    // if ($activa){
    //     echo "Sesión iniciada. Bienvenido ".$sesion->getUsuarioActual()."</br>";
    //     $roles=$sesion->getRol();
    //     $listado=false; //Si todavia no se mostro la lista de usuarios
    //     foreach ($roles as $rol){
    //         $idRol=$rol->getIdRol();
    //         if (($idRol==1 || $idRol==2 || $idRol==3) && (!$listado)){
    //             include_once("listarUsuario.php");
    //             $listado=true;  //Para evitar que no muestre la lista mas de una vez
    //         }
    //     }
    //     echo "<a href='accion/cerrarSesion.php'><input type='button' value='Cerrar Sesion'></a>";
    // }else{
    //     header("Location:login.php");
    // }

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
