<?php
include_once "../configuracion.php";
$titulo="Listado de Autos";
include_once ("estructura/cabecera.php");
$objAbmAuto = new AbmAuto();

$listaAuto = $objAbmAuto->buscar(null);

?>	

<?php	

echo '<div style="margin-bottom: 20%" class="container-fluid text-center">'; // cuerpo
echo '<h1>'.$titulo.'</h1>';
echo '<p><strong>Ej 3)</strong> Crear una pagina php “VerAutos.php”, en ella usando la capa de control correspondiente
mostrar todos los datos de los autos que se encuentran cargados, de los dueños mostrar nombre y apellido.
En caso de que no se encuentre ningún auto cargado en la base mostrar un mensaje indicando que no hay
autos cargados.</p>';

 if( count($listaAuto)>0){

echo '<div class="row">
<div class="col border border-secondary bg-info"><strong>PATENTE</strong></div>
<div class="col border border-secondary bg-info"><strong>MARCA</strong></div>
<div class="col border border-secondary bg-info"><strong>MODELO</strong></div>
<div class="col border border-secondary bg-info"><strong>DUEÑO</strong></div>
</div>';

    foreach ($listaAuto as $objAuto) { 

        echo '<div class="row">
        <div class="col border border-secondary bg-light">'.$objAuto->getPatente().'</div>
        <div class="col border border-secondary bg-light">'.$objAuto->getMarca().'</div>
        <div class="col border border-secondary bg-light">'.$objAuto->getModelo().'</div>
        <div class="col border border-secondary bg-light">'.$objAuto->getObjDuenio()->getNombre().' '.$objAuto->getObjDuenio()->getApellido().'</div>
        </div>';
	}
}else{
    echo '<div class="alert alert-danger" role="alert">
    No existen autos en el sistema.
  </div>';
}

echo '</div>'; // cierre cuerpo

include_once("estructura/pie.php");
?>