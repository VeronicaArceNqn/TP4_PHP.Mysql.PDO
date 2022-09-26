<?php
$titulo = "Cambio de due&ntilde;o";
include_once '../configuracion.php';
include_once 'estructura/header.php';
$objABMPersona = new ABMPersona();
$datos = data_submitted();
$objPersona =NULL;
$botonAutoPersona="";
//VALIDANDO EL NRODNI DE LA PERSONA
if (isset($datos['NroDni'])){
    $arrayDni=['NroDni'=>$datos['NroDni']];
   $objPersona=$objABMPersona->buscarNroDni($arrayDni);
}


/* VALIDANDO PATENTE DEL AUTO */
$objABMAuto = new ABMAuto();
$datos = data_submitted();
$objAuto=null;
$mensaje="";
if (isset($datos['Patente'])){
    
    $objAuto=$objABMAuto->buscarPatente($datos);
 }
?>
<div class="container border border-secondary principal mt-3 pt-3">

<?php
if($objAuto!=null)
{
    $mensaje.= "<h4 class='text-center  text-dark'>La Patente esta registrada</h4>";
}
else{
    $mensaje.="<h4 class='text-center bg-danger text-light'>No esta registrada esta Patente</h4>";
}
if($objPersona!=null)
{
    $mensaje.='<h4 class="text-center  text-dark">El NroDni esta registrado<br></h4>';
}
else{
    $mensaje.="<h4 class='text-center bg-danger text-light'>No esta registrada el NroDni</h4>";
}
if($objAuto!=null&&$objPersona!=null)
{
    //cambiamos de persona en el objeto Auto
    $objAuto->setObjPersona($objPersona);
   // print_r($objAuto);
    $arreglo=['Patente'=>$objAuto->getPatente(),'Marca'=>$objAuto->getMarca(),'Modelo'=>$objAuto->getModelo(),'DniDuenio'=>$objAuto->getObjPersona()->getNroDni()];
    // print_r($arreglo);
     $resp=false;
    if($objABMAuto->modificacion($arreglo)){
        $resp = true;
    }
    if($resp)
    {
        $dni=$objPersona->getNroDni();
        echo "<h4 class='text-center bg-success text-light'>Se cambio de due&ntilde;o</h4>";
        $botonAutoPersona='<div class="col-md-3 pb-3">
        <a href="autosPersona.php?NroDni='.$dni.'"class="btn btn-warning d-grid gap-2 pl-0 mx-auto col-6 pt-2">Ver Auto persona</a>
        </div>';
    }
    else{
        echo "<h4 class='text-center bg-danger text-light'>No se pudo cambiar de due&ntilde;o</h4>";
    }
   
}
echo $mensaje;
echo $botonAutoPersona;
?>
<div class="col-md-3">
            <a href="CambioDuenio.php"class="btn btn-secondary d-grid gap-2 pl-0 mx-auto col-6 pt-2">Volver</a>
        </div>
        </div>
</div>
<?php
include_once 'estructura/footer.php';
?>