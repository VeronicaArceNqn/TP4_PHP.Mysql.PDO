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



    if (isset($datos['accion'])) {
        if ($datos['accion'] == 'editar') {
            if ($objABMPersona->modificacion($datos)) {
                $resp = true;
            }
            else{
                echo "<h4 class='text-center bg-danger text-light'>No se realizaron modificaciones en los datos de la persona</h4>";
            }
        }
        if ($datos['accion'] == 'borrar') {
            if ($objABMPersona->baja($datos)) {
                $resp = true;
            }
        }

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
          //  header('Refresh: 5;URL=BuscarPersona.php');
        } else {
            $mensaje = "La accion " . $datos['accion'] . " no pudo concretarse.";
            //echo $objABMPersona->getmensajeoperacion();
        }

        echo "<H4 class='text-center bg-dark text-light'>$mensaje</H4>";
    
    
    ?>
       <div class="col-md-3">
            <a href="BuscarPersona.php"class="btn btn-secondary d-grid gap-2 pl-0 mx-auto col-6 pt-2">Volver</a>
        </div>
</div>
</div>

<?php
include_once 'estructura/footer.php';
?>