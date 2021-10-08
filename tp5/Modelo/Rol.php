<?php
class Rol
{
    private $idrol;
    private $rodescripcion;
    private $mensajeOperacion;

    public function __construct()
    {
        $this->idrol = "";
        $this->rodescripcion = "";
        $this->mensajeOperacion = "";
    }

    public function getIdRol()
    {
        return $this->idrol;
    }

    public function setIdRol($idrol)
    {
        $this->idrol = $idrol;
    }

    public function getRoDescripcion()
    {
        return $this->rodescripcion;
    }

    public function setRoDescripcion($rodescripcion)
    {
        $this->rodescripcion = $rodescripcion;
    }

    public function getMensajeOperacion()
    {
        return $this->mensajeOperacion;
    }

    public function setMensajeOperacion($mensajeOperacion)
    {
        $this->mensajeOperacion = $mensajeOperacion;
    }

    public function setear($idrol, $rodescripcion)
    {
        $this->setIdRol($idrol);
        $this->setRoDescripcion($rodescripcion);
    }

    public function cargar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM rol WHERE idrol = " . $this->getIdRol();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $base->Registro();
                    $this->setear($row['idrol'], $row['rodescripcion']);

                }
            }
        } else {
            $this->setMensajeOperacion("Rol->cargar: " . $base->getError());
        }
        return $resp;

    }

    public function insertar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "INSERT INTO rol(rodescripcion)  VALUES('" . $this->getRoDescripcion() . "');";
        echo $sql;
        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $this->setIdRol($elid);
                $resp = true;
            } else {
                $this->setMensajeOperacion("Rol->insertar: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("Rol->insertar: " . $base->getError());
        }
        return $resp;
    }

    public function modificar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE rol SET rodescripcion='" . $this->getRoDescripcion() . "' WHERE idrol=" . $this->getIdRol();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;

            } else {
                $this->setMensajeOperacion("Rol->modificar 1: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("Rol->modificar 2: " . $base->getError());
        }
        return $resp;
    }

    public function eliminar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM rol WHERE idrol =" . $this->getIdRol();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("Rol->eliminar: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("Rol->eliminar: " . $base->getError());
        }
        return $resp;
    }

    public static function listar($parametro = "")
    {
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM rol ";
        if ($parametro != "") {
            $sql .= 'WHERE ' . $parametro;
        }
        $res = $base->Ejecutar($sql);
        if ($res > -1) {
            if ($res > 0) {
                while ($row = $base->Registro()) {
                    $obj = new Rol();
                    $obj->setear($row['idrol'], $row['rodescripcion']);
                    array_push($arreglo, $obj);
                }

            }

        } else {
            $this->setMensajeOperacion("Rol->listar: ".$base->getError());
        }

        return $arreglo;
    }

}
