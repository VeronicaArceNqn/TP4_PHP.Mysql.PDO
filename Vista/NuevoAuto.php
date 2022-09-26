<?php
$titulo = "Nuevo Auto";
include_once '../configuracion.php';
include_once 'estructura/header.php';

?>
<div class="container border border-secondary principal mt-3 pt-3">
    <h3 class="text-center">Nuevo Auto</h3>
    <form method="post" class="row m-3 p-4 pt-3 bg-light fw-bold needs-validation" action="accionNuevoAuto.php" novalidate>
        <div class="col-md-3">
            <label for="Patente" class="form-label">Patente</label>
            <input type="text" class="form-control" id="Patente" name="Patente" minlength="6"  required>
            <div class="invalid-feedback">
                        Ingrese Patente (min. 6 caracteres)
                    </div>
                    <div class="valid-feedback">
                        Correcto!
                    </div>
        </div>
        <div class="col-md-5">
            <label for="Marca" class="form-label">Marca</label>
            <input type="text" class="form-control" id="Marca" name="Marca" minlength="2" required>
            <div class="invalid-feedback">
                        Ingrese Marca(2 caracteres)
                    </div>
                    <div class="valid-feedback">
                        Correcto!
                    </div>
        </div>
        <div class="col-md-2">
            <label for="Modelo" class="form-label">Modelo</label>
            <input type="number" class="form-control" id="Modelo" name="Modelo" min="1950" max="<?php echo date("Y"); ?>" required>
            <div class="invalid-feedback">
                        Ingrese Modelo(4 caracteres)
                    </div>
                    <div class="valid-feedback">
                        Correcto!
                    </div>

        </div>

        <div class="col-md-2">
            <label for="DniDuenio" class="form-label">NroDni</label>
            <input type="number" min="1000000" max="99999999"  class="form-control" id="DniDuenio" name="DniDuenio" required>
            <div class="invalid-feedback">
                        Ingrese Nro Dni (8 caracteres)
                    </div>
                    <div class="valid-feedback">
                        Correcto!
                    </div>
        </div>
        <input id="accion" name="accion" value="nuevo" type="hidden">
        <div class="col-12 pt-5">
            <button class="btn btn-success d-grid gap-2 col-3 mx-auto" type="submit">Guardar</button>
        </div>
    </form>
    <div class="row  m-4">
        <?php 
       /* 
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
                        <td>'.$objTabla->getObjPersona()->getApellido().'</td>';
                        
                        echo'</tr>';
                        
                  
                 }
                 echo '   </tbody>
                 </table>';
                }
                else{

                    echo "<h3>No hay autos registrados </h3>";
                }
                */
                ?>
            
         
</div>

</div>
<script src="js/validacionFormulario.js"></script>
<?php
include_once 'estructura/footer.php';
?>