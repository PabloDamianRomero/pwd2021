<?php
include_once "../../configuracion.php";
include_once "../estructura/cabeceraAccion.php";

$datos = data_submitted();
$titulo = "<h3 class='text-center'>Modificar datos de la persona</h3>";
$enunciado = "<p><strong>Ej 9)</strong> Crear una página “BuscarPersona.html” que contenga un formulario que permita cargar un
numero de documento de una persona. Estos datos serán enviados a una página “accionBuscarPersona.php”
busque los datos de la persona cuyo documento sea el ingresado en el formulario los muestre en un nuevo
formulario; a su vez este nuevo formulario deberá permitir modificar los datos mostrados (excepto el nro de
documento) y estos serán enviados a otra página “ActualizarDatosPersona.php” que actualiza los datos de la
persona. Utilizar css y validaciones javaScript cuando crea conveniente. Recordar usar la capa de control
antes generada, no se puede acceder directamente a las clases del ORM.</p>";
$enlaceVolver = "";
$personaBuscada = array();

echo $titulo;
echo $enunciado;


if (isset($datos['nroDni'])) {
    $objAbmPersona = new AbmPersona();
    $personaBuscada = $objAbmPersona->buscar($datos);
    if (count($personaBuscada) > 0) {
        $datosTitular = $objAbmPersona->crearArregloParaPersona($personaBuscada[0]); // genero un nuevo arreglo con las claves de la persona para utilizar sus valores en el formulario

        echo '<div class="alert alert-success text-center" role="alert">Persona encontrada.</div>';
        echo '<form class="mt-5 mb-5 needs-validation" method="post" action="actualizarDatosPersona.php" onSubmit="return validarCamposBuscar('.$datos["nroDni"].');" style="width:450px; border:white 1px solid; margin:auto" novalidate="">
        <div class="container">
        
            <div class="row">
                <div class="col">
                    <label for="nroDni" class="form-label m-2"><strong>Número de Documento Nacional de Identidad</strong></label>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="text" id="nroDni" name="nroDni" class="form-control" value="'.$datosTitular["nroDni"].'" readonly required>
                </div>
            </div>
          
            <!-- --- -->
            <div class="row">
                <div class="col">
                    <label for="apellido" class="form-label m-2"><strong>Apellido</strong></label>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="text" id="apellido" name="apellido" class="form-control" value="'.$datosTitular["apellido"].'" pattern="[a-z A-Z]{1,}" required>
                    <div class="invalid-feedback" id="apellido-text">Ingrese un apellido válido</div>
                </div>
            </div>
            <!-- --- -->
            <div class="row">
                <div class="col">
                    <label for="nombre" class="form-label m-2"><strong>Nombre</strong></label>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="text" id="nombre" name="nombre" class="form-control" value="'.$datosTitular["nombre"].'" pattern="[a-z A-Z]{1,}" required>
                    <div class="invalid-feedback" id="nombre-text">Ingrese un nombre válido</div>
                </div>
            </div>
            <!-- --- -->
            <div class="row">
                <div class="col">
                    <label for="fechaNac" class="form-label m-2"><strong>Fecha de Nacimiento</strong></label>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="text" id="fechaNac" name="fechaNac" class="form-control" value="'.$datosTitular["fechaNac"].'" pattern="(?:19|20)(?:[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-8])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:29|30))|(?:(?:0[13578]|1[02])-31))|(?:[13579][26]|[02468][048])-02-29)" required>
                    <div class="invalid-feedback" id="fechaNac-text">Ingrese una fecha válida</div>
                </div>
            </div>
            <!-- --- -->
            <div class="row">
                <div class="col">
                    <label for="telefono" class="form-label m-2"><strong>Teléfono</strong></label>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="text" id="telefono" name="telefono" class="form-control" value="'.$datosTitular["telefono"].'" pattern="[0-9]{6,}" required>
                    <div class="invalid-feedback" id="telefono-text">Ingrese un teléfono válido</div>
                </div>
            </div>
            <!-- --- -->
            <div class="row">
                <div class="col">
                    <label for="domicilio" class="form-label m-2"><strong>Domicilio</strong></label>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="text" id="domicilio" name="domicilio" class="form-control" value="'.$datosTitular["domicilio"].'" pattern="[a-z A-Z 0-9]{1,}" required>
                    <div class="invalid-feedback" id="domicilio-text">Ingrese un domicilio válido</div>
                </div>
            </div>
           
            <div class="row m-3">
                <div class="col-9"></div>
                <div class="col-3 mb-3 d-flex">
                    <input id="accion" name ="accion" value="editar" type="hidden">
                    <button class="btn btn-primary text-white" type="submit">Modificar</button>
                    
                </div>
            </div>
            
        </div>
        
    
    </div>
    </form>';
    
    } else {
        echo '<div class="alert alert-danger text-center" role="alert">No se ha encontrado persona con el número de documento ingresado.</div>';
    }
}

echo '<div class="col text-center">'; // cuerpo


echo '<div class="row m-3">
<a href="../BuscarPersona.php"><button class="btn btn-outline-secondary">Buscar nuevamente</button></a></div>';
echo '</div>'; // cierre cuerpo

include_once "../estructura/pieAccion.php";
