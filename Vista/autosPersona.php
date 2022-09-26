<?php
$titulo = "Mis autos";
include_once '../configuracion.php';
include_once 'estructura/header.php';
$objAbmTabla = new ABMPersona();
$datos = data_submitted();
$obj =NULL;
if (isset($datos['NroDni'])){
    $listaTabla = $objAbmTabla->buscar($datos);
    if (count($listaTabla)==1){
        $obj= $listaTabla[0];
    }
}
?>
<div class="container border border-secondary principal mt-3 pt-3">
    <h3 class="text-center">Mis Autos</h3>
    <?php if ($obj!=null){?>
    <form method="post" class="row m-4 p-4 pt-3 bg-light fw-bold" action="personaresult.php">
        <div class="col-md-2">
            <label for="NroDni" class="form-label">NroDni</label>
            <input type="text" class="form-control" id="NroDni" name="NroDni" value="<?php echo $obj->getNroDni()?>" readonly required>
        </div>
        <div class="col-md-4">
            <label for="Nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" value="<?php echo $obj->getNombre()?>" readonly required>
        </div>
        <div class="col-md-4">
            <label for="Apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="Apellido" name="Apellido" value="<?php echo $obj->getApellido()?>" readonly required>
        </div>
        <div class="col-md-2">
            <label for="fechaNac" class="form-label">Fecha de Nacimiento</label>
            <div class="input-group">

                <input type="date" class="form-control" id="fechaNac" name="fechaNac" value="<?php echo $obj->getFechaNac()?>" readonly required>
            </div>
        </div>
        <div class="col-md-6">
            <label for="Telefono" class="form-label">Telefono</label>
            <input type="text" class="form-control" id="Telefono" name="Telefono" value="<?php echo $obj->getTelefono()?>" readonly required>
        </div>
        <div class="col-md-6">
            <label for="Domicilio" class="form-label">Domicilio</label>
            <input type="text" class="form-control" id="Domicilio" name="Domicilio" value="<?php echo $obj->getDomicilio()?>" readonly required>
        </div>
    </hr>
        
    </form>

<div class="row  m-4">
    <?php 
    $objAbmTabla = new ABMAuto();
    $arrayDni=[ 'DniDuenio' => $obj->getNroDni()];
    $listaTabla = $objAbmTabla->buscar($arrayDni);
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
                        <td>'.$objTabla->getObjPersona()->getApellido().'</td>';
                  
                 }
                 echo '  </tbody>
                 </table>';
                }
                else{

                    echo "<h3 class='text-center'>No tiene autos registrados</h3>";
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
        <?php }else {
    
    echo "<p>No se encontro la clave que desea modificar";
}?>
  <div class="col-md-3">
            <a href="listaPersonas.php"class="btn btn-secondary d-grid gap-2 pl-0 mx-auto col-6 pt-2">Listado personas</a>
        </div>  
    </div>
  
    </div>
<?php
include_once 'estructura/footer.php'; ?>