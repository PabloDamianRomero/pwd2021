<?php
include_once "../configuracion.php";
$titulo="Listado de usuarios";
include_once ("estructura/cabecera.php");
$objAbmUsuario = new AbmUsuario();
$listaUsuario = $objAbmUsuario->buscar(null);	
?>

<div style="margin-bottom: 20%" class="container-fluid">
<h1 class="text-center font-montserrat"><?php echo $titulo ?></h1>
<p><span class="incisoEj negrita">Ej 4) </span>Implementar en la capa de la vista: un script Vista/listarUsuario.php que liste los usuario registrados y permita actualizar sus datos o
realizar un borrado lógico. Las acciones que se van a poder invocar son:
accion/actualizarLogin.php y accion/eliminarLogin.php</p>
<?php

 if(count($listaUsuario)>0){
     echo '<div class="table-responsive">';
     echo '<table class="table table-striped table-dark text-center">'; // INICIO DE LA TABLA
     echo '<thead>';
     echo '<tr style="color: #626f74;">';
     echo '<th scope="col">ID Usuario</th>';
     echo '<th scope="col">Nombre Usuario</th>';
     echo '<th scope="col">Contraseña</th>';
     echo '<th scope="col">Mail</th>';
     echo '<th scope="col">Deshabilitado</th>';
     echo '<th colspan="2" scope="col" style="color: #31bad9;">Acción</th>';
     echo '</tr>';
     echo '</thead>';
     echo '<tbody>'; // INICIO tBODY
    foreach ($listaUsuario as $objUsuario) {
        echo '<tr>';
        echo '<th scope="row">'.$objUsuario->getIdUsuario().'</th>';
        echo '<th scope="row">'.$objUsuario->getUsNombre().'</th>';
        echo '<th scope="row">'.$objUsuario->getUsPass().'</th>';
        echo '<th scope="row">'.$objUsuario->getUsMail().'</th>';
        echo '<th scope="row">'.$objUsuario->getUsDeshabilitado().'</th>';
        echo '<th scope="row" style="background-color:#000;"><a href="#?idusuario='.$objUsuario->getIdUsuario().'" style="color:#63ff3c;">Editar</a></th>';
        echo '<th scope="row"><a href="#?idusuario='.$objUsuario->getIdUsuario().'" style="color:#ff3c3c;">Borrar</a></th>';
        echo '</tr>';
	}
    echo '</tbody>'; // CIERRE tBODY
    echo '</table>'; // CIERRE TABLA
    echo '</div>'; // CIERRE table-responsive
}else{
    echo '<div class="alert alert-danger text-center" role="alert">No existen usuarios cargadas en el sistema.</div>';
}
?>

</div> <!-- CIERRE DE CUERPO -->

<?php
include_once "estructura/pie.php";
?>
