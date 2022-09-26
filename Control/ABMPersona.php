<?php
class ABMPersona{
    //Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto

    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Persona
     */
    private function cargarObjeto($param){
        $obj = null;
         //echo "estoy en cargar objeto";
         
        if(array_key_exists('NroDni',$param)  and array_key_exists('Nombre',$param) and array_key_exists('Apellido',$param) and array_key_exists('fechaNac',$param) and array_key_exists('Telefono',$param) and array_key_exists('Domicilio',$param)){
            $obj = new Persona();
            $obj->setear($param['NroDni'], $param['Nombre'], $param['Apellido'], $param['fechaNac'], $param['Telefono'], $param['Domicilio']);
          //  print_r("entro a :<br>".$param);
        }
        return $obj;
    }
    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return Persona
     */
    private function cargarObjetoConClave($param){
        $obj = null;
       // print_r($param);
        if( isset($param['NroDni']) ){
            $obj = new Persona();
          //  echo "entro a cargar objeto con clave";
           
            $obj->setear($param['NroDni'],null, null, null, null, null);
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
        if (isset($param['NroDni']))
            $resp = true;
        return $resp;
    }
    
    /**
     * 
     * @param array $param
     */
    public function alta($param){
        $resp = false;
        //$param['NroDni'] =null;
        $elObjtPersona = $this->cargarObjeto($param);
    
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
            $elObjtPersona = $this->cargarObjeto($param);
            if($elObjtPersona!=null and $elObjtPersona->modificar()){
                $resp = true;
            }
        }
        return $resp;
    }
      /**
   * Verifica si todos los datos de la persona son correctos
   * @param Array $datos
   * @return Array
   * true en caso de encontrar todos los datos, false en caso contrario 
   */
    public function verificarPersonaNueva($datos)
    {
        
        $resNroDni = false;
        $resNombre = false;
        $resApellido = false;
        $resFecha = false;
        $resTelefono = false;
        $resDomicilio = false;
        $res=false;
        $resultado="<h2 class='text-center'>Los siguientes datos no fueron ingresado correctamente:</h2>";
        if (isset($datos['NroDni'])&& $datos['NroDni']!= 'null') {
       
            $resNroDni=true;
           
        } else {
            $resNroDni=false;
           
        }
             
       
        if (isset($datos['Apellido'])&&$datos['Apellido']!= 'null')
         {          
                $resApellido=true;           
        } else {
            $resApellido=false;
        }
   
         if (isset($datos['Nombre'])&&$datos['Nombre']!= 'null') {
            
            $resNombre=true; 
           
        } else {
            $resNombre=false;
        }
        
       
        if (isset($datos['fechaNac'])&&$datos['fechaNac']!= 'null') {
         
            $resFecha=true;
      
        } else {
            $resFecha=false;
         }
        
        if (isset($datos['Telefono'])&&$datos['Telefono']!= 'null') {
         
              $resTelefono=true;
           
        } else {
            $resTelefono= false;
        }

        if (isset($datos['Domicilio'])&&$datos['Domicilio']!= 'null') {
            
                $resDomicilio=true;
           
        } else {
            $resDomicilio=false;
        }
        $resultado.="<ul>";
        if(!$resNroDni)
        {
            $res1="<li>No se ingreso NroDni</li>";
        }
        else{
            $res1="<li>Se ingreso el NroDni</li>";
        }
        if(!$resApellido)
        {
            $res2="<li>No se ingreso Apellido</li>";
        }
        else{
            $res2="<li>Se ingreso el Apellido</li>";
        }
        if(!$resNombre)
        {
            $res3="<li>No se ingreso Nombre</li>";
        }
        else{
            $res3="<li>Se ingreso el Nombre</li>";
        }
        if(!$resFecha)
        {
            $res4="<li>No se ingreso fecha Nac.</li>";
        }
        else{
            $res4="<li>Ingreso la fecha Nac.</li>";
        }
        
        if(!$resTelefono)
        {
            $res5="<li>No se ingreso Telefono</li>";
        }
        else{
            $res5="<li>Ingreso el telefono</li>";
        }
        if(!$resDomicilio)
        {
            $res6="<li>No se ingreso Domicilio</li>";
        }
        else{
            $res6="<li>Se ingreso Domicilio</li>";
        }
        
        $resultado.="</ul>";
       if($resNroDni&&$resApellido&&$resNombre&&$resFecha&&$resTelefono&&$resDomicilio)
        {
          
          $res=true;
        }
        else{
           $resultado.= $res1.$res2.$res3.$res4.$res5.$res6."</br>";
      
        }
        
        $arreResultado=['Resultado'=>$res,'Mensaje'=>$resultado];
    
       

       
        return $arreResultado;
    }
    /**
     * permite buscar un objeto
     * @param array $param
     * @return array
     */
    public function buscar($param){
        $where = " true ";
        if ($param<>NULL){
            if  (isset($param['NroDni']))
                $where.=" and NroDni ='".$param['NroDni']."'";
            if  (isset($param['Apellido']))
                 $where.=" and Apellido ='".$param['Apellido']."'";
                 
            if  (isset($param['Nombre']))
            $where.=" and Nombre ='".$param['Nombre']."'";
        }
        $arreglo = Persona::listar($where);  
        return $arreglo;      
    }
      /**
     * Busca un objeto Persona, 
     * @param array $param
     * @return Persona 
     */
    public function buscarNroDni($datos)
    {
        $objPersona =NULL;
        $listaTabla = $this->buscar($datos);
        if (count($listaTabla)==1){
            $objPersona= $listaTabla[0];
        }
        return $objPersona;
    }
    
}
