<?php
    include_once("../configuracion.php");
    $objAbm=new abmUsuario();
    $listaUs=$objAbm->buscar(null);
?>

    <div class="table-responsive">
    <table class="table table-striped table-dark text-center">
        <thead>
            <tr style="color: #626f74;">
                <th scope="col">ID Usuario</th>
                <th scope="col">Nombre Usuario</th>
                <?php if($idRol==1 || $idRol==2){
                    echo '<th scope="col">Contraseña</th>';}?>
                <th scope="col">Mail</th>
                <th scope="col">Deshabilitado</th>
                <?php if($idRol==1 || $idRol==2){
                    echo '<th colspan="2" scope="col" style="color: #31bad9;">Acción</th>';}?>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach ($listaUs as $obj){
                echo "<tr><th scope='row'>".$obj->getIdusuario()."</th>";
                echo "<th scope='row'>".$obj->getUsnombre()."</th>";
                if ($idRol==1 || $idRol==2){
                    echo "<th scope='row'>".$obj->getUspass()."</th>";
                }
                echo "<th scope='row'>".$obj->getUsmail()."</th>";
                $estado=$obj->getUsdeshabilitado();
                if ($estado=="0000-00-00 00:00:00"){
                    $estado="";
                }
                echo "<th scope='row'>".$estado."</th>";
                if ($idRol==1){
                    echo "<th scope='row'><a href='accion/actualizarLogin.php?idusuario=".$obj->getIdusuario()."'>editar</a></th>";
                    echo "<th scope='row'><a href='accion/eliminarLogin.php?idusuario=".$obj->getIdusuario()."'>alta/baja</a></th>";
                }
                else if ($idRol==2){   
                    //Compruebo que el usuario de la lista no sea admin. Ningun otro puede editar sus campos.
                    $objAbmRel=new AbmRelacion();
                    $arreglo=$objAbmRel->buscar(['idusuario'=>$obj->getIdusuario()]);
                    $admin=false;
                    foreach ($arreglo as $objeto){
                        if ($objeto->getObjRol()->getIdRol()==1){
                            $admin=true;
                        }
                    }
                    //Si no es Admin. procedo a habilitar el enlace de edicion.
                    if (!$admin){
                        echo "<th scope='row'><a href='accion/actualizarLogin.php?idusuario=".$obj->getIdusuario()."'>editar</a></th>";
                    }else{
                        echo "<th scope='row'></th>";
                    } 
                } 
                echo "</tr>";
            }
        ?>
        </tbody>
    </table>
    </div>