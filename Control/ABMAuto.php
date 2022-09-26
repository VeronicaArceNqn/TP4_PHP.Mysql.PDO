<?php 

   class ABMAuto{
    //Espera como parametro un arreglo asociativo donde las claves coinciden con los Modelos de las variables instancias del objeto

    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los Modelos de las variables instancias del objeto
     * @param array $param
     * @return Persona
     */
    private function cargarObjeto($param){
        $obj = null;
         //echo "estoy en cargar objeto";
         
        if(array_key_exists('Patente',$param) and array_key_exists('Marca',$param) and array_key_exists('Modelo',$param) and array_key_exists('DniDuenio',$param)){
            $obj = new Auto();
            $ObjtPersona=new Persona();
            $ObjtPersona->buscar($param['DniDuenio']);

            $obj->setear($param['Patente'], $param['Marca'], $param['Modelo'],$ObjtPersona);
          //  print_r("entro a :<br>".$param);
        }
        return $obj;
    }
    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los Modelos de las variables instancias del objeto que son claves
     * @param array $param
     * @return Persona
     */
    private function cargarObjetoConClave($param){
        $obj = null;
       // print_r($param);
        if( isset($param['Patente']) ){
            $obj = new Persona();
          //  echo "entro a cargar objeto con clave";
           
            $obj->setear($param['Patente'],null, null, null, null, null);
        }
        return $obj;
    }
    
    
    /**
     * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param array $param
     * @return boolean
     */
    
    private function seteadosCamposClaves($param){
        $resp = false;
        if (isset($param['Patente']))
            $resp = true;
        return $resp;
    }
    
    /**
     * 
     * @param array $param
     */
    public function alta($param){
        $resp = false;
        //$param['Patente'] =null;
        $elObjtPersona = $this->cargarObjeto($param);
      //  echo "entro a alta -<>";
       // print_r($elObjtPersona);
        if ($elObjtPersona!=null and $elObjtPersona->insertar()){
            $resp = true;
        }
        return $resp;
        
    }
    /**
     * permite eliminar un objeto 
     * @param array $param
     * @return boolean
     */
    public function baja($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
          
            $elObjtPersona = $this->cargarObjetoConClave($param);
            if ($elObjtPersona!=null and $elObjtPersona->eliminar()){
           
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
    public function modificacion($param){
        //echo "Estoy en modificacion";
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjtAuto = $this->cargarObjeto($param);
            if($elObjtAuto!=null and $elObjtAuto->modificar()){
                $resp = true;
            }
        }
        return $resp;
    }
    
    /**
     * permite buscar un objeto
     * @param array $param
     * @return array
     */
    public function buscar($param){
        $where = " true ";
  //      echo "valo param=><br>";
//        print_r($param);
        if ($param<>NULL){
            if(isset($param['Patente']))
                $where.=" and Patente ='".$param['Patente']."'";
            if(isset($param['DniDuenio']))
                $where.=" and DniDuenio ='".$param['DniDuenio']."'";
          }
            
        $arreglo = Auto::listar($where);  
        return $arreglo;
            
    }
          /**
   * Verifica si todos los datos de la persona son correctos
   * @param Array $datos
   * @return Array
   * true en caso de encontrar todos los datos, false en caso contrario 
   */
  public function verificarAutoNuevo($datos)
  {
      
      $resPatente = false;
      $resMarca = false;
      $resModelo = false;
      $resDniDuenio = false;
    
      $res=false;
      $resultado="<h2 class='text-center'>Los siguientes datos no fueron ingresado correctamente:</h2>";
      if (isset($datos['Patente'])&& $datos['Patente']!= 'null') {
     
          $resPatente=true;
         
      } else {
          $resPatente=false;
         
      }
           
     
      if (isset($datos['Marca'])&&$datos['Marca']!= 'null')
       {          
              $resMarca=true;           
      } else {
          $resMarca=false;
      }
 
       if (isset($datos['Modelo'])&&$datos['Modelo']!= 'null') {
          
          $resModelo=true; 
         
      } else {
          $resModelo=false;
      }
      
     
      if (isset($datos['DniDuenio'])&&$datos['DniDuenio']!= 'null') {
       
          $resDniDuenio=true;
    
      } else {
          $resDniDuenio=false;
       }
      
     
      $resultado.="<ul>";
      if(!$resPatente)
      {
          $res1="<li>No se ingreso Patente</li>";
      }
      else{
          $res1="<li>Se ingreso el Patente</li>";
      }
      if(!$resMarca)
      {
          $res2="<li>No se ingreso Marca</li>";
      }
      else{
          $res2="<li>Se ingreso el Marca</li>";
      }
      if(!$resModelo)
      {
          $res3="<li>No se ingreso Modelo</li>";
      }
      else{
          $res3="<li>Se ingreso el Modelo</li>";
      }
      if(!$resDniDuenio)
      {
          $res4="<li>No se ingreso Dni Due&ntilde;o.</li>";
      }
      else{
          $res4="<li>Ingreso la Dni Due&ntilde;o</li>";
      }
      
  
      
      $resultado.="</ul>";
     if($resPatente&&$resMarca&&$resModelo&&$resDniDuenio)
      {
        
        $res=true;
      }
      else{
         $resultado.= $res1.$res2.$res3.$res4."</br>";
    
      }
      
      $arreResultado=['Resultado'=>$res,'Mensaje'=>$resultado];
  
     

     
      return $arreResultado;
  }
        /**
     * Busca un objeto Auto, 
     * @param array $param
     * @return Auto 
     */
    public function buscarPatente($datos)
    {
        $objAuto =NULL;
        $listaTabla = $this->buscar($datos);
        if (count($listaTabla)==1){
            $objAuto= $listaTabla[0];
        }
        return $objAuto;
    }
    
}
      
        

?>