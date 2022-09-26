<?php 
class Auto{

    private $Patente;
    private $Marca;
    private $Modelo;
    private $objPersona;
    private $mensajeoperacion;

    public function __construct()
    {
        $this->Patente="";
        $this->Marca="";
        $this->Modelo=0;
        $this->objPersona=new Persona();
    }

    public function setear($Patente,$Marca,$Modelo,$objPersona)    {
        $this->setPatente($Patente);
        $this->setMarca($Marca);
        $this->setModelo($Modelo);
        $this->setObjPersona($objPersona);
    }
    

  
    public function getPatente()
    {
        return $this->Patente;
    }

    public function setPatente($Patente)
    {
        $this->Patente = $Patente;  
    }
    public function getMarca()
    {
        return $this->Marca;
    }

    /**
     * Set the value of Marca
     */
    public function setMarca($Marca)
    {
        $this->Marca = $Marca;
    }

    /**
     * Get the value of Modelo
     */
    public function getModelo()
    {
        return $this->Modelo;
    }

    /**
     * Set the value of Modelo
     */
    public function setModelo($Modelo)
    {
        $this->Modelo = $Modelo;

    }

    /**
     * Get the value of objPersona
     */
    public function getObjPersona()
    {
        return $this->objPersona;
    }

    /**
     * Set the value of objPersona
     */
    public function setObjPersona($objPersona)
    {
        $this->objPersona = $objPersona;

    }
    public function getmensajeoperacion(){
        return $this->mensajeoperacion;
        
    }
    public function setmensajeoperacion($valor){
        $this->mensajeoperacion = $valor;
        
    }
    
        
    public function cargar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="SELECT * FROM " . " auto WHERE Patente = '".$this->getPatente()."'";
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $objPersona=new Persona();
                    $this->setear($row['Patente'],$row[''],$row['Marca'],$row['modelo'],$row['DniDuenio']);
                    
                }
            }
        } else {
            $this->setmensajeoperacion("Persona->listar: ".$base->getError());
        }
        return $resp;
    
        
    }
    
    public function insertar(){
        $resp = false;

        $base=new BaseDatos();
        $sql="INSERT INTO "." auto(Patente,Marca,Modelo,DniDuenio)  VALUES('".$this->getPatente()."', '".$this->getMarca()."',".$this->getModelo().",'".$this->getObjPersona()->getNroDni()."');";
        if ($base->Iniciar()) {
            if ($laPatente = $base->Ejecutar($sql)) {
                $this->setPatente($laPatente);
                $resp = true;
            } else {
                $this->setmensajeoperacion("Persona->insertar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Persona->insertar: ".$base->getError());
        }
        return $resp;
    }
    
    public function modificar(){
        $resp = false;
        $base=new BaseDatos();
     /*  $sql="UPDATE "."auto SET Marca='".$this->getMarca()."', Modelo=".$this->getModelo().",DniDuenio='".$this->getObjPersona()->getNroDni()."' WHERE Patente='".$this->getPatente()."'";*/
       
     $sql="UPDATE "."auto SET DniDuenio='".$this->getObjPersona()->getNroDni()."' WHERE Patente='".$this->getPatente()."'";
     
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("Persona->modificar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Persona->modificar: ".$base->getError());
        }
        return $resp;
    }
    
    public function eliminar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="DELETE FROM "." auto WHERE Patente='".$this->getPatente()."'";
        echo $sql;
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("Auto->eliminar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Auto->eliminar: ".$base->getError());
        }
        return $resp;
    }
    
    public static function listar($parametro=""){
        $arreglo = array();
        $base=new BaseDatos();
        $sql="SELECT * FROM "."auto ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                
                while ($row = $base->Registro()){
                    $obj= new Auto();
                    $objPersona=new Persona();
                    $objPersona->buscar($row['DniDuenio']);
                    $obj->setear($row['Patente'],$row['Marca'],$row['Modelo'],$objPersona);
                    array_push($arreglo, $obj);
                }
               
            }
            
        } else {
         //   $this->setmensajeoperacion("Tabla->listar: ".$base->getError());
        }
 
        return $arreglo;
    }
     
    public static function buscar($parametro=""){
        $arreglo = array();
        $base=new BaseDatos();
        $sql="SELECT * FROM auto ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        echo"</br>";
        
        echo $sql;
        echo"</br>";
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                
                while ($row = $base->Registro()){
                    $objAuto= new Auto();
                    $objPersona= new Persona();
                    $objPersona->buscar($row['DniDuenio']);
                    $objAuto->setear($row['Patente'],$row['Marca'],$row['Modelo'],$objPersona);
              
                }
               
            }
            
        } else {
         //   $this->setmensajeoperacion("Tabla->listar: ".$base->getError());
        }
 
        return $arreglo;
    }
    
}


?>