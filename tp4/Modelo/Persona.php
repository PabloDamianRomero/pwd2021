<?php
class Persona
{
    private $nroDni;
    private $apellido;
    private $nombre;
    private $fechaNac;
    private $telefono;
    private $domicilio;
    private $colObjAutos;
    private $mensajeOperacion;

    public function __construct()
    {
        $this->nroDni = "";
        $this->apellido = "";
        $this->nombre = "";
        $this->fechaNac = "";
        $this->telefono = "";
        $this->domicilio = "";
        $this->colObjAutos = array();
    }

    public function setear($nroDni, $apellido, $nombre, $fechaNac, $telefono, $domicilio)
    {
        $this->setNroDni($nroDni);
        $this->setApellido($apellido);
        $this->setNombre($nombre);
        $this->setFechaNac($fechaNac);
        $this->setTelefono($telefono);
        $this->setDomicilio($domicilio);
    }

    /**
     * Get the value of nroDni
     */
    public function getNroDni()
    {
        return $this->nroDni;
    }

    /**
     * Set the value of nroDni
     *
     * @return  self
     */
    public function setNroDni($nroDni)
    {
        $this->nroDni = $nroDni;
    }

    /**
     * Get the value of apellido
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

    }

    /**
     * Get the value of fechaNac
     */
    public function getFechaNac()
    {
        return $this->fechaNac;
    }

    /**
     * Set the value of fechaNac
     *
     * @return  self
     */
    public function setFechaNac($fechaNac)
    {
        $this->fechaNac = $fechaNac;

    }

    /**
     * Get the value of telefono
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set the value of telefono
     *
     * @return  self
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

    }

    /**
     * Get the value of domicilio
     */
    public function getDomicilio()
    {
        return $this->domicilio;
    }

    /**
     * Set the value of domicilio
     *
     * @return  self
     */
    public function setDomicilio($domicilio)
    {
        $this->domicilio = $domicilio;

    }

    /**
     * Get the value of colObjAutos
     */
    public function getColObjAutos()
    {
        $coleccion = array();
        $condicion = "DniDuenio='". $this->getNroDni()."'";
        $objAuto = new Auto();
        $colAutos = $objAuto->listar($condicion); // Obtengo los autos con el DniDuenio
        for ($i = 0; $i < (count($colAutos)); $i++) {
            array_push($coleccion, $colAutos[$i]);
        }
        return $coleccion;
    }

    /**
     * Set the value of colObjAutos
     *
     * @return  self
     */
    public function setColObjAutos($colObjAutos)
    {
        $this->colObjAutos = $colObjAutos;

    }

    /**
     * Get the value of mensajeOperacion
     */
    public function getMensajeOperacion()
    {
        return $this->mensajeOperacion;
    }

    /**
     * Set the value of mensajeOperacion
     *
     * @return  self
     */
    public function setMensajeOperacion($mensajeOperacion)
    {
        $this->mensajeOperacion = $mensajeOperacion;

    }

    public function cargar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM persona WHERE NroDni = " . $this->getNroDni();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $base->Registro();
                    $this->setear($row['NroDni'], $row['Apellido'], $row['Nombre'], $row['fechaNac'], $row['Telefono'], $row['Domicilio']);

                }
            }
        } else {
            $this->setMensajeOperacion("Persona->cargar: " . $base->getError());
        }
        return $resp;
    }

    public function insertar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "INSERT INTO persona(NroDni, Apellido, Nombre, fechaNac, Telefono, Domicilio)
        VALUES('" . $this->getNroDni() . "','" . $this->getApellido() . "','" . $this->getNombre() . "','" . $this->getFechaNac() . "','" . $this->getTelefono() . "','" . $this->getDomicilio() . "');";
        if ($base->Iniciar()) {
            if ($id = $base->Ejecutar($sql)) {
                // $this->setNroDni($id);
                $resp = true;
            } else {
                $this->setMensajeOperacion("Persona->insertar: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("Persona->insertar: " . $base->getError());
        }
        return $resp;
    }

    public function modificar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE persona SET NroDni='" . $this->getNroDni() . "',Apellido='" . $this->getApellido() . "',Nombre='" . $this->getNombre() . "',fechaNac='" . $this->getFechaNac() . "',Telefono='" . $this->getTelefono() . "',Domicilio='" . $this->getDomicilio() . "' WHERE NroDni=" . $this->getNroDni();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("Persona->modificar: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("Persona->modificar: " . $base->getError());
        }
        return $resp;
    }

    public function eliminar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM persona WHERE NroDni=" . $this->getNroDni();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setMensajeOperacion("Persona->eliminar: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("Persona->eliminar: " . $base->getError());
        }
        return $resp;
    }

    public static function listar($condicion = "")
    {
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM persona ";
        if ($condicion != "") {
            $sql .= 'WHERE ' . $condicion;
        }
        $res = $base->Ejecutar($sql);
        if ($res > -1) {
            if ($res > 0) {

                while ($row = $base->Registro()) {
                    $obj = new Persona();
                    $obj->setear($row['NroDni'], $row['Apellido'], $row['Nombre'], $row['fechaNac'], $row['Telefono'], $row['Domicilio']);
                    $colAutos = $obj->getColObjAutos();
                    $obj->setColObjAutos($colAutos);
                    array_push($arreglo, $obj);
                }

            }

        } else {
            $this->setMensajeOperacion("Persona->listar: " . $base->getError());
        }

        return $arreglo;
    }
}
