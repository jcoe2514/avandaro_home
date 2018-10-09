<?php
     include "../controlador/usuariosControlador.php";
    
     $usuario  = $_POST['usuario'];
     $password = $_POST['password'];

     if( isset($usuario) ||  isset($password)) {
     	if(trim($usuario) == "" ||  trim($password) == "") {
     		echo "false";
     	} else {
     		$usrController = new usuariosControlador();
     
	     	if($usrController->validar( $usuario, $password)) {
                    session_start();
                    $_SESSION["usuario"]  = $usuario;
                    $_SESSION['password'] =$password;
	     	 	echo "true";
	     	} else {
	     		echo "false";
	     	}
     	}
     	
     } else {
     	echo "false";
     }
     
?>