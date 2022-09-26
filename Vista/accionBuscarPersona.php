<?php
$titulo = "Editar persona";
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
    <h3 class="text-center">Editar persona</h3>
    <?php if ($obj!=null){?>
    <form method="post" class="row m-4 p-4 pt-3 bg-light fw-bold needs-validation" action="ActualizarDatosPersona.php" novalidate>
        <div class="col-md-2">
            <label for="NroDni" class="form-label">NroDni</label>
            <input type="text" class="form-control" id="NroDni" name="NroDni" value="<?php echo $obj->getNroDni();?>" readonly required>
        </div>
        <div class="col-md-4">
            <label for="Apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="Apellido" name="Apellido" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{3,48}" value="<?php echo $obj->getApellido();?>" required>
                   <div class="invalid-feedback">
                        Ingrese Apellido (min. 3 caracteres)
                    </div>
                    <div class="valid-feedback">
                        Correcto!
                    </div>
        </div>
        <div class="col-md-4">
            <label for="Nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{3,48}" value="<?php echo $obj->getNombre();?>" required>
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

                <input type="date" class="form-control" id="fechaNac" name="fechaNac" value="<?php echo $obj->getFechaNac();?>" required>
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
            <input type="tel" class="form-control" id="Telefono" name="Telefono" value="<?php echo $obj->getTelefono();?>" required>
            <div class="invalid-feedback">
                        Ingrese telefono 
                     </div>
                    <div class="valid-feedback">
                        Correcto!
                    </div>
        </div>
        <div class="col-md-6">
            <label for="Domicilio" class="form-label">Domicilio</label>
            <input type="text" class="form-control" id="Domicilio" name="Domicilio" value="<?php echo $obj->getDomicilio();?>" required>
            <div class="invalid-feedback">
                        Ingrese Domicilio
                    </div>
                    <div class="valid-feedback">
                        Correcto!
                    </div>
        </div>
        <input id="accion" name="accion" value="editar" type="hidden">
        <div class="col-12 pt-5">
            <button class="btn btn-success d-grid gap-2 col-3 mx-auto" type="submit">Actualizar</button>
        </div>
    </form><?php }else {
    
    echo "<h4 class='text-center bg-danger text-light'>No se encontro el Nro DNI</h4>";
}?>

<div class="col-md-3">
            <a href="BuscarPersona.php"class="btn btn-secondary d-grid gap-2 pl-0 mx-auto col-6 pt-2">Volver a buscar</a>
        </div>
        </div>
        <script src="js/validacionFormulario.js"></script>
<?php
include_once 'estructura/footer.php'; ?>