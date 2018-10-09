<?php

     include "../controlador/menuServiciosControlador.php";
     
     $nombre  = $_POST['nombre'];
     

     
     	if( trim($nombre) == "" ) {
     		echo "false";
     	} else {
     		$menuController = new menuServiciosControlador();
              
            $menuController->buscarEspesifica($nombre);
     	     	
     	}
    
     
?>