<!DOCTYPE html>
<html lang="es">
<head>
	<title>Avandaro Home Real State</title>
	<meta charset="utf-8">
	<style type="text/css">
		label{
			width: 100px;
			display: inline-block;
		}
	</style>
     <link rel="stylesheet" type="text/css" href="css/styleMail.css">
     <script type="text/javascript" src="js/jquery-1.6.1.min.js" />
     <script type="text/javascript" src="js/eventsJs.js" />
</head>
<body>
     <form action="contacto.html" method="post">
     	<label for="contacto.html">Nombre:</label>
     	<input type="text" name="nombre" id="nombre" placeholder="Nombre" /><br/>
     	<label for="asunto">Asunto:</label>
     	<input type="text" name="asunto" id="asunto" placeholder="Asunto" /><br/>
     	<label for="mensaje">Mensaje</label>
     	<textarea name="mensaje" id="mensaje" rows="10" cols="30" placeholder="Escriba el mensaje que desea enviar"></textarea><br/>
     	<input type="submit" value="Enviar" />

<?php 
     $nombre = $_POST['nombre'];
     $asunto = $_POST['asunto'];
     $mensaje = $_POST['mensaje'];

     if(mail('test@avandarohome.com.mx', $asunto, $mensaje)) {
          echo "mail enviado";
     } else {
          echo "";
     }
 ?>
     </form>

</body>
</html>