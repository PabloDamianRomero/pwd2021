<?php
class Rol
{
    private $idRol;
    private $rolDescripcion;
    private $mensajeOperacion;

    public function __construct()
    {
        $this->idRol = "";
        $this->rolDescripcion = "";
        $this->mensajeOperacion = "";
    }

    public function setear($id, $desc)
    {
        $this->setIdRol($id);
        $this->setRolDescripcion($desc);
    }

    public function getIdRol()
    {
        return $this->idRol;
    }
    public function setIdRol($idRol)
    {
        $this->idRol = $idRol;
    }
    public function getRolDescripcion()
    {
        return $this->rolDescripcion;
    }
    public function setRolDescripcion($rolDescripcion)
    {
        $this->rolDescripcion = $rolDescripcion;
    }
    public function getMensajeOperacion()
    {
        return $this->mensajeOperacion;
    }
    public function setMensajeOperacion($mensajeOperacion)
    {
        $this->mensajeOperacion = $mensajeOperacion;
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
                    $this->setear($row['idrol'], $row['roldescripcion']);

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
        $sql = "INSERT INTO rol(roldescripcion)  VALUES('" . $this->getRolDescripcion() . "');";
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
        $sql = "UPDATE rol SET roldescripcion='" . $this->getRolDescripcion() . "' WHERE idrol=" . $this->getIdRol();
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

    public static function seleccionar($condicion = "")
    {
        $obj = null;
        $base = new BaseDatos();
        $sql = "SELECT * FROM rol ";
        if ($condicion != "") {
            $sql .= 'WHERE ' . $condicion;
        }
        $res = $base->Ejecutar($sql);
        if ($res > -1) {
            if ($res > 0) {
                $row = $base->Registro();
                $obj = new Rol();
                $obj->setear($row['idrol'], $row['roldescripcion']);
            }

        } else {
            $this->setMensajeOperacion("Rol->seleccionar: " . $base->getError());
        }

        return $obj;
    }

}
