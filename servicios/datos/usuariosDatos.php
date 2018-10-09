<?php
     include "../entity/usuarios.php";
     include "conexion.php";
     class usuariosDatos{
          function insertarUsuarios($nombre, $usuario, $password) {
               $conn = new conexion();
               $con  = $conn->conectar();

               $usuarios = new usuarios();
               $usuarios->nombre =$nombre;
               $usuarios->usuario =$usuario;
               $usuarios->password =$password;

               mysqli_select_db($con, "avandaro_home");
               $sSql = "INSERT INTO  TC_USER
                               (NOMBRE, USUARIO, PASSWORD) 
                                  VALUES 
                               (
                                  '".$usuarios->nombre."',
                                  '".$usuarios->usuario."',
                                  '".$usuarios->password."'
                                 )
                       ";
                 
                if(mysqli_query($con, $sSql)) {
                	
                	return true;
                } else {
                	
                	return false;
                }
                mysqli_close($con);
     	  }

     	  function validar($usuario, $password) {
     	         $conn = new conexion();
               $con  = $conn->conectar();

               $usuarios = new usuarios();
             
               $usuarios->usuario =$usuario;
               $usuarios->password =$password;
               

               mysqli_select_db($con, "avandaro_home");

               $sSql ="SELECT usuario, password FROM TC_USER WHERE USUARIO ='".$usuarios->usuario."' AND PASSWORD = '".$usuarios->password."'";
               
                           
               $consulta = mysqli_query($con, $sSql);

               $fila = mysqli_fetch_array($consulta);

               if($fila > 0) {
                   if($fila["usuario"] == $usuarios->usuario && $fila['password'] == $usuarios->password) {
                        return  true;
                   }
               	   
               } else {
               	    return false;
               }
               mysqli_close($con);

          }

          function existeUsuario($usuario) {
               $conn = new conexion();
               $con  = $conn->conectar();

               $usuarios = new usuarios();
                 
               $usuarios->usuario =$usuario;
                   

               mysqli_select_db($con, "avandaro_home");

               $sSql ="SELECT * FROM TC_USER WHERE USUARIO ='".$usuarios->usuario."'";
                   
                
               $consulta = mysqli_query($con, $sSql);

               $fila = mysqli_fetch_array($consulta);

               mysqli_close($con);

          }

          function buscarUsuario($usuario) {
              $conn = new conexion();
               $con  = $conn->conectar();

               $usuarios = new usuarios();

               $usuarios->usuario = $usuario;

               mysqli_select_db($con, "avandaro_home");

               $sSql ="SELECT nombre, usuario  FROM TC_USER WHERE USUARIO = '".$usuarios->usuario."' ";
                   
                
               $consulta = mysqli_query($con, $sSql);

               $response = array();
               
               while($fila = mysqli_fetch_array($consulta)){
                    array_push($response,array("nombre"=>$fila["nombre"],"usuario"=>$fila["usuario"]));
               }

               echo json_encode($response);
               mysqli_close($con);

              
          }

          function buscarUsuarioTodos() {
               $conn = new conexion();
               $con  = $conn->conectar();

               $usuarios = new usuarios();

               mysqli_select_db($con, "avandaro_home");

               $sSql ="SELECT nombre, usuario  FROM TC_USER ";
                   
                
               $consulta = mysqli_query($con, $sSql);

               $response = array();
               
               while($fila = mysqli_fetch_array($consulta)){
                    array_push($response,array("nombre"=>$fila["nombre"],"usuario"=>$fila["usuario"]));
               }

               echo json_encode($response);
               mysqli_close($con);
          }

          function eliminarUsuario($usuario) {
              $conn = new conexion();
              $con  = $conn->conectar();

              $usuarios = new usuarios();

              $usuarios->usuario = $usuario;

              mysqli_select_db($con, "avandaro_home");

              $sSql = "DELETE FROM TC_USER WHERE USUARIO = '".$usuarios->usuario ."' ";
              echo  $sSql;
              if(mysqli_query($con, $sSql)) {
                    echo "true";

              } else {
                    echo "false";
              }
              mysqli_close($con);
          }
     }
     

     
     

  
    /*$obj = new usuariosDatos();
    if($obj->eliminarUsuario("yo")) {
     	echo "todo bien";
     } else {
     	echo "nada";
     }*/
?>