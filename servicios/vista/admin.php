
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Avandaro Home Real State</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
     <img src="../img/logo.png" height="64" width="64" />
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="#">Inicio</a></li>
         
        <li><a href="usuarios.php">Usuarios</a></li>
        <li class=" dropdown">
             <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Servicios <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li class=" dropdown">
                    <a href="menuServicios.php">Catalgo de Servicios</a>
                </li>
                <li><a href="#">Catalogo Tipo Servicio</a></li>
                <li><a href="#">Catalogo Detalle Servicio</a></li>
            </ul>
        </li>
        <li><a href="#">Clientes</a></li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        
        <li><?php
																   session_start();
																   if(isset($_SESSION["usuario"]) && isset($_SESSION['password'])) {
																       ?>
																        <a href="cerrar.php" class="btn btn-default btn-sm pull-right">Cerrar Session</a>
																        <?php
																   } else {
																       echo "<meta http-equiv='refresh' content='0;url=login.php'>";
																   }
																?></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container">
  <h3>Bienvenido</h3>
  <p>Panel Administrativo de Configuración de Servicios</p>

  <p>Avandaro Home Real State
</div>

</body>
</html>

