<?php

     include "../controlador/menuServiciosControlador.php";
     
     $id  = $_POST['id'];
 	 if( trim($id) == "" ) {
 	 	echo "false";
 	 } else {
 	  	 $menuController = new menuServiciosControlador();
          
         $menuController-> buscarPorId($id);
 	 }
?>