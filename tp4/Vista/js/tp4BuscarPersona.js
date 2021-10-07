function validarCamposBuscar($datos){
    $valid=true;
    //$nroDni=document.getElementById("nroDni");
    $nombre=document.getElementById("nombre");
    $apellido=document.getElementById("apellido");
    $telefono=document.getElementById("telefono");
    // if(isNaN($nroDni.value)){
    //     $nroDni.value=null;
    //     $valid=false;
    // }
    if(!isNaN($nombre.value)){
        $nombre.value=null;
        $valid=false;
    }
    if(!isNaN($apellido.value)){
        $apellido.value=null;
        $valid=false;
    }
    if(isNaN($telefono.value)){
        $telefono.value=null;
        $valid=false;
    }
    cambioDni($datos);
    return $valid;
}

function cambioDni($data){
    $nroDni=document.getElementById("nroDni");
    if (!($nroDni.value==$data)){
        $nroDni.value=$data;
        alert("No puede cambiar el DNI");
    }
}