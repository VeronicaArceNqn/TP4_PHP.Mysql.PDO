<?php 
class Persona {
    private $NroDni;
    private $Nombre;
    private $Apellido;
    private $fechaNac;
    private $Telefono;
    private $Domicilio;
    private $mensajeoperacion;
    
   
    public function __construct(){
        
        $this->NroDni="";
        $this->Nombre="";
        $this->Apellido="";
        $this->fechaNac="";
        $this->Telefono="";
        $this->Domicilio="";
        $this->mensajeoperacion ="";
    }
    public function setear($NroDni,$Nombre,$Apellido,$fechaNac,$Telefono,$Domicilio)    {
        $this->setNroDni($NroDni);
        $this->setNombre($Nombre);
        $this->setApellido($Apellido);
        $this->setFechaNac($fechaNac);
        $this->setTelefono($Telefono);
        $this->setDomicilio($Domicilio);
    }
    
    
    
    public function getNroDni(){
        return $this->NroDni;
        
    }
    public function setNroDni($valor){
        $this->NroDni = $valor;
        
    }
   
    public function getNombre()
    {
        return $this->Nombre;
    }

    
    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;
    }

    public function getApellido()
    {
        return $this->Apellido;
    }


    public function setApellido($Apellido)
    {
        $this->Apellido = $Apellido;
    }

  
    public function getFechaNac()
    {
        return $this->fechaNac;
    }

    public function setFechaNac($fechaNac)
    {
        $this->fechaNac = $fechaNac;
    }

 
    public function getDomicilio()
    {
        return $this->Domicilio;
    }
    public function setDomicilio($Domicilio)
    {
        $this->Domicilio = $Domicilio;
    } 
    public function getTelefono(){
        return $this->Telefono;
        
    }
    public function setTelefono($valor){
        $this->Telefono = $valor;
        
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
        $sql="SELECT * FROM persona WHERE NroDni = '".$this->getNroDni()."'";
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $this->setear($row['NroDni'],$row[''],$row['Nombre'],$row['Apellido'],$row['fechaNac'], $row['Telefono'], $row['Domicilio']);
                    
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
        $sql="INSERT INTO persona(NroDni,Nombre,Apellido,fechaNac,Telefono,Domicilio)  VALUES('".$this->getNroDni()."', '".$this->getNombre()."','".$this->getApellido()."','".$this->getfechaNac()."','".$this->getTelefono()."','".$this->getDomicilio()."');";
        if ($base->Iniciar()) {
            if ($elNroDni = $base->Ejecutar($sql)) {
                $this->setNroDni($elNroDni);
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
        $sql="UPDATE persona SET Nombre='".$this->getNombre()."', Apellido='".$this->getApellido()."',fechaNac='".$this->getFechaNac()."',Telefono='".$this->getTelefono()."',Domicilio='".$this->getDomicilio()."' WHERE NroDni='".$this->getNroDni()."'";
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
        $sql="DELETE FROM persona WHERE NroDni='".$this->getNroDni()."'";
       
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("Persona->eliminar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Persona->eliminar: ".$base->getError());
        }
        return $resp;
    }
    
    public static function listar($parametro=""){
        $arreglo = array();
        $base=new BaseDatos();
        $sql="SELECT * FROM persona ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                
                while ($row = $base->Registro()){
                    $obj= new Persona();
                    $obj->setear($row['NroDni'],$row['Nombre'],$row['Apellido'],$row['fechaNac'], $row['Telefono'], $row['Domicilio']);
                    array_push($arreglo, $obj);
                }
               
            }
            
        } else {
         //   $this->setmensajeoperacion("Tabla->listar: ".$base->getError());
        }
 
        return $arreglo;
    }
    
  /**
   * Recupera los datos de la persona por numero de documento
   * @param int NroDni
   * @return true en caso de encontrar los datos, false en caso contrario 
   */
  public function buscar($numDocumento)
  {
    $base = new BaseDatos();
    $consulta = "Select * from persona where NroDni='". $numDocumento."'";
    $resp = false;
    if ($base->Iniciar()) {
      if ($base->Ejecutar($consulta)) {
        if ($row2 = $base->Registro()) {
          $this->setNroDni($row2['NroDni']);
          $this->setNombre($row2['Nombre']);
          $this->setApellido($row2['Apellido']);
          $this->setFechaNac($row2['fechaNac']);
          $this->setTelefono($row2['Telefono']);
          $this->setDomicilio($row2['Domicilio']);
          
          $resp = true;
        }
      } else {
        $this->setmensajeoperacion($base->getError());
      }
    } else {
      $this->setmensajeoperacion($base->getError());
    }
    return $resp;
  }

   
}
