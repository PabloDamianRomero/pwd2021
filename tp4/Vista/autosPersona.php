<?php
    $titulo="Buscar Auto por persona";
    include_once("estructura/cabecera.php");
?>
<div style="margin-bottom: 20%" class="container-fluid">
<h3 class="text-center"><?php echo $titulo?></h3>

<form class="mt-5 mb-5 needs-validation" method="post" action="accion/accionBuscarAuto.php" onSubmit="validarCampos()" style="width:400px; border:white 1px solid; margin:auto" novalidate="">
        <div class="container">
            <div class="row">
                <div class="col">
                    <label for="dniDuenio" class="form-label m-2"><strong>D.N.I</strong></label>
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