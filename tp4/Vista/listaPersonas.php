<?php
include_once "../configuracion.php";
$titulo="Listado de personas";
include_once ("estructura/cabecera.php");
$objAbmPersona = new AbmPersona();

$listaPersona = $objAbmPersona->buscar(null);

	
echo '<div style="margin-bottom: 20%" class="container-fluid">'; // cuerpo
echo '<h1 class="text-center">'.$titulo.'</h1>';
echo '<p><strong>Ej 5)</strong> Crear una página "listaPersonas.php" que muestre un listado con las personas que se
encuentran cargadas y un link a otra página “autosPersona.php” que recibe un dni de una persona y muestra
los datos de la persona y un listado de los autos que tiene asociados. Recordar usar la capa de control antes
generada, no se puede acceder directamente a las clases del ORM.</p>';

echo '<div class="container-fluid" id="main-content">
<div class="container m-4">
    <div class="row">
        <div class="col-2"><a href="NuevaPersona.php"><button class="btn btn-outline-secondary">Agregar persona</button></a></div>
        <div class="col-10"><a href="autosPersona.php"><button class="btn btn-outline-secondary">Buscar autos por persona</button></a></div>
    </div>
</div>
</div>';

 if( count($listaPersona)>0){
    echo '<div class="row">
<div class="col border border-secondary bg-info"><strong>DNI</strong></div>
<div class="col border border-secondary bg-info"><strong>APELLIDO</strong></div>
<div class="col border border-secondary bg-info"><strong>NOMBRE</strong></div>
<div class="col border border-secondary bg-info"><strong>FECHA NACIMIENTO</strong></div>
<div class="col border border-secondary bg-info"><strong>TELEFONO</strong></div>
<div class="col border border-secondary bg-info"><strong>DOMICILIO</strong></div>
</div>';

    foreach ($listaPersona as $objPersona) {
        echo '<div class="row">
            <div class="col border border-secondary bg-light">'.$objPersona->getNroDni().'</div>
            <div class="col border border-secondary bg-light">'.$objPersona->getApellido().'</div>
            <div class="col border border-secondary bg-light">'.$objPersona->getNombre().'</div>
            <div class="col border border-secondary bg-light">'.$objPersona->getFechaNac().'</div>
            <div class="col border border-secondary bg-light">'.$objPersona->getTelefono().'</div>
            <div class="col border border-secondary bg-light">'.$objPersona->getDomicilio().'</div>
        </div>';
	}
}else{
    echo '<div class="alert alert-danger text-center" role="alert">
    No existen personas cargadas en el sistema
</div>';
}


echo '</div>'; // cierre cuerpo

include_once "estructura/pie.php";
?>
