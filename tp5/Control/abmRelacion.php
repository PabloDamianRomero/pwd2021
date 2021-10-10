<?php
class AbmRelacion{
    public function buscar($param)
    {
        $where = " true ";
        if ($param != null) {
            if (isset($param['idusuario'])) {
                $where .= " and idusuario ='" . $param['idusuario'] . "'";
            }

            if (isset($param['idrol'])) {
                $where .= " and idrol ='" . $param['idrol'] . "'";
            }

        }
        $arreglo = Relacion::seleccionar($where);
        return $arreglo;
    }

    public function baja($param){
        $resp = false;
        $objRel=new Relacion();
        $abmUs=new abmUsuario();
        $arrayUs=$abmUs->buscar(['idusuario'=>$param['idusuario']]);
        $abmRol=new abmRol();
        $objRol=$abmRol->buscar($param['idrol']);
        $objRel->setear($arrayUs[0], $objRol);
        if ($objRel->eliminar()){
            $resp=true;
        }
        
        return $resp;
    }

    public function alta($param){
        $resp = false;
        $objRel=new Relacion();
        $abmUs=new abmUsuario();
        $arrayUs=$abmUs->buscar(['idusuario'=>$param['idusuario']]);
        $abmRol=new abmRol();
        $objRol=$abmRol->buscar($param['idrol']);
        $objRel->setear($arrayUs[0], $objRol);
        if ($objRel->insertar()){
            $resp = true;
        }
        return $resp;
        
    }
}
?>