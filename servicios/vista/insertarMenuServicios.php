<?php

     include "../controlador/menuServiciosControlador.php";
     $nombre   = $_POST['nombre'];
     $icon     = $_POST['icon'];
     $url      = $_POST['url'];
     $status   = $_POST['status'];

     if(isset($nombre) ||  isset($icon) ||  isset($url)||  isset($status)) {
     	if(trim($nombre) == "" ||  trim($icon) == "" ||  trim($url) == "" ) {
     		echo "false";
     	} else {
     		$menuController = new menuServiciosControlador();
               if($menuController->existeMenu($nombre)) {
     	     	echo "si";
               } else {
                   
                    if($menuController->insertarMenu($nombre, $icon, $url, $status)) {
                         echo true;
                    } else {
                         echo false;
                    }
               }
     	}
     	
     } else {
     	echo "false";
     }
     
?>