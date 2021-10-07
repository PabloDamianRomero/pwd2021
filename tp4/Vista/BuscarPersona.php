<?php
    $titulo="Buscar persona";
    include_once("estructura/cabecera.php");
?>
<div style="margin-bottom: 20%" class="container-fluid">
<h3 class="text-center"><?php echo $titulo?></h3>
<p><strong>Ej 9)</strong> Crear una página “BuscarPersona.html” que contenga un formulario que permita cargar un
numero de documento de una persona. Estos datos serán enviados a una página “accionBuscarPersona.php”
busque los datos de la persona cuyo documento sea el ingresado en el formulario los muestre en un nuevo
formulario; a su vez este nuevo formulario deberá permitir modificar los datos mostrados (excepto el nro de
documento) y estos serán enviados a otra página “ActualizarDatosPersona.php” que actualiza los datos de la
persona. Utilizar css y validaciones javaScript cuando crea conveniente. Recordar usar la capa de control
antes generada, no se puede acceder directamente a las clases del ORM.</p>

<form class="mt-5 mb-5 needs-validation" method="post" action="accion/accionBuscarPersona.php" style="width:400px; border:white 1px solid; margin:auto" novalidate="">
        <div class="container">
            <div class="row">
                <div class="col">
                    <label for="nroDni" class="form-label m-2"><strong>D.N.I</strong></label>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="text" id="nroDni" name="nroDni" class="form-control" placeholder="Ej: 30875962" pattern="[0-9]{7,8}" required>
                    <div class="invalid-feedback" id="nroDni-text">Ingrese un documento válido</div>
                </div>
               
            </div>
           
            <div class="row m-3">
                <div class="col-7"></div>
                <div class="col-3 mb-3 d-flex">
                    <button class="btn btn-primary text-white" type="submit">Buscar</button>
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