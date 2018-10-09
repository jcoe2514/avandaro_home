<!DOCTYPE html>
<html lang="en">
<head>
  <title>Avandaro Home Real State</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <script language="JavaScript" src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
  <script language="JavaScript" src="https://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>


  <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css"> 
  <link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.5.4/bootstrap-select.min.cs">
  <link rel="stylesheet" type="text/css" href="css/upload.css">
  <script type="text/javascript" src="js/upload.js"></script>
  <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
  <script type="text/javascript" src="js/jquery.bbslider.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/builder.css">
  
  <script type="text/javascript" src="js/definicionServicio.js"></script>
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
  <div class="contact-section">
    <div class="container">
      <div class="container-page">        
      <div class="col-md-12">
      <form  role="form" id="formup" enctype="multipart/form-data" method="post">
                  <div id="resultado"></div>
            <fieldset>

                <!-- Form Name -->
                <legend>Alta de Definicio del Servicio</legend>
                    <div class="form-group col-lg-5">
                          <label>Menú Servicio:</label>
                          <select class="form-control form-control-lg" name="category" id="menu" onchange="" required>
                               <option value="">Seleccione Menú... </option>
                        
                          </select>
                    </div>
                    <div class="form-group col-lg-5">
                          <label>Titulo</label>
                          <input type="text" placeholder="Titulo" id="titulo" class="form-control" required />
                    </div>

                    <div class="form-group col-lg-5">
                          <label>Subtitulo</label>

                          <input type="text" placeholder="Subitulo"  id="subtitulo" class="form-control" required />
                    </div>
                     <div class="form-group col-lg-7">
                         <label>Detalles</label>
                         <textarea class="form-control rounded-0" required placeholder="Detalle" id="detalle" rows="3" cols="50"></textarea>
                      
                    </div>
                     <div class="form-group col-lg-6">
                      <div class="form-group files color">
                        <label  class="col-sm-7 control-label">Arrastra para Subir Archivos </label>
                        <input class="form-control" required accept="image/*" name="file[]" type="file" id="file" multiple  />
                        <div id="uploadStatus"></div>
                        <div class="gallery" id="imagesPreview"></div>
                      </div>
                    </div>
                    <div class="form-group col-lg-6">
                      <div id="slide">
    
    
                        
                       </div>

                 
                     
                    </div>
                    <div class="form-group col-lg-5">
                       <button type="submit" id="cancel" class="btn btn-default">Cancel</button>
                       <button type="submit" id="guardar" class="btn btn-primary">Guardar</button>
                       <button type="submit" id="buscar" class="btn btn-primary">Buscar</button>
                    </div>
                   
                    <div class="row">
                          <div class="col-md-12">
                              <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="30%">
                                  <thead>
                                    <tr>
                                      <th width="20%">Titulo</th>
                                      <th width="20%">Subtitulo</th>
                                      <th width="40%">Detalle</th>
                                      <th width="10%">Imagenes</th>
                                      <th width="10%">Editar</th>
                                      <th width="10%">Eliminar</th>
                                    </tr>
                                  </thead>
                                   <tfoot>
                                    <tr>
                                      <th width="20%">Titulo</th>
                                      <th width="20%">Subtitulo</th>
                                      <th width="40%">Detalle</th>
                                      <th width="10%">Imagenes</th>
                                      <th width="10%">Editar</th>
                                      <th width="10%">Eliminar</th>
                                    </tr>
                                  </tfoot>
                              </table>
                          </div>
                    </div>
                
            </fieldset>
      </form>
      </div>
      </div>
    </div>
  </div>

</div>
</body>
</html>