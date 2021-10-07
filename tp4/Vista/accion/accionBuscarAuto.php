<?php
include_once "../../configuracion.php";
include_once "../estructura/cabeceraAccion.php";

$datos = data_submitted();
$encabezado = "";
$enunciado = "";
$enlaceVolver = "";
$autoBuscado = null;
if (isset($datos['patente'])) {
    $patenteDelAuto = $datos['patente'];
    // $datos['patente'] = "'" . $patenteDelAuto . "'"; // ?
    $objAbmAuto = new AbmAuto();
    $autoBuscado = $objAbmAuto->buscar($datos);

    $encabezado = "Auto Buscado por patente";
    $enunciado = "Patente buscada: " . $patenteDelAuto;

    $enlaceVolver = "../buscarAuto.php";
}

if (isset($datos['dniDuenio'])) {
    $dniDelDuenio = $datos['dniDuenio'];
    // $datos['dniDuenio'] = "'" . $dniDelDuenio . "'"; // ?
    $objAbmAuto = new AbmAuto();
    $autoBuscado = $objAbmAuto->buscar($datos);

    $encabezado = "Autos Buscados por DNI del dueño";
    $enunciado = "Dni buscado: " . $dniDelDuenio;
    $enlaceVolver = "../autosPersona.php";
}

echo '<div class="col text-center">'; // cuerpo
echo '<h1>' . $encabezado . '</h1>';
echo '<p>' . $enunciado . '</p>';

if (count($autoBuscado) > 0) {
    if (isset($datos['patente'])) {
        echo '<div class="row">
        <div class="col border border-secondary text-light bg-dark"><strong>DNI</strong></div>
        <div class="col border border-secondary text-light bg-dark"><strong>NOMBRE Y APELLIDO</strong></div>
        <div class="col border border-secondary text-light bg-dark"><strong>FECHA NACIMIENTO</strong></div>
        <div class="col border border-secondary text-light bg-dark"><strong>TELEFONO</strong></div>
        <div class="col border border-secondary text-light bg-dark"><strong>DOMICILIO</strong></div>
        </div>';
    
        echo '<div class="row">
        <div class="col border border-secondary">' . $autoBuscado[0]->getObjDuenio()->getNroDni() . '</div>
        <div class="col border border-secondary">' . $autoBuscado[0]->getObjDuenio()->getNombre() . ' ' . $autoBuscado[0]->getObjDuenio()->getApellido() . '</div>
        <div class="col border border-secondary">' . $autoBuscado[0]->getObjDuenio()->getFechaNac() . '</div>
        <div class="col border border-secondary">' . $autoBuscado[0]->getObjDuenio()->getTelefono() . '</div>
        <div class="col border border-secondary">' . $autoBuscado[0]->getObjDuenio()->getDomicilio() . '</div>
        </div>';
    }

    if (isset($datos['dniDuenio'])) {
        echo '<div class="row">
        <div class="col border border-secondary text-light bg-dark"><strong>NOMBRE Y APELLIDO</strong></div>
        </div>';
    
        echo '<div class="row">
        <div class="col border border-secondary">' . $autoBuscado[0]->getObjDuenio()->getNombre() . ' ' . $autoBuscado[0]->getObjDuenio()->getApellido() . '</div>
        </div>';
    }
    

    echo '<br><br>';

    echo '<div class="row">
<div class="col border border-secondary bg-info"><strong>PATENTE</strong></div>
<div class="col border border-secondary bg-info"><strong>MARCA</strong></div>
<div class="col border border-secondary bg-info"><strong>MODELO</strong></div>
</div>';
    foreach ($autoBuscado as $objAuto) {
        echo '<div class="row">
        <div class="col border border-secondary">' . $objAuto->getPatente() . '</div>
        <div class="col border border-secondary">' . $objAuto->getMarca() . '</div>
        <div class="col border border-secondary">' . $objAuto->getModelo() . '</div>
        </div>';
    }


} else {
    if (isset($datos['patente'])) {
        echo '<div class="alert alert-danger" role="alert">
        No se ha encontrado ningún auto con esa patente
  </div>';
    }
    if (isset($datos['dniDuenio'])) {
        echo '<div class="alert alert-danger" role="alert">
        No se ha encontrado ningún auto asociado a ese número de documento
  </div>';
    }
}
echo '<div class="row m-3">
<a href='.$enlaceVolver.'><button class="btn btn-outline-secondary">Buscar nuevamente</button></a></div>';
echo '</div>'; // cierre cuerpo

include_once "../estructura/pieAccion.php";
