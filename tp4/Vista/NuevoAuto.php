<?php
    $titulo="Nuevo Auto";
    include_once("estructura/cabecera.php");
?>

<div style="margin-bottom: 10%" class="container-fluid">
<h3 class="text-center"><?php echo $titulo?></h3>
<p><strong>Ej 7)</strong> Crear una página “NuevoAuto.php” que contenga un formulario en el que se permita cargar
todos los datos de un auto (incluso su dueño). Estos datos serán enviados a una página
“accionNuevoAuto.php” que cargue un nuevo registro en la tabla auto de la base de datos. Se debe chequear
antes que la persona dueña del auto ya se encuentre cargada en la base de datos, de no ser así mostrar un
link a la página que permite carga una nueva persona. Se debe mostrar un mensaje que indique si se pudo o
no cargar los datos Utilizar css y validaciones javaScript cuando crea conveniente. Recordar usar la capa de
control antes generada, no se puede acceder directamente a las clases del ORM.</p>

<form class="mt-5 mb-5 needs-validation" method="post" action="accion/verificarPersonaCargada.php" style="width:450px; border:white 1px solid; margin:auto" novalidate="">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h6 class="text-center m-2">Verificar si la persona se encuentra cargada en el sistema</h6>
                    <label for="nroDni" class="form-label m-2"><strong>Ingrese DNI</strong></label>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="text" id="nroDni" name="nroDni" class="form-control" placeholder="Ej: 30875269" pattern="[0-9]{7,8}" required>
                    <div class="invalid-feedback" id="nroDni-text">Ingrese un DNI válido</div>
                </div>
            </div>
			<!-- --- -->

           
            <div class="row m-3">
                <div class="col-7"></div>
                <div class="col-3 mb-3 d-flex">
                    <button class="btn btn-primary text-white" type="submit">Verificar</button>
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