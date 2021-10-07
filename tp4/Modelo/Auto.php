<?php
class Auto{
    private $patente;
    private $marca;
    private $modelo;
    private $objDuenio;
    private $mensajeOperacion;

    public function __construct(){
        $this->patente = "";
        $this->marca = "";
        $this->modelo = "";
        $this->objDuenio = "";
        $this->mensajeOperacion = "";
    }

    public function setear($patente, $marca, $modelo, $objDuenio){
        $this->setPatente($patente);
        $this->setMarca($marca);
        $this->setModelo($modelo);
        $this->setObjDuenio($objDuenio);
    }

    /**
     * Get the value of patente
     */ 
    public function getPatente()
    {
        return $this->patente;
    }

    /**
     * Set the value of patente
     *
     * @return  self
     */ 
    public function setPatente($patente)
    {
        $this->patente = $patente;
    }

    /**
     * Get the value of marca
     */ 
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set the value of marca
     *
     * @return  self
     */ 
    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    /**
     * Get the value of modelo
     */ 
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set the value of modelo
     *
     * @return  self
     */ 
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

    }

    /**
     * Get the value of objDuenio
     */ 
    public function getObjDuenio()
    {
        return $this->objDuenio;
    }

    /**
     * Set the value of objDuenio
     *
     * @return  self
     */ 
    public function setObjDuenio($objDuenio)
    {
        $this->objDuenio = $objDuenio;

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

    public function cargar(){
        $resp = false;
        $base = new BaseDatos();
        $sql="SELECT * FROM auto WHERE Patente = ".$this->getPatente();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $duenio = new Persona();
                    $duenio->setNroDni($row['DniDuenio']);
                    $duenio->cargar();
                    $this->setear($row['Patente'], $row['Marca'], $row['Modelo'], $duenio);
                    
                }
            }
        } else {
            $this->setMensajeOperacion("Auto->listar: ".$base->getError());
        }
        return $resp;
    }

    public function insertar(){
        $resp = false;
        $base = new BaseDatos();
        $dniDuenio = $this->getObjDuenio()->getNroDni();
        $sql = "INSERT INTO auto(Patente, Marca, Modelo, DniDuenio)  VALUES('".$this->getPatente()."', '".$this->getMarca()."',".$this->getModelo().", '".$dniDuenio."');";
        if ($base->Iniciar()) {
            if ($id = $base->Ejecutar($sql)) {
                // $this->setId($id);
                $resp = true;
            } else {
                $this->setMensajeOperacion("Auto->insertar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Auto->insertar: ".$base->getError());
        }
        return $resp;
    }

    public function modificar(){
        $resp = false;
        $base = new BaseDatos();
        $dniDuenio = $this->getObjDuenio()->getNroDni();
        $sql = "UPDATE auto SET Patente='".$this->getPatente()."',Marca='".$this->getMarca()."',Modelo=".$this->getModelo().",DniDuenio='".$dniDuenio."' WHERE Patente='".$this->getPatente()."'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("Auto->modificar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Auto->modificar: ".$base->getError());
        }
        return $resp;
    }

    public function eliminar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM auto WHERE Patente=".$this->getPatente();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setMensajeOperacion("Auto->eliminar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Auto->eliminar: ".$base->getError());
        }
        return $resp;
    }

    public static function listar($condicion = ""){
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM auto ";
        if ($condicion!="") {
            $sql.='WHERE '.$condicion;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                
                while ($row = $base->Registro()){                    
                    $obj= new Auto();
                    $persona = new Persona();
                    $persona->setNroDni($row['DniDuenio']);
                    $persona->cargar(); // el cargar de persona, lo q hace es $sql="SELECT * FROM persona WHERE NroDni = ".$this->getNroDni(); me trae una persona con el unico parametro que necesito, q es el dni
                    $obj->setear($row['Patente'], $row['Marca'], $row['Modelo'], $persona);
                    array_push($arreglo, $obj);
                }
               
            }
            
        } else {
            $this->setMensajeOperacion("Auto->listar: ".$base->getError());
        }
 
        return $arreglo;
    }
}

?>