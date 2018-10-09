<?php
     include "../controlador/menuServiciosControlador.php";

     $servController = new menuServiciosControlador();

     $datos = $servController->buscarTodos();

?>