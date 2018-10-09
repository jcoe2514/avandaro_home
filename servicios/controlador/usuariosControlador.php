<?php
    include "../datos/usuariosDatos.php";

    class usuariosControlador {
    	function insertarUsuarios($nombre, $usuario, $password) {
    		$obj = new usuariosDatos();
    		return $obj->insertarUsuarios($nombre, $usuario, $password);
    	}

    	function validar($usuario, $password) {
    		$obj = new usuariosDatos();
    		return $obj->validar($usuario, $password);
    	}

         function existeUsuario($usuario) {
            $obj = new usuariosDatos();
            return $obj->existeUsuario($usuario);
         }
         
         function buscarUsuario($usuario) {
            $obj = new usuariosDatos();
            return $obj->buscarUsuario($usuario);
         }

         function buscarUsuarioTodos() {
            $obj = new usuariosDatos();
            return $obj->buscarUsuarioTodos();
         }

         function eliminarUsuario($usuario) {
            $obj = new usuariosDatos();
            return $obj->eliminarUsuario($usuario);
         }
    }

    
?>