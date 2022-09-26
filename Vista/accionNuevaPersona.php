<?php

$titulo = "Persona nueva";
include_once 'estructura/header.php';
include_once '../configuracion.php';
?>
<div class="container-fluid principal ml-2 p-4">
    <?php
    $datos = data_submitted();

    $resp = false;
    $objABMPersona = new ABMPersona();

    $botonAuto='';

    if (isset($datos['accion'])) {
       

        if ($datos['accion'] == 'nuevo') {
             
            $objPersona=null;
            if (isset($datos['NroDni'])) {
                $arrayDni = ['NroDni' => $datos['NroDni']];
                $objPersona = $objABMPersona->buscarNroDni($arrayDni);
            }
            if ($objPersona == null) {
                $mensajeResultado = $objABMPersona->verificarPersonaNueva($datos);


                if ($mensajeResultado['Resultado']) {
                    if (isset($datos['accion'])) {
                        if ($objABMPersona->alta($datos)) {
                            $resp = true;
                        }
                    }
                } else {

                    echo $mensajeResultado['Mensaje'];
                }
            }
            else {
            echo "<H4 class='text-center bg-danger text-light'>El NroDni ya esta registrado</  H4>";
           }
        }
    }
        if ($resp) {
            $mensaje = "La accion " . $datos['accion'] . " se realizo correctamente.";
          //  header('Refresh: 5;URL=NuevaPersona.php');
           $botonAuto='<div class="col-md-3 pb-3">
           <a href="NuevoAuto.php"class="btn btn-warning d-grid gap-2 pl-0 mx-auto col-6 pt-2 text-center">Cargar Auto</a>
       </div>';
    
        } else {
            $mensaje = "La accion " . $datos['accion'] . " no pudo concretarse.";
            //echo $objABMPersona->getmensajeoperacion();
        }

        echo "<H4 class='text-center bg-success text-light'>$mensaje</H4>";
        ?>
        <?php
    echo $botonAuto;
    ?>
    
       <div class="col-md-3">
            <a href="NuevaPersona.php"class="btn btn-secondary d-grid gap-2 pl-0 mx-auto col-6 pt-2">Volver</a>
        </div>
</div>
</div>

<?php
include_once 'estructura/footer.php';
?>