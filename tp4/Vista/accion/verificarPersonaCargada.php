<?php
include_once "../../configuracion.php";
include_once "../estructura/cabeceraAccion.php";

$datos = data_submitted();
$titulo = "<h3 class='text-center'>Nuevo Auto</h3>";
$enunciado = "<p><strong>Ej 7)</strong> Crear una página “NuevoAuto.php” que contenga un formulario en el que se permita cargar
todos los datos de un auto (incluso su dueño). Estos datos serán enviados a una página
“accionNuevoAuto.php” que cargue un nuevo registro en la tabla auto de la base de datos. Se debe chequear
antes que la persona dueña del auto ya se encuentre cargada en la base de datos, de no ser así mostrar un
link a la página que permite carga una nueva persona. Se debe mostrar un mensaje que indique si se pudo o
no cargar los datos Utilizar css y validaciones javaScript cuando crea conveniente. Recordar usar la capa de
control antes generada, no se puede acceder directamente a las clases del ORM.</p>";
$personaBuscada = array();

echo $titulo;
echo $enunciado;


if (isset($datos['nroDni'])) {
    $objAbmPersona = new AbmPersona();
    $personaBuscada = $objAbmPersona->buscar($datos);
    
    if (count($personaBuscada) > 0) {
        $datosTitular = $objAbmPersona->crearArregloParaPersona($personaBuscada[0]); // genero un nuevo arreglo con las claves de la persona para utilizar sus valores en el formulario

        echo '<div class="alert alert-success text-center" role="alert">Persona encontrada.</div>';

echo '<form class="card needs-validation" method="POST" action="accionNuevoAuto.php" novalidate="" style="max-width:400px; margin:auto; padding:20px;">
<p class="seccion mb-2 text-center bg-secondary text-light">DATOS VEHICULO</p>
<div class="row">
    <div class="col-6">
        <label for="patente" class="form-label m-2">Patente</label>
        <input type="text" id="patente" name="patente" class="form-control" placeholder="FSR 123" pattern="[a-z A-Z 0-9]{7,}" required="">
        <div class="invalid-feedback">Ingrese patente correctamente</div>
    </div>
    <div class="col-6">
        <label for="marca" class="form-label m-2">Marca</label>
        <input type="text" id="marca" name="marca" class="form-control" placeholder="Ford" pattern="[a-z A-Z]{1,}" required="">
        <div class="invalid-feedback">Ingrese marca correctamente</div>
    </div>
</div>
<div>
    <label for="modelo" class="form-label m-2">Modelo</label>
    <input type="text" id="modelo" name="modelo" class="form-control" placeholder="90/1990" pattern="[0-9]{2,4}" required="">
    <div class="invalid-feedback">Ingrese modelo correctamente</div>
</div>
<p class="seccion mt-2 mb-2 text-center bg-secondary text-light">DATOS TITULAR</p>
<div class="row">
    <div class="col-6">
        <label for="nombre" class="form-label m-2">Nombre</label>
        <input type="text" id="nombre" name="nombre" class="form-control" value="'.$datosTitular["nombre"].'" readonly pattern="[a-z A-Z]{1,}" required>
        <div class="invalid-feedback">Ingrese nombre correctamente</div>
    </div>
    <div class="col-6">
        <label for="apellido" class="form-label m-2">Apellido</label>
        <input type="text" id="apellido" name="apellido" class="form-control" value="'.$datosTitular["apellido"].'" readonly pattern="[a-z A-Z]{1,}" required>
        <div class="invalid-feedback">Ingrese apellido correctamente</div>
    </div>
    <div class="col-6">
        <label for="dni" class="form-label m-2">DNI</label>
        <input type="text" id="nroDni" name="nroDni" class="form-control" value="'.$datosTitular["nroDni"].'" readonly required>
        <div class="invalid-feedback">Ingrese DNI correctamente</div>
    </div>
    <div class="col-6">
        <label for="fechaNac" class="form-label m-2">Fecha de Nacimiento</label>
        <input type="text" id="fechaNac" name="fechaNac" class="form-control" value="'.$datosTitular["fechaNac"].'" readonly pattern="(?:19|20)(?:[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-8])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:29|30))|(?:(?:0[13578]|1[02])-31))|(?:[13579][26]|[02468][048])-02-29)" required>
        <div class="invalid-feedback">Ingrese Fecha correctamente</div>
    </div>
    <div class="col-6">
        <label for="telefono" class="form-label m-2">Teléfono</label>
        <input type="text" id="telefono" name="telefono" class="form-control" value="'.$datosTitular["telefono"].'" readonly pattern="[0-9]{6,}" required>
        <div class="invalid-feedback">Ingrese telefono correctamente</div>
    </div>
    <div class="col-6">
        <label for="domicilio" class="form-label m-2">Domicilio</label>
        <input type="text" id="domicilio" name="domicilio" class="form-control" value="'.$datosTitular["domicilio"].'" readonly pattern="[a-z A-Z 0-9]{1,}" required>
        <div class="invalid-feedback">Ingrese domicilio correctamente</div>
    </div>
</div>

<input id="accion" name ="accion" value="nuevo" type="hidden">
                 <button class="btn btn-primary text-white m-3" type="submit">Cargar</button>
</form>';

    } else {
        echo '<div class="alert alert-danger text-center" role="alert">No se ha encontrado persona con el número de documento ingresado.</div>';
        echo '<div class="row m-3 text-center"><a href="../NuevaPersona.php"><button class="btn btn-success">Agregar persona</button></a></div>';
    }
}

echo '<div class="col text-center">'; // cuerpo


echo '<div class="row m-3">
<a href="../NuevoAuto.php"><button class="btn btn-outline-secondary">Volver</button></a></div>';
echo '</div>'; // cierre cuerpo

include_once "../estructura/pieAccion.php";
