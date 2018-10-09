<?php
    
     include "../controlador/definicionServiciosController.php";
     $idTitulo =$_POST['idTitulo'];
     $idMenu = $_POST['idMenu'];

     $defServiciosController = new definicionServiciosController();

     $datos = $defServiciosController->buscarEspecifica($idMenu, $idTitulo);

?>