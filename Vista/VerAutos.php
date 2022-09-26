<?php 

$titulo = "Ver Autos";
include_once '../configuracion.php';
include_once 'estructura/header.php';

?>
<div class="container border border-secondary principal mt-3 pt-3">
<h3 class="text-center">Listado de los autos cargados</h3>
<div class="row  m-4">
    <?php 
             $objAbmTabla = new ABMAuto();

             $listaTabla = $objAbmTabla->buscar(null);
            // print_r($listaTabla);
             if(count($listaTabla)>0){
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

       
                    foreach ($listaTabla as $objTabla) { 
                        
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
                 echo '</tbody>
                 </table>';
                }
                else{

                    echo "<h3>No tiene autos cargados</h3>";
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
          
</div>
</div>

<?php
include_once 'estructura/footer.php';
?>