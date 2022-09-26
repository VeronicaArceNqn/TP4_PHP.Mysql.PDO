<?php

$titulo="Buscar Auto resultado"; 
    include_once 'estructura/header.php';
    include_once '../configuracion.php';
    $datos = data_submitted();


?>
<div class="container-fluid border border-secondary principal mt-3 pt-3">
<h3 class="text-center">Datos Auto encontrado</h3>
<div class="row  m-4">

    <?php 
        $objAbmTabla = new ABMAuto();
        if(isset($datos["Patente"]))
        {
        $valorPatente= $datos["Patente"];
        $arrayPatente=[ 'Patente' =>$valorPatente];
        $listaTabla = $objAbmTabla->buscar($arrayPatente);
    //   print_r($listaTabla);
        if(count($listaTabla)==1){
    ?>
        <table class="table table-dark table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">Patente</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
           
                </tr>
            </thead>
            <tbody>
                <?php

            
                  $objTabla=$listaTabla[0];
                  echo '<tr>
                  <th scope="row">'.$objTabla->getPatente().'</th>';
                  echo '
                  <td>'.$objTabla->getMarca().'</td>';
                  echo '
                  <td>'.$objTabla->getModelo().'</td>';
                  echo '
                  <td>'.$objTabla->getObjPersona()->getNombre().'</td>';
                  echo '
                  <td>'.$objTabla->getObjPersona()->getApellido().'</td></tr>';
            
          
                }
                        
                
                else{

                    echo "<h3 class='text-center bg-success text-light'>No hay autos </h3>";
                }
            }
            else{
                echo "<h3  class='text-center  bg-danger text-light'>No se envio ninguna patente desde el formulario";
            }
            
                ?>
                <!--
                <tr>
                    <th scope="row">1234234</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td><a href="#" class="btn btn-warning">Editar</a></td>
                    <td><a href="#" class="btn btn-danger">Eliminar</a></td>

                </tr>
              
             
           -->
            </tbody>
        </table>
</div>
<div class="col-md-3">
            <a href="buscarAuto.php"class="btn btn-secondary d-grid gap-2 pl-0 mx-auto col-6 pt-2">Volver</a>
        </div>  
    </div>

    <?php
include_once 'estructura/footer.php'; ?>

