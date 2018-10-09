<?php

     include "../controlador/usuariosControlador.php";
     
     $usuario  = $_POST['usuario'];
     

     
     	if( trim($usuario) == "" ) {
     		echo "false";
     	} else {
     		$usrController = new usuariosControlador();
              
               $usrController->buscarUsuario($usuario);
     	     	
     	}
    
     
?>