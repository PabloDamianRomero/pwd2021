<?php
$estructuraAMostrar="desdeAccion";
$seguro=true;
$titulo="Actualizar Login";
include_once("../estructura/cabecera.php");
$datos=data_submitted();
if (isset($datos['idusuario'])){
    $objAbm=new abmUsuario();
    $arreglo=$objAbm->buscar($datos);
    if (count($arreglo)==1){
        $objUs=$arreglo[0];
        echo "<h4>Modificar Datos</h4>";
        
        echo "<form method='POST' action='modificarUsuario.php' onSubmit='return validar2();' novalidate>
        <div class='table-responsive'>
        <table class='table table-striped table-dark text-center'>
        <tr style='color: #626f74;'>
            <th scope='col'>Nombre</th>
            <th scope='col'>Contraseña</th>
            <th scope='col'>Mail</th>
            <th colspan='2' scope='col' style='color: #31bad9;'>Acción</th>
        </tr>
        
        <tr style='color: #626f74;'>
            <th scope='row'><input type='text' id='usnombre' name='usnombre' value='".$objUs->getUsnombre()."'></th>
            <th scope='row'><input type='text' id='uspass' name='uspass' placeholder='Contraseña' required></th>
            <p id='pass-text'></p>
            <p id='user-text'></p>
            <th scope='row'><input type='text' name='usmail' value='".$objUs->getUsmail()."'></th>
            <th scope='row'><input type='submit' value='Modificar'></th>
            <input type='hidden' name='idusuario' value='".$datos['idusuario']."'>
            <input type='hidden' name='usdeshabilitado' value='".$objUs->getUsdeshabilitado()."'>
        </tr>
        </table>
        </div>
        </form>
        </br>";
        echo "<h4>Eliminar un Rol</h4>";
        $objAbmRel=new AbmRelacion();
        $arregloRel=$objAbmRel->buscar($datos);
        foreach ($arregloRel as $objRel){
            $abmRol=new abmRol();
            $objRol=$abmRol->buscar($objRel->getObjRol()->getIdRol());
            echo "<div class='table-responsive'>
                <table class='table table-striped table-dark text-center'>
                <tr style='color: #626f74;'>
                    <th scope='col'>ID Rol</th>
                    <th scope='col'>Descripcion</th>
                    <th colspan='2' scope='col' style='color: #31bad9;'>Acción</th>
                </tr>
                <tr>
                    <th scope='row'>".$objRol->getIdRol()."</th>
                    <th scope='row'>".$objRol->getRolDescripcion()."</th>
                    <th scope='row'><a href='eliminarRol.php?idusuario=".$datos['idusuario']."&idrol=".$objRol->getIdRol()."'><button>Eliminar</button></a></th>
                </tr>
                </table>
                </div>";
        }
        echo "</br></br>";
        echo "<h4>Asignar un Rol</h4>";
        echo "<form method='post' action='nuevoRol.php'>
                <table class='table table-striped table-dark text-center' style='width:fit-content'>
                <tr>
                    <td><input type='text' name='idrol' placeholder='Id Rol' pattern=[1-4]{1}></td>
                    <td><input type='hidden' name='idusuario' value='".$datos['idusuario']."'></td>
                    <td><input type='submit' value='Nuevo Rol'></td>
                    <p>Roles del 1 al 4</p>
                </tr>
                </table>
            </form>";
    }
}else{
    echo "No se ingreso el id de usuario";
}
echo "<a href='../paginaSegura.php'><button type='button' class='mt-5 btn btn-warning'>Volver</button></a>";
include_once("../estructura/pie.php");
?>

