<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/estilos.css">		
    <script src="js/bootstrap.bundle.js"></script>
    <title><?php echo $titulo?></title>
</head>
<body>
    
    <header class="container-fluid" > <div class="pt-5"><h3 class="text-secondary text-center">Tp 4 : PHP-Mysql-PDO</h3>
</div>
    <ul class="nav nav-tabs navbar-light bg-light">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">TP Nº4</a>
          <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="VerAutos.php">Ver Autos</a></li>
           <li><a class="dropdown-item" href="buscarAuto.php">Buscar Auto</a></li>
           
           <li><a class="dropdown-item" href="listaPersonas.php">Lista Personas</a></li>
           <li><hr class="dropdown-divider"></li>
           <li><a class="dropdown-item" href="NuevaPersona.php">Nueva persona</a></li>
            <li><a class="dropdown-item" href="NuevoAuto.php">Nuevo auto</a></li>
            <li><a class="dropdown-item" href="CambioDuenio.php">Cambio de Due&nacute;o</a></li>
            <li><a class="dropdown-item" href="BuscarPersona.php">Buscar Persona</a></li>
           
          
          </ul>
        </li>
        <!--<li class="nav-item">
            <a class="nav-link" href="#">Enlace</a>
          </li>
           -->
        </ul>
    </header>