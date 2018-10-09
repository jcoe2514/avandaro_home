<?php 
     $nombre = $_POST['nombre'];
     $asunto = $_POST['asunto'];
     $mensaje = $_POST['mensaje'];

     mail('juliocazul@hotmail.com', $asunto, $mensaje);
 ?>