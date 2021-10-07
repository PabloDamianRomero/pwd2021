<?php
class AbmPersona
{
    //Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Persona
     */
    private function cargarObjeto($param)
    {
        $obj = null;
        if (array_key_exists('nroDni', $param) and array_key_exists('apellido', $param) and array_key_exists('nombre', $param) and array_key_exists('fechaNac', $param) and array_key_exists('telefono', $param) and array_key_exists('domicilio', $param)) {
            $obj = new Persona();
            $obj->setear($param['nroDni'], $param['apellido'], $param['nombre'], $param['fechaNac'], $param['telefono'], $param['domicilio']);
        }
        return $obj;
    }

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return Persona
     */
    private function cargarObjetoConClave($param)
    {
        $obj = null;
        if (isset($param['id'])) { // id correspondiente al input de borrar
            $obj = new Persona();
            $obj->setear($param['id'], null, null, null, null, null);
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
        if (isset($param['nroDni'])) {
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
        // $param['nroDni'] =null;
        $elObjPersona = $this->cargarObjeto($param);
        // verEstructura($elObjtTabla);
        $nuevoArray['nroDni'] = $param['nroDni'];
        $personaExiste = $this->buscar($nuevoArray); // verifico si la persona ya existe en la bd
        if ((count($personaExiste) == 0) and $elObjPersona != null and $elObjPersona->insertar()) {
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
            $elObjPersona = $this->cargarObjetoConClave($param);
            $nuevoArray['nroDni'] = $param['nroDni'];
            $personaExiste = $this->buscar($nuevoArray); // verifico si la persona ya existe en la bd
            if ((count($personaExiste) > 0) and $elObjPersona != null and $elObjPersona->eliminar()) {
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
            $elObjPersona = $this->cargarObjeto($param);
            $nuevoArray['nroDni'] = $param['nroDni'];
            $personaExiste = $this->buscar($nuevoArray); // verifico si la persona ya existe en la bd
            if ((count($personaExiste) > 0) and $elObjPersona != null and $elObjPersona->modificar()) {
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
            if (isset($param['nroDni'])) {
                $where .= " and NroDni =" . $param['nroDni'];
            }

            if (isset($param['apellido'])) {
                $where .= " and Apellido ='" . $param['apellido'] . "'";
            }

            if (isset($param['nombre'])) {
                $where .= " and Nombre ='" . $param['nombre'] . "'";
            }

            if (isset($param['fechaNac'])) {
                $where .= " and fechaNac ='" . $param['fechaNac'] . "'";
            }

            if (isset($param['telefono'])) {
                $where .= " and Telefono ='" . $param['telefono'] . "'";
            }

            if (isset($param['domicilio'])) {
                $where .= " and Domicilio ='" . $param['domicilio'] . "'";
            }

        }
        $arreglo = Persona::listar($where);
        return $arreglo;

    }

        /**
     * Función creada para armar un arreglo asociativo con las claves correspondientes a una persona
     */
    public function crearArregloParaPersona($objPersona)
    {
        $arreglo = null;
        $arreglo['nroDni'] = $objPersona->getNroDni();
        $arreglo['apellido'] = $objPersona->getApellido();
        $arreglo['nombre'] = $objPersona->getNombre();
        $arreglo['fechaNac'] = $objPersona->getFechaNac();
        $arreglo['telefono'] = $objPersona->getTelefono();
        $arreglo['domicilio'] = $objPersona->getDomicilio();
        return $arreglo;
    }

    public function crearPersonaDatos($colVariables){
        $objPersona = null;
        $objPersona = $this->cargarObjeto($colVariables);
        return $objPersona;
    }

}
