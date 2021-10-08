<?php
$titulo = "Cerrar Login";
$estructuraAMostrar = "desdeAccion";
include_once "../../configuracion.php";
include_once "../estructura/cabecera.php";
?>

<?php
/**
 * Cierra la sesión
 */
include_once "../../configuracion.php";
$objLogin = new Session();
if($objLogin->cerrar()){

  echo '<div class="card text-center" style="margin-left: auto; margin-right: auto;">';
  echo '<div class="card-body">';
  echo '<h5 class="card-title text-black mb-5">Sesión cerrada</h5>';
  echo '<a href="../login.php" class="btn btn-primary">Login</a>';
  echo '</div>';
  echo '</div>';

}else{
  echo '<div class="alert alert-danger" role="alert">';
  echo $objLogin->getError();
  echo '</div>';
}
?>

<?php
include_once "../estructura/pie.php";
?>

