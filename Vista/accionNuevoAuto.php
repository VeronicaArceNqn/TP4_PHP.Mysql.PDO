<?php

$titulo = "Auto nuevo";
include_once 'estructura/header.php';
include_once '../configuracion.php';
?>
<div class="container-fluid principal ml-2 p-4 justify-content-center">
    <?php
    $datos = data_submitted();

    $resp = false;
    $objABMAuto = new ABMAuto();
   $botonPersona="";
    if (isset($datos['accion'])) {
        if ($datos['accion'] == 'editar') {
            if ($objABMAuto->modificacion($datos)) {
                $resp = true;
            }
        }
        if ($datos['accion'] == 'borrar') {

            if ($objABMAuto->baja($datos)) {
                $resp = true;
            }
        }

        if ($datos['accion'] == 'nuevo') {

            $objABMPersona = new ABMPersona();

            $objPersona = NULL;
            //VALIDANDO EL NRODNI DE LA PERSONA
            if (isset($datos['DniDuenio'])) {
                $arrayDni = ['NroDni' => $datos['DniDuenio']];
                $objPersona = $objABMPersona->buscarNroDni($arrayDni);
            }

            $objAuto = null;

            if (isset($datos['Patente']) && $datos['Patente'] != 'null') {
                $arrayPatente = ['Patente' => $datos['Patente']];
                $objAuto = $objABMAuto->buscarPatente($arrayPatente);

                if ($objAuto == null) {
                    if ($objPersona != null) {
                        $mensajeResultado = $objABMAuto->verificarAutoNuevo($datos);


                        if ($mensajeResultado['Resultado']) {
                            if (isset($datos['accion'])) {
                                if ($objABMAuto->alta($datos)) {
                                    $resp = true;
                                }
                            }
                        } else {

                            echo $mensajeResultado['Mensaje'];
                        }
                    } else { //sino la persona tiene que registrase
                        echo "<H4 class='text-center bg-danger text-light'>La persona no esta registrada</H4>";

                    $botonPersona= '           
            <div class="col-md-3 pb-3">
            <a href="NuevaPersona.php"class="btn btn-warning d-grid gap-2 pl-0 mx-auto col-6 pt-2 text-center">Cargar Persona</a>
        </div>';
                    }
                } else { //sino la patente esta registrada
                    echo "<H4 class='text-center bg-danger text-light'>La patente del auto ya esta registrada</  H4>";


                    /* */
                }
            }
        } else {
            echo "<H4 class='text-center bg-danger text-light'>No se ingreso la patente</H4>";
        }
    
        if ($resp) {
            $mensaje = "La accion " . $datos['accion'] . " se realizo correctamente.";
            //   header('Refresh: 5;URL=NuevoAuto.php');

        } else {
            $mensaje = "La accion " . $datos['accion'] . " no pudo concretarse.";
            //echo $objABMAuto->getmensajeoperacion();
        }}
        echo "<H4 class='text-center bg-success text-light'>$mensaje</H4>";
    
    echo $botonPersona;
    ?>
    <div class="col-md-3 pb-3">
        <a href="NuevoAuto.php" class="btn btn-secondary d-grid gap-2 pl-0 mx-auto col-6 pt-2">Volver</a>
        
    </div>
      
    
</div>

<?php
include_once 'estructura/footer.php';
?>