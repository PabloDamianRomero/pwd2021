<?php
    $titulo="Nueva Persona";
    include_once("estructura/cabecera.php");
?>

<div style="margin-bottom: 10%" class="container-fluid">
<h3 class="text-center"><?php echo $titulo?></h3>
<p><strong>Ej 6)</strong> Crear una página “NuevaPersona.php” que contenga un formulario que permita solicitar todos
los datos de una persona. Estos datos serán enviados a una página “accionNuevaPersona.php” que cargue
un nuevo registro en la tabla persona de la base de datos. Se debe mostrar un mensaje que indique si se
pudo o no cargar los datos de la persona. Utilizar css y validaciones javaScript cuando crea conveniente.
Recordar usar la capa de control antes generada, no se puede acceder directamente a las clases del ORM.</p>

<form class="mt-5 mb-5 needs-validation" method="post" action="accion/accionNuevaPersona.php" style="width:450px; border:white 1px solid; margin:auto" novalidate="">
        <div class="container">
            <div class="row">
                <div class="col">
                    <label for="nroDni" class="form-label m-2"><strong>Número de Documento Nacional de Identidad</strong></label>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="text" id="nroDni" name="nroDni" class="form-control" placeholder="Ej: 30875269" pattern="[0-9]{7,8}" required>
                    <div class="invalid-feedback" id="nroDni-text">Ingrese un DNI válido</div>
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
                    <input type="text" id="apellido" name="apellido" class="form-control" placeholder="Ej: Smith" pattern="[a-z A-Z]{1,}" required>
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
                    <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ej: Harman" pattern="[a-z A-Z]{1,}" required>
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
                    <input type="text" id="fechaNac" name="fechaNac" class="form-control" placeholder="Ej: 1997-01-14" pattern="(?:19|20)(?:[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-8])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:29|30))|(?:(?:0[13578]|1[02])-31))|(?:[13579][26]|[02468][048])-02-29)" required>
                    <div class="invalid-feedback" id="fechaNac-text">Ingrese un fecha válida</div>
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
                    <input type="text" id="telefono" name="telefono" class="form-control" placeholder="Ej: 4488123" pattern="[0-9]{6,}" required>
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
                    <input type="text" id="domicilio" name="domicilio" class="form-control" placeholder="Ej: Santa Fe 98" pattern="[a-z A-Z 0-9]{1,}" required>
                    <div class="invalid-feedback" id="domicilio-text">Ingrese un domicilio válido</div>
                </div>
            </div>
           
            <div class="row m-3">
                <div class="col-7"></div>
                <div class="col-3 mb-3 d-flex">
                    <input id="accion" name ="accion" value="nuevo" type="hidden">
                    <button class="btn btn-primary text-white" type="submit">Agregar</button>
                    <button class="btn btn-outline-secondary" type="reset">Borrar</button>
                </div>
            </div>
            
        </div>
        
    
    </div>
</form>
</div>

<?php
    include_once("estructura/pie.php");
?>