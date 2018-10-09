<?php
     include "../controlador/usuariosControlador.php";

     $usrController = new usuariosControlador();

     $datos = $usrController->buscarUsuarioTodos();

?>