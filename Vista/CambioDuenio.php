<?php
$titulo = "Cambiar de Due&nacute;o";
include_once '../configuracion.php';
include_once 'estructura/header.php';

?>
<div class="container border border-secondary principal mt-3 pt-3">
    <h3 class="text-center">Cambio de Due&ntilde;o</h3>
    <form method="post" class="row m-3 p-4 pt-3 bg-light fw-bold needs-validation" action="accionCambioDuenio.php" novalidate>
     
        <hr />
        <div class="col-md-4">
        <label for="NroDni" class="form-label">NroDni</label>
<input type="number" class="form-control" id="NroDni" name="NroDni" placeholder="Escriba NroDni" min="1000000" max="99999999" required>
<div class="invalid-feedback">
                        Ingrese Nro Dni (8 n&uacute;meros)
                    </div>
                    <div class="valid-feedback">
                        Correcto!
                    </div>
        </div>
        <div class="col-md-4">
        <label for="Patente" class="form-label">Patente</label>
<input type="text" class="form-control" id="Patente" name="Patente" placeholder="Escriba Patente" minlength="6" required>
                    <div class="invalid-feedback">
                        Ingrese Patente (min. 6 caracteres)
                    </div>
                    <div class="valid-feedback">
                        Correcto!
                    </div>
        </div>
        <div class="col-md-4 pt-4">
            <button class="btn btn-success d-grid gap-2 pl-0 mx-auto col-6 pt-2">Buscar</button>
        </div>
    </form>
</div>
<script src="js/validacionFormulario.js"></script>
<?php
include_once 'estructura/footer.php';
?>