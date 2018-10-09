<?php
    include "../datos/menuServiciosDao.php";

    class menuServiciosControlador {
         
    	function insertarMenu($nombre, $icon, $url, $status) {
    		$obj = new menuServiciosDao();
    		return $obj->insertarMenu($nombre, $icon, $url, $status) ;
    	}

    	function buscarTodos() {
    	    $obj = new menuServiciosDao();
    		return $obj->buscarTodos();	
    	}

        function buscarEspesifica($nombre) {
            $obj = new menuServiciosDao();
            return $obj->buscarEspesifica($nombre);
        }

        function eliminarMenu($id) {
            $obj = new menuServiciosDao();
            return $obj->eliminarMenu($id) ;
        }

        function existeMenu($nombre) {
            $obj = new menuServiciosDao();
            return $obj->existeMenu($nombre) ;   
        }

        function buscarPorId($id) {
            $obj = new menuServiciosDao();
            return $obj->buscarPorId($id);
        }

        function actualizarPorId($id, $nombre, $icon, $url,$status) {
            $obj = new menuServiciosDao();
            return $obj->actualizarPorId($id, $nombre, $icon, $url,$status);
        }
    }
?>