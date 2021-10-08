<?php
/**
 * recibe el nombre de usuario y clave desde el formulario de  login
 * inicia el objeto Login y lo intenta validar
 *   si valida redirige a paginaSegura.php
 *   si no muestra el error
 */
include_once "../../configuracion.php";
$datos = data_submitted();

$objLogin = new Session();
$objLogin->iniciar($datos['usnombre'], $datos['uspass']);

if ($objLogin->validar()) {
    // echo "SE LOGUEÓ";
    header('location:../paginaSegura.php');
    exit();
} else {
    echo $objLogin->getError();
    // header('location:../login.php');
    exit();
}
