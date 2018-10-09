<?php
     include "../controlador/definicionServiciosController.php";
     $idMenu = $_POST['idMenu'];

     $defServiciosController = new definicionServiciosController();

     $datos = $defServiciosController->buscarPorMenu($idMenu);
?>