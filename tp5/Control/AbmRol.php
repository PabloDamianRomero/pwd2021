<?php
class abmRol{
    public function buscar($id){
        $obj=Rol::seleccionar("idrol= ".$id);
        return $obj;
    }
}
?>