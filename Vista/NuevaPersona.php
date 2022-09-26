<?php
$titulo = "Nueva persona";
include_once '../configuracion.php';
include_once 'estructura/header.php';

?>
<div class="container border border-secondary principal mt-3 pt-3">
    <h3 class="text-center">Nueva persona</h3>
    <form method="post" class="row m-3 p-4 pt-3 bg-light fw-bold needs-validation" action="accionNuevaPersona.php"  novalidate>
        <div class="col-md-2">
            <label for="NroDni" class="form-label">NroDni</label>
            <input type="number" class="form-control" id="NroDni" name="NroDni" min="1000000" max="99999999" required>
            <div class="invalid-feedback">
                        Ingrese DNI (8 n&uacute;meros)
                    </div>
                    <div class="valid-feedback">
                        Correcto!
                    </div>
        </div>
        <div class="col-md-4">
            <label for="Apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="Apellido" name="Apellido" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{3,48}" required>
                   <div class="invalid-feedback">
                        Ingrese Apellido (min. 3 caracteres)
                    </div>
                    <div class="valid-feedback">
                        Correcto!
                    </div>
        </div>
        <div class="col-md-4">
            <label for="Nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{3,48}" required>
                    <div class="invalid-feedback">
                        Ingrese Nombre (min. 3 caracteres)
                    </div>
                    <div class="valid-feedback">
                        Correcto!
                    </div>
        </div>
      
        <div class="col-md-2">
            <label for="fechaNac" class="form-label">Fecha de Nac.</label>
            <div class="input-group">

                <input type="date" class="form-control" id="fechaNac" name="fechaNac" required>
            </div>
            <div class="invalid-feedback">
                        Ingrese fecha Nacimiento
                    </div>
                    <div class="valid-feedback">
                        Correcto!
                    </div>
        </div>
        <div class="col-md-6">
            <label for="Telefono" class="form-label">Telefono</label>
            <input type="tel" class="form-control" id="Telefono" name="Telefono" required>
            <div class="invalid-feedback">
                        Ingrese telefono 
                     </div>
                    <div class="valid-feedback">
                        Correcto!
                    </div>
        </div>
        <div class="col-md-6">
            <label for="Domicilio" class="form-label">Domicilio</label>
            <input type="text" class="form-control" id="Domicilio" name="Domicilio" required>
            <div class="invalid-feedback">
                        Ingrese Domicilio
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
<!--
    <div class="row m-4  border border-success border-3">
 <table class="table table-dark table-striped text-center" cellspacing="0"
  width="100%">
            <thead>
                <tr>
                    <th scope="col">NroDni</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                -->
                <?php
/*
                $objAbmTabla = new ABMPersona();

                $listaTabla = $objAbmTabla->buscar(null);
                if(count($listaTabla)>0){
                    foreach ($listaTabla as $objTabla) { 
                        
                        echo '<tr>
                        <th scope="row">'.$objTabla->getNroDni().'</th>';
                        echo '
                        <td>'.$objTabla->getNombre().'</td>';
                        echo '
                        <td>'.$objTabla->getApellido().'</td>';
                  
                        // href="persona_editar.php?NroDni='.$objTabla->getNroDni().'
                        echo '<td><a href="accionBuscarPersona.php?NroDni='.$objTabla->getNroDni().'" class="btn btn-primary"><i class="bi bi-pencil-square"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                      </svg></i></a></td>';
                        //personaresult.php?accion=borrar&NroDni='.$objTabla->getNroDni().'
                        echo '<td><a href="ActualizarDatosPersona.php?accion=borrar&NroDni='.$objTabla->getNroDni().'" class="btn btn-warning"><i class="bi bi-trash-fill"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                      </svg></i></a></td></tr>'; 
                    }
                    echo '  </tbody>
                    </table>';
                }
                 else{
                    
                    echo "<h3>No hay personas registradas </h3>";
                 }*/
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
<script src="js/validacionFormulario.js"></script>
<?php
include_once 'estructura/footer.php';
?>