<?php
$titulo = "Cambiar de Due&nacute;o";
include_once '../configuracion.php';
include_once 'estructura/header.php';

?>
<div class="container border border-secondary principal mt-3 pt-3">
    <h3 class="text-center">Buscar Persona</h3>
    <form method="post" class="row m-3 p-4 pt-3 bg-light fw-bold needs-validation" action="accionBuscarPersona.php" novalidate>
     
        <hr />
        <div class="col-md-2">
        <label for="NroDni" class="form-label">NroDni</label>
<input type="number" class="form-control" id="NroDni" name="NroDni" placeholder="Escriba NroDni"  min="1000000" max="99999999" required>
            <div class="invalid-feedback">
                        Ingrese DNI (8 n&uacute;meros)
                    </div>
                    <div class="valid-feedback">
                        Correcto!
                    </div>
        </div>
      
        <div class="col-md-3 pt-3">
            <button class="btn btn-secondary d-grid gap-2 pl-0 mx-auto col-6 pt-2">Buscar</button>
        </div>
    </form>
</div>
<script src="js/validacionFormulario.js"></script>
<?php
include_once 'estructura/footer.php';
?>