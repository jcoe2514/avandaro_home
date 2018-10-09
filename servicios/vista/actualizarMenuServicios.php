<?php

     include "../controlador/menuServiciosControlador.php";
     
     $id      = $_POST['id'];
     $nombre  = $_POST['nombre'];
     $icon    = $_POST['icon'];
     $url     = $_POST['url'];
     $status  = $_POST['status'];
     
     
         $menuController = new menuServiciosControlador();
         
         if($menuController->actualizarPorId($id, $nombre, $icon, $url,$status)) {
            echo "true";
         } else {
            echo "false";
         }
    
    
     
?>