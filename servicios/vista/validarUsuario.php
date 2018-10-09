<?php
     include "../controlador/usuariosControlador.php";
    
     $usuario  = $_POST['usuario'];

     if( isset($usuario) ) {
     	if(trim($usuario) == "") {
     		echo "false";
     	} else {
     		$usrController = new usuariosControlador();
     
	     	if($usrController->existeUsuario($usuario)) {
                    
	     	 	echo "si";
	     	} else {
	     		
	     	}
     	}
     	
     } else {
     	echo "false";
     }
     
?>