<?php
$titulo = "PAGINA SEGURA";
$estructuraAMostrar = "vistaSegura";
include_once "../configuracion.php";
include_once "estructura/cabecera.php";
?>

<div style="margin-bottom: 20%" class="container-fluid text-center">
    <h1>Bienvenid@ <?php echo $objUsuario->getUsNombre(); ?></h1>
</div>

<?php
include_once "estructura/pie.php";
?>