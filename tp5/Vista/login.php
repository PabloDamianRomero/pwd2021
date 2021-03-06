<?php
$titulo="Login";
$estructuraAMostrar = "desdeVista";
$seguro=false;
include_once("estructura/cabecera.php");
$objLogin = new Session();
if ($objLogin->activa()) {
     header('location:paginaSegura.php');
}
$datos=data_submitted();
$mensaje="";
if (isset($datos['error'])){
        $mensaje=$datos['error'];
}
?>


<div style="margin-bottom: 20%" class="container-fluid text-center">
    <div class="bienvenida font-montserrat">
    <h1>FACULTAD DE INFORMÁTICA</h1>
        <h2>DEPARTAMENTO DE PROGRAMACIÓN</h2>
        <h3>CÁTEDRA PROGRAMACIÓN WEB DINÁMICA</h3>
        <h3 class="m-5">Autenticación / Seguridad App</h3>
        <p>Nota: Nombre de la bd es <span class="italica negrita">bdautenticacion</span>.</p>
    </div>

    <div class="text-center mt-5 mb-5">
        <form class="card needs-validation" method="post" action="accion/verificarLogin.php" onSubmit="return validar();" style="max-width: 300px;margin:auto; padding:20px" novalidate>
                    <div class="mt-3">
                        <div id="invalid" style="color:red">
                            <?php if (!$mensaje==""){
                                echo $mensaje;
                            } ?>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16"><path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/></svg>
                            </span>
                            <input type="text" id="usnombre" name="usnombre"  class="form-control" placeholder="Usuario" aria-describedby="basic-addon1" required>
                            <div class="invalid-feedback" id="user-text"></div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16"><path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/></svg>
                            </span>
                            <input type="password" id="uspass" name="uspass" class="form-control" placeholder="Contraseña" aria-describedby="basic-addon2" required>
                            <div class="invalid-feedback" id="pass-text"></div>
                        </div>
                        
                    </div>
                <div class="mt-3 d-grid">
                    <button type="submit" class="btn btn-lg btn-success">Ingresar</button>
                </div>
        </form>
    </div>

</div>



<?php
    include_once("estructura/pie.php");
?>
