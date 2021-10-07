<?php

class UsuarioRol
{

    private $objUsuario;
    private $objRol;
    private $mensajeoperacion;

    public function __construct()
    {
        $this->objUsuario = null;
        $this->objRol = null;
        $this->mensajeoperacion = "";
    }

    public function setear($objUsuario, $objRol)
    {
        $this->setObjUsuario($objUsuario);
        $this->setObjRol($objRol);
    }


    public function getObjUsuario()
    {
        return $this->objUsuario;
    }

    public function getObjRol()
    {
        return $this->objRol;
    }

    public function getmensajeoperacion()
    {
        return $this->mensajeoperacion;
    }


    public function setObjUsuario($valor)
    {
        $this->objUsuario = $valor;
    }

    public function setObjRol($valor)
    {
        $this->objRol = $valor;
    }

    public function setmensajeoperacion($valor)
    {
        $this->mensajeoperacion = $valor;
    }

    public function cargar()
    {
        $resp = false;
        $base = new BaseDatos();
        $idUsuario = $this->getObjUsuario()->getIdUsuario();
        $idRol = $this->getObjRol()->getIdrol();
        $sql = "SELECT * FROM usuariorol WHERE idusuario= " . $idUsuario . " AND idrol= " . $idRol;
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $objRol = null;
                    $objUsuario = null;
                    $row = $base->Registro();

                    if ($row['idrol'] != null) {
                        $objRol = new Rol();
                        $objRol->setId($row['idrol']);
                        $objRol->cargar();
                    }

                    if ($row['idusuario'] != null) {

                        $objUsuario = new Usuario();
                        $objUsuario->setId($row['idusuario']);
                        $objUsuario->cargar();
                    }
                    $this->setear($objUsuario, $objRol);
                }
            }
        } else {
            $this->setmensajeoperacion("UsuarioRol->cargar: " . $base->getError());
        }
        return $resp;
    }

    public function insertar()
    {
        $resp = false;
        $base = new BaseDatos();
        $idUsuario = $this->getObjUsuario()->getIdUsuario();
        $idRol = $this->getObjRol()->getIdrol();
        $sql = "INSERT INTO usuariorol(idusuario, idrol) VALUES(" . $idUsuario . "," . $idRol . ");";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("UsuarioRol->insertar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("UsuarioRol->insertar: " . $base->getError());
        }
        return $resp;
    }

    public function modificar()
    {
        $resp = false;
        $base = new BaseDatos();
        $idUsuario = $this->getObjUsuario()->getIdUsuario();
        $idRol = $this->getObjRol()->getIdrol();
        $sql = " UPDATE usuariorol SET ";
        $sql .= " idrol = " . $idRol;
        $sql .= " WHERE idusuario =" . $idUsuario;
        // echo $sql;
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("UsuarioRol->modificar 1: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("UsuarioRol->modificar 2: " . $base->getError());
        }
        return $resp;
    }

    public function eliminar()
    {
        $resp = false;
        $base = new BaseDatos();
        $idUsuario = $this->getObjUsuario()->getIdUsuario();
        $idRol = $this->getObjRol()->getIdrol();
        $sql = "DELETE FROM usuariorol WHERE idusuario='" . $idUsuario . "' AND idrol='" . $idRol . "'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("UsuarioRol->eliminar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("UsuarioRol->eliminar: " . $base->getError());
        }
        return $resp;
    }

    public static function listar($parametro = "")
    {

        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM usuariorol ";
        if ($parametro != "") {
            $sql .= 'WHERE ' . $parametro;
        }
        $res = $base->Ejecutar($sql);
        if ($res > -1) {
            if ($res > 0) {
                while ($row = $base->Registro()) {

                    $objUsuario = null;
                    $objRol = null;

                    if ($row['idrol'] != null) {
                        $objRol = new Rol();
                        $objRol->setIdrol($row['idrol']);
                        $objRol->cargar();
                    }

                    if ($row['idusuario'] != null) {
                        $objUsuario = new Usuario();
                        $objUsuario->setIdUsuario($row['idusuario']);
                        $objUsuario->cargar();
                    }

                    $obj = new UsuarioRol();
                    $obj->setear($objUsuario, $objRol);
                    array_push($arreglo, $obj);
                }
            }
        } else {
            $this->setmensajeoperacion("UsuarioRol->listar: ".$base->getError());
        }
        return $arreglo;
    }

}
