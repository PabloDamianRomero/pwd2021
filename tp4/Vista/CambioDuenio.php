<?php
    $titulo="Cambiar al dueño del auto";
    include_once("estructura/cabecera.php");
?>

<div style="margin-bottom: 20%" class="container-fluid">
<h3 class="text-center"><?php echo $titulo?></h3>
<p><strong>Ej 8)</strong> Crear una página “CambioDuenio.php” que contenga un formulario en donde se solicite el
numero de patente de un auto y un numero de documento de una persona, estos datos deberán ser enviados
a una página “accionCambioDuenio.php” en donde se realice cambio del dueño del auto de la patente
ingresada en el formulario. Mostrar mensajes de error en caso de que el auto o la persona no se encuentren
cargados. Utilizar css y validaciones javaScript cuando crea conveniente. Recordar usar la capa de control
antes generada, no se puede acceder directamente a las clases del ORM.</p>


<form class="mt-5 mb-5 needs-validation" method="post" action="accion/accionCambioDuenio.php" style="width:400px; border:white 1px solid; margin:auto" novalidate="">
        <div class="container">
            <div class="row">
                <div class="col">
                    <label for="patente" class="form-label m-2"><strong>Patente</strong></label>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="text" id="patente" name="patente" class="form-control" placeholder="Ej: DZL 123" pattern="[a-z A-Z 0-9]{7,}" required>
                    <div class="invalid-feedback" id="patente-text">Ingrese una patente válida</div>
                </div>
            </div>
            <!-- ---- -->
            <div class="row">
                <div class="col">
                    <label for="dniDuenio" class="form-label m-2"><strong>D.N.I del nuevo dueño</strong></label>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="text" id="dniDuenio" name="dniDuenio" class="form-control" placeholder="Ej: 30875962" pattern="[0-9]{7,8}" required>
                    <div class="invalid-feedback" id="dniDuenio-text">Ingrese un documento válido</div>
                </div>
               
            </div>
           
            <div class="row m-3">
                <div class="col-7"></div>
                <div class="col-3 mb-3 d-flex">
                    <input id="accion" name ="accion" value="editar" type="hidden">
                    <button class="btn btn-primary text-white" type="submit">Cambiar</button>
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