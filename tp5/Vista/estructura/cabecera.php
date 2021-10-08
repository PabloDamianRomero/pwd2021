<!DOCTYPE html>
<html lang="es">
<head>
<?php
if ($estructuraAMostrar == "desdeVista" || $estructuraAMostrar == "vistaSegura") {
    echo "<link rel='stylesheet' href='css/bootstrap/bootstrap.css'>";
    echo "<link rel='stylesheet' href='css/bootstrap/bootstrap.min.css'>";
    echo "<link rel='preconnect' href='https://fonts.googleapis.com'>";
    echo "<link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>";
    echo "<link href='https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap' rel='stylesheet'>";
    echo "<link rel='stylesheet' href='css/gral.css'>";
}

if ($estructuraAMostrar == "desdeAccion") {
    echo "<link rel='stylesheet' href='../css/bootstrap/bootstrap.css'>";
    echo "<link rel='stylesheet' href='../css/bootstrap/bootstrap.min.css'>";
    echo "<link rel='preconnect' href='https://fonts.googleapis.com'>";
    echo "<link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>";
    echo "<link href='https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap' rel='stylesheet'>";
    echo "<link rel='stylesheet' href='../css/gral.css'>";
}
?>
    <title><?php echo $titulo ?></title>
</head>
<body>

<?php

if ($estructuraAMostrar == "vistaSegura") {
        $objLogin = new Session();
    if (!$objLogin->activa()) {
        echo $objLogin->getError();
        exit("<a href='login.php'>Login</a>");
    }
    $objUsuario = $objLogin->getUsuario();
    $objRol = $objLogin->getRol();

    echo '<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <a class="navbar-brand" href="#">Inicio</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
        <a class="nav-link" href="#">Enlace_01</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">Enlace_02</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">Enlace_03</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">Enlace_04</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">Enlace_05</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">Enlace_06</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">Enlace_07</a>
        </li>
    </ul>
    </div>
    <div class="collapse navbar-collapse" id="user-navbarCollapse">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item">
        Usuario: ' . $objUsuario->getUsNombre() . ' | Rol: ' . $objRol->getRoDescripcion().'
    </li>
    <li class="nav-item" style="margin-left:12px;">
        <a href="accion/cerrarLogin.php" style="color:#ff9090;">Cerrar Sesión</a>
        </li>
    </ul>
    </div>
    </nav>
    </div>';
}
?>
<main class="container mh-100" style="min-height: 100vh;">






