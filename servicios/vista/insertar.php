<?php

     include "../controlador/usuariosControlador.php";
     $nombre   = $_GET['nombre'];
     $usuario  = $_GET['usuario'];
     $password = $_GET['password'];

     if(isset($nombre) ||  isset($usuario) ||  isset($password)) {
     	if(trim($nombre) == "" ||  trim($usuario) == "" ||  trim($password) == "") {
     		echo "false";
     	} else {
     		$usrController = new usuariosControlador();
               if($usrController->existeUsuario($usuario)) {
     	     	echo "si";
               } else {
                    if($usrController->insertarUsuarios($nombre, $usuario, $password)) {
                         echo "true";
                    } else {
                         echo "false";
                    }
               }
     	}
     	
     } else {
     	echo "false";
     }
     
?>