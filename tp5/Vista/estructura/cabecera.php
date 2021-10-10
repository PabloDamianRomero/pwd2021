<!DOCTYPE html>
<html lang="es">
<head>
<?php
if ($estructuraAMostrar == "desdeVista") {
    include_once("../configuracion.php");
    echo "<link rel='stylesheet' href='css/bootstrap/bootstrap.css'>";
    echo "<link rel='stylesheet' href='css/bootstrap/bootstrap.min.css'>";
    echo "<link rel='preconnect' href='https://fonts.googleapis.com'>";
    echo "<link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>";
    echo "<link href='https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap' rel='stylesheet'>";
    echo "<link rel='stylesheet' href='css/gral.css'>";
    echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
    </symbol>
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </symbol>
    </svg>';
}

if ($estructuraAMostrar == "desdeAccion") {
    include_once("../../configuracion.php");
    echo "<link rel='stylesheet' href='../css/bootstrap/bootstrap.css'>";
    echo "<link rel='stylesheet' href='../css/bootstrap/bootstrap.min.css'>";
    echo "<link rel='preconnect' href='https://fonts.googleapis.com'>";
    echo "<link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>";
    echo "<link href='https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap' rel='stylesheet'>";
    echo "<link rel='stylesheet' href='../css/gral.css'>";
    echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
    </symbol>
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </symbol>
    </svg>';
}
?>
    <title><?php echo $titulo ?></title>
</head>
<body>

<?php
if ($seguro) {
    $sesion = new Session();
    if (!$sesion->activa()) {
        header("Location:login.php");
    }
    $roles=$sesion->getRol();
    $rolDesc = "";
    $rolDesc = $roles[0]->getObjRol()->getRolDescripcion();

    echo '<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <a class="navbar-brand" href="paginaSegura.php">Inicio</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>';
    // Usuario y cierre de sesión
        echo '<div class="collapse navbar-collapse" id="user-navbarCollapse">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            Usuario: <span style="color:#f9e871;">' . $sesion->getUsuarioActual() . '</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rol: <span style="color:#f9a371;">'.$rolDesc.'</span>
        </li>
        <li class="nav-item" style="margin-left:12px;">';
        if ($estructuraAMostrar == "desdeVista") {
          echo '<a href="accion/cerrarSesion.php" style="color:#ff9090;">Cerrar Sesión</a>';
        }
        if ($estructuraAMostrar == "desdeAccion") {
          echo '<a href="cerrarSesion.php" style="color:#ff9090;">Cerrar Sesión</a>';
        }
        echo '
            </li>
        </ul>
        </div>';
    
    echo '</nav></div>';

}
?>
<main class="container mh-100" style="min-height: 100vh;">






