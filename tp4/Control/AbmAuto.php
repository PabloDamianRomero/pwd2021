<?php
class AbmAuto
{
    //Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Auto
     */
    private function cargarObjeto($param)
    {
        $obj = null;

        if (array_key_exists('patente', $param) and array_key_exists('marca', $param) and array_key_exists('modelo', $param) and array_key_exists('objDuenio', $param)) {
            $obj = new Auto();
            $obj->setear($param['patente'], $param['marca'], $param['modelo'], $param['objDuenio']);
        }
        return $obj;
    }

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return Auto
     */
    private function cargarObjetoConClave($param)
    {
        $obj = null;

        if (isset($param['patente'])) {
            $obj = new Auto();
            $obj->setear($param['patente'], null, null, null);
        }
        return $obj;
    }

    /**
     * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param array $param
     * @return boolean
     */

    private function seteadosCamposClaves($param)
    {
        $resp = false;
        if (isset($param['patente'])) {
            $resp = true;
        }

        return $resp;
    }

    /**
     *
     * @param array $param
     */
    public function alta($param)
    {
        $resp = false;
        // $param['patente'] =null;
        $elObjAuto = $this->cargarObjeto($param);
        //verEstructura($elObjtTabla);
        $nuevoArray['patente'] = $param['patente'];
        $autoExiste = $this->buscar($nuevoArray); // verifico si el auto ya existe en la bd
        if ((count($autoExiste) == 0) and $elObjAuto != null and $elObjAuto->insertar()) {
            $resp = true;
        }
        return $resp;

    }
    /**
     * permite eliminar un objeto
     * @param array $param
     * @return boolean
     */
    public function baja($param)
    {
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $elObjAuto = $this->cargarObjetoConClave($param);
            $nuevoArray['patente'] = $param['patente'];
            $autoExiste = $this->buscar($nuevoArray); // verifico si el auto ya existe en la bd
            if ((count($autoExiste) > 0) and $elObjAuto != null and $elObjAuto->eliminar()) {
                $resp = true;
            }
        }

        return $resp;
    }

    /**
     * permite modificar un objeto
     * @param array $param
     * @return boolean
     */
    public function modificacion($param)
    {
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $elObjAuto = $this->cargarObjeto($param);
            $nuevoArray['patente'] = $param['patente'];
            $autoExiste = $this->buscar($nuevoArray); // verifico si el auto ya existe en la bd
            if ((count($autoExiste) > 0) and $elObjAuto != null and $elObjAuto->modificar()) {
                $resp = true;
            }
        }
        return $resp;
    }

    /**
     * permite buscar un objeto
     * @param array $param
     * @return boolean
     */
    public function buscar($param)
    {
        $where = " true ";
        if ($param != null) {
            if (isset($param['patente'])) {
                $where .= " and Patente ='" . $param['patente'] . "'";
            }

            if (isset($param['marca'])) {
                $where .= " and Marca ='" . $param['marca'] . "'";
            }

            if (isset($param['modelo'])) {
                $where .= " and Modelo =" . $param['modelo'] . "";
            }

            if (isset($param['dniDuenio'])) {
                $where .= " and DniDuenio ='" . $param['dniDuenio'] . "'";
            }

        }
        $arreglo = Auto::listar($where);
        return $arreglo;
    }

    /**
     * Función creada para cambiar el objDuenio dentro del arreglo asociativo de un auto
     */
    public function cambiarDuenioAlAuto($objAuto, $objDuenio)
    {
        $nuevoAuto = new Auto();
        $objAuto->setObjDuenio($objDuenio);
        $nuevoAuto = $objAuto;
        return $nuevoAuto;
    }

    /**
     * Función creada para armar un arreglo asociativo con las claves correspondientes a un auto
     */
    public function crearArregloParaAutoNuevo($objAuto)
    {
        $arreglo = null;
        $arreglo['patente'] = $objAuto->getPatente();
        $arreglo['marca'] = $objAuto->getMarca();
        $arreglo['modelo'] = $objAuto->getModelo();
        $arreglo['objDuenio'] = $objAuto->getObjDuenio();
        return $arreglo;
    }

}
