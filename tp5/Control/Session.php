<?php
class Session
{
    private $mensaje;

    /**
     * Constructor que inicia la sesión.
     */
    public function __construct()
    {
        $resp = true;
        if (!session_start()) {
            $this->mensaje = "No se puede iniciar la sesión";
            $resp = false;
        }
        return $resp;
    }

    /**
     * Actualiza las variables de sesión con los valores ingresados.
     */
    public function iniciar($nombreUsuario, $psw)
    {
        $_SESSION['usnombre'] = $nombreUsuario;
        $_SESSION['uspass'] = md5($psw);
        $_SESSION['activa'] = false;
    }

    /**
     * Valida si la sesión actual tiene usuario y psw válidos. Devuelve true o false.
     */
    public function validar()
    {
        $resp = false;
        if (isset($_SESSION['usnombre'])) {
            $nombreUsuario = $_SESSION['usnombre'];
            if (isset($_SESSION['uspass'])) {
                $psw = $_SESSION['uspass'];
                $usuario = new AbmUsuario();
                $lista = $usuario->buscar($_SESSION);
                if ($lista != null) {
                    $_SESSION['activa'] = true;
                    $resp = true;
                }else{
                    $this->mensaje = 'No se encontro user en bd';
                }
            } else {
                $this->mensaje = 'No esta seteada la clave';
            }
        } else {
            $this->mensaje = 'No esta seteado el nombre de usuario';
        }
        return $resp;
    }

    /**
     * Devuelve true o false si la sesión está activa o no.
     */
    public function activa()
    {
        $resp = false;
        if (isset($_SESSION['activa'])) {
            $resp = $_SESSION['activa'];
        } else {
            $this->mensaje = 'No tiene sesión activa';
        }
        return $resp;
    }

    /**
     * Devuelve el usuario logeado.
     */
    public function getUsuario()
    {
        $usuarioLog = null;
        if ($this->validar() && $this->activa()) {
            $usuario = new AbmUsuario();
            $lista = $usuario->buscar($_SESSION);
            $usuarioLog = $lista[0];
        }
        return $usuarioLog;
    }

    /**
     * Devuelve el rol del usuario logeado.
     */
    public function getRol()
    {
        $objRol = null;
        if ($this->getUsuario() !== null) {
            $usuarioLog = $this->getUsuario();
            $param = array();
            $param['idusuario'] = $usuarioLog->getIdUsuario();
            // echo "ID-USER: ".$param['idusuario'];
            $objUsuarioRol = new AbmUsuarioRol();
            $lista = $objUsuarioRol->buscar($param);
            $objUsuarioRol = $lista[0];

            // echo "<p>///////////////////</p>";
            // print_r($objUsuarioRol);
            // echo "<p>///////////////////</p>";

            $objRol = $objUsuarioRol->getObjRol();
            // echo "<p>-------------------</p>";
            // print_r($objRol);
            // echo "<p>-------------------</p>";
            $param1 = array();
            $param1['idrol'] = $objRol->getIdRol();
            // print_r($param1);
            $objTransRol = new AbmRol();
            $lista = $objTransRol->buscar($param1);

            $objRol = $lista[0];
            // print_r($objRol);

        }
        return $objRol;
    }

    /**
     * Cierra la session actual
     *
     * @return boolean
     */
    public function cerrar()
    {
        $resp = false;
        if (!session_destroy()) {
            $this->mensaje = 'No se puede cerrar la sesion';
        }else{
            $resp = true;
        }
        return $resp;
    }

    /**
     * Devuelve el mensaje de error
     *
     * @return string
     */
    public function getError()
    {
        return $this->mensaje;
    }

}
