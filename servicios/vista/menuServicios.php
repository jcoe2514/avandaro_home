<!DOCTYPE html>
<html lang="en">
<head>
  <title>Avandaro Home Real State</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/menuServicios.js"></script>
  <script language="JavaScript" src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
  <script language="JavaScript" src="https://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>


  <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css">
    
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
        <li><a href="admin.php">Inicio</a></li>
        
        <li><a href="usuarios.php">Usuarios</a></li>
        <li class=" dropdown">
             <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Servicios <span class="caret"></span></a>
            <ul class="dropdown-menu">
                 <li class=" dropdown">
                    <a href="menuServicios.php">Catalgo Menú Servicios</a>
                </li>
                <li><a href="altaDefinicioSevicio.php">Catalogo Definicion Servicio</a></li>
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
  <form class="form-horizontal" role="form">
              <div id="resultado"></div>
        <fieldset>

          <!-- Form Name -->
          <legend>Alta de Menú de Servcios</legend>
          <input type="hidden" id="id"  />
          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Nombre</label>
            <div class="col-sm-4">
              <input type="text" placeholder="Nombre" id="nombre" class="form-control">
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Icon</label>
            <div class="col-sm-4">
              <input type="text" placeholder="Icon" id="icon" class="form-control">
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Url</label>
            <div class="col-sm-4">
              <input type="text" id="url" placeholder="Url" class="form-control">
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput">Status</label>
            <div class="col-sm-1">

              <input type="checkbox" placeholder="Status" id="status" class="form-control">
            </div>

          </div>



         

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-4">
              <div class="pull-right">
                <button type="submit" id="cancel" class="btn btn-default">Cancel</button>
                <button type="submit" id="guardar" class="btn btn-primary">Guardar</button>
                <button type="submit" id="actualizar" class="btn btn-primary">Actualizar</button>
                <button type="submit" id="buscar" class="btn btn-primary">Buscar</button>
               
              </div>
            </div>

            <div class="row">
    <h2 class="text-center">Consulta de Menú de Servicios</h2>
  </div>
    
        <div class="row">
    
            <div class="col-md-12">
            
            
<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="30%">
            <thead>
            <tr>
              <th width="30%">Nombre</th>
              <th width="10%">Icon</th>
              <th width="30%">Url</th>
              <th width="10%">Status</th>
              <th width="10%">Editar</th>
              <th width="10%">Eliminar</th>
            </tr>
          </thead>

          <tfoot>
            <tr>
              <th width="30%">Nombre</th>
              <th width="10%">Icon</th>
              <th width="30%">Url</th>
              <th width="10%">Status</th>
              <th width="10%">Editar</th>
              <th width="10%">Eliminar</th>
            </tr>
          </tfoot>

          
        </table>

  
  </div>
  </div>
</div>
          </div>



        </fieldset>
      </form>
</div>


</div>


</body>
</html>