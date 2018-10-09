<?php
     include "../entity/menuServicios.php";
     include "conexion.php";
     class menuServiciosDao {
     	function insertarMenu($nombre, $icon, $url, $status) {
               $conn = new conexion();
               $con  = $conn->conectar();

               $menuServicios = new menuServicios();
               $menuServicios->nombre =$nombre;
               $menuServicios->icon =$icon;
               $menuServicios->url =$url;
               $menuServicios->status = $status;

               mysqli_select_db($con, "avandaro_home");
               $sSql = "INSERT INTO  TC_MENU_SERVICIO
                               (NOMBRE, ICON, URL, STATUS) 
                                  VALUES 
                               (
                                  '".$menuServicios->nombre."',
                                  '".$menuServicios->icon."',
                                  '".$menuServicios->url."',".$menuServicios->status."
                                 )
                       ";
                 
                if(mysqli_query($con, $sSql)) {
                	
                	return true;
                } else {
                	
                	return false;
                }
                mysqli_close($con);
     	  }

     	  function buscarTodos() {
     	  	    $conn = new conexion();
               $con  = $conn->conectar();

               $menu = new menuServicios();

               mysqli_select_db($con, "avandaro_home");

               $sSql ="SELECT id, nombre, url, icon, IF(status = 1, 'ACTIVO', 'INACTIVO') status  FROM TC_MENU_SERVICIO";
                   
                
               $consulta = mysqli_query($con, $sSql);

               $response = array();
               
               while($fila = mysqli_fetch_array($consulta)){
                    array_push($response,array("id"=>$fila['id'],"nombre"=>$fila["nombre"],"icon"=>$fila["icon"], "url"=>$fila['url'],"status"=>$fila['status']));
               }

               echo json_encode($response);
               mysqli_close($con);
          }
     	  

     function buscarEspesifica($nombre) {
     	  	    $conn = new conexion();
               $con  = $conn->conectar();

               $menu = new menuServicios();
               $menu->nombre = $nombre;

               mysqli_select_db($con, "avandaro_home");

               $sSql ="SELECT id, nombre, url, icon,  IF(status = 1, 'ACTIVO', 'INACTIVO') status  FROM TC_MENU_SERVICIO WHERE NOMBRE = '".$menu->nombre."'";
                   
                
               $consulta = mysqli_query($con, $sSql);

               $response = array();
               
               while($fila = mysqli_fetch_array($consulta)){
                    array_push($response,array("id"=>$fila['id'],"nombre"=>$fila["nombre"],"icon"=>$fila["icon"], "url"=>$fila['url'],"status"=>$fila['status']));
               }

               echo json_encode($response);
               mysqli_close($con);
          }

          function buscarPorId($id) {
     	  	    $conn = new conexion();
               $con  = $conn->conectar();

               $menu = new menuServicios();
               $menu->id = $id;

               mysqli_select_db($con, "avandaro_home");

               $sSql ="SELECT id, nombre, url, icon,  IF(status = 1, 'ACTIVO', 'INACTIVO') status  FROM TC_MENU_SERVICIO WHERE ID = ".$menu->id."";
                   
                
               $consulta = mysqli_query($con, $sSql);

               $response = array();
               
               while($fila = mysqli_fetch_array($consulta)){
                    array_push($response,array("id"=>$fila['id'],"nombre"=>$fila["nombre"],"icon"=>$fila["icon"], "url"=>$fila['url'],"status"=>$fila['status']));
               }

               echo json_encode($response);
               mysqli_close($con);
          }

          function eliminarMenu($id) {
              $conn = new conexion();
              $con  = $conn->conectar();

              $menu = new menuServicios();

              $menu->id = $id;

              mysqli_select_db($con, "avandaro_home");

              $sSql = "DELETE FROM TC_MENU_SERVICIO WHERE ID = ".$menu->id." ";
              
              if(mysqli_query($con, $sSql)) {
                    echo "true";

              } else {
                    echo "false";
              }
              mysqli_close($con);
          }

          function existeMenu($nombre) {
     	       $conn = new conexion();
               $con  = $conn->conectar();

               $menu = new menuServicios();
             
               $menu->nombre =$nombre;
                         

               mysqli_select_db($con, "avandaro_home");

               $sSql ="SELECT id, nombre, url, icon, status  FROM TC_MENU_SERVICIO WHERE NOMBRE = '".$menu->nombre."'";
               
                           
               $consulta = mysqli_query($con, $sSql);

               $fila = mysqli_fetch_array($consulta);

               if($fila > 0) {
                   return true;
               	   
               } else {
               	    return false;
               }
               mysqli_close($con);

     		}

     		function actualizarPorId($id, $nombre, $icon, $url,$status) {
     		   $conn = new conexion();
               $con  = $conn->conectar();

               $menu = new menuServicios();
             
               $menu->id     = $id;
               $menu->nombre = $nombre;
               $menu->icon   = $icon;
               $menu->url    = $url;
               $menu->status = $status;
                         

               mysqli_select_db($con, "avandaro_home");

               $sSql ="UPDATE TC_MENU_SERVICIO SET NOMBRE = '".$menu->nombre."', ICON ='".$menu->icon."', URL = '".$menu->url."', STATUS =".$menu->status." WHERE ID =".$menu->id."";
               //echo 'rsultado::'.$sSql;
               if(mysqli_query($con, $sSql)>0) {
                	
                	return true;
                } else {
                	
                	return false;
                }
                mysqli_close($con);

     		}
     	  

     }

     

    /*$obj = new menuServiciosDao();
    echo "datos".$obj->actualizarPorId(12, 'Home', 'Home', '', 0);
    /*if($obj->buscarTodos()("Renta de Casas", "fa fa-home", "Imperarial", 0)) {
     	echo "todo bien";
     } else {
     	echo "nada";
     }*/
?>