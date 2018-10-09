<?php
    class conexion {
         function conectar() {
              return mysqli_connect("localhost", "root", "");
         }
    }
    $conn = new conexion();
   

?>