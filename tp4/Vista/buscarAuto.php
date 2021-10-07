<?php
    $titulo="Buscar Auto por patente";
    include_once("estructura/cabecera.php");
?>

<div style="margin-bottom: 20%" class="container-fluid">
<h3 class="text-center"><?php echo $titulo?></h3>
<p><strong>Ej 4)</strong> Crear una pagina "buscarAuto.php" que contenga un formulario en donde se solicite el numero
de patente de un auto, estos datos deberán ser enviados a una pagina “accionBuscarAuto.php” en donde
usando la clase de control correspondiente, se soliciten los datos completos del auto que se corresponda con
la patente ingresada y mostrar los datos en una tabla. También deberán mostrar los carteles que crean
convenientes en caso de que no se encuentre ningún auto con la patente ingresada.
Utilizar css y validaciones javaScript cuando crea conveniente. Recordar usar la capa de control antes
generada, no se puede acceder directamente a las clases del ORM.</p>


<form class="mt-5 mb-5 needs-validation" method="post" action="accion/accionBuscarAuto.php" style="width:400px; border:white 1px solid; margin:auto" novalidate="">
        <div class="container">
            <div class="row">
                <div class="col">
                    <label for="patente" class="form-label m-2"><strong>Patente</strong></label>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="text" id="patente" name="patente" class="form-control" placeholder="Ej: DZL 123" pattern="[a-z A-Z 0-9]{7,}" required>
                    <div class="invalid-feedback" id="patente-text">Ingrese una patente válida. Ej: FSR 123</div>
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