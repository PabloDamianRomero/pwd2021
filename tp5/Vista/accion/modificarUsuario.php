<?php
$estructuraAMostrar="desdeAccion";
$seguro=true;
$titulo="Modificar Usuario";
include_once("../estructura/cabecera.php");
$datos=data_submitted();
$abmUs=new abmUsuario();
$resp=$abmUs->modificacion($datos);
if ($resp){
    echo '<div class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                <div>
                    Modificacion realizada con éxito
                </div>
            </div>';
}else{
    echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div>
                    Error en la modificación de los datos
                </div>
            </div>';
}
echo "<a href='../paginaSegura.php'><button type='button' class='mt-5 btn btn-warning'>Volver</button></a>";
include_once("../estructura/pie.php");
?>