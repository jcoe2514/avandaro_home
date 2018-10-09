<?php
     include "../entity/definicionServicios.php";
     include "../entity/imagenesServicios.php";
     include "conexion.php";

     class definicionServiciosDao {
          function insertar($idmenu, $titulo, $subtitulo, $detalle, $path, $dataimage) {
               $conn = new conexion();
               $con  = $conn->conectar();

               $defServicios = new definicionServicios();

               $defServicios->id = $idmenu;

               $defServicios->titulo = $titulo;
               $defServicios->subtitulo = $subtitulo;
               $defServicios->detalle = $detalle;

               $imgsServicios = new imagenesServicios();
               $imgsServicios->path = $path;
               $imgsServicios->idDef = 0;


               mysqli_select_db($con, "avandaro_home");

               $sSql1 = "INSERT INTO TC_DEFINICION_SERVICIO (TITULO, SUBTITULO, DETALLE, ID_TIPO) VALUES ('".$defServicios->titulo."', '".$defServicios->subtitulo."', '".$defServicios->detalle = $detalle."', ".$defServicios->id.")";
               if (mysqli_query($con, $sSql1)) {
                   $last_id = mysqli_insert_id($con);
                   $imgsServicios->idDef = $last_id;
                   $longitud = count($dataimage);

                   
                   for($i = 0; $i < $longitud; $i++) {
                        $sSql2 = "INSERT INTO TC_IMAGENES_SERVICIO (NOMBRE_IMAGEN, PATH, ID_DEF) VALUES ('".$dataimage[$i]."','".$imgsServicios->path."',".$imgsServicios->idDef.")";
                        mysqli_query($con, $sSql2);
                   }
                   return true;
               } else {
                   return false;
               }

               mysqli_close($con);

          }

          function existeTitulo($titulo) {
               $conn = new conexion();
               $con  = $conn->conectar();

               $defServicios = new definicionServicios();
               $defServicios->titulo = $titulo;

               mysqli_select_db($con, "avandaro_home");

               $sSql ="SELECT *  FROM TC_DEFINICION_SERVICIO WHERE TITULO = '".$defServicios->titulo."'";
                   
                
               $consulta = mysqli_query($con, $sSql);

               if(mysqli_fetch_array($consulta)>0) {
                    return true;
               } else {
                    return false;
               }
               
               mysqli_close($con);
               
          }

          function buscarPorMenu($idMenu) {
               $conn = new conexion();
               $con  = $conn->conectar();

               $defServicios = new definicionServicios();
               $defServicios->idTipo = $idMenu;

               mysqli_select_db($con, "avandaro_home");

               $sSql ="SELECT ID, TITULO, SUBTITULO, DETALLE, ID_TIPO  FROM TC_DEFINICION_SERVICIO WHERE ID_TIPO = ".$defServicios->idTipo;
                   
                
               $consulta = mysqli_query($con, $sSql);

               $response = array();
               
               while($fila = mysqli_fetch_array($consulta)){
                    array_push($response,array("id"=>$fila["ID"],"titulo"=>$fila["TITULO"],"subtitulo"=>$fila["SUBTITULO"],"detalle"=>$fila["DETALLE"],"id_tipo"=>$fila["ID_TIPO"]));
               }

               echo json_encode($response);
               mysqli_close($con);
          }

          function buscarEspecifica($idMenu, $idTitulo) {
               $conn = new conexion();
               $con  = $conn->conectar();

               $defServicios = new definicionServicios();
               $defServicios->id     = $idTitulo;
               $defServicios->idTipo = $idMenu;

               mysqli_select_db($con, "avandaro_home");

               $sSql ="SELECT DS.ID,".
                             " DS.TITULO,".
                             " DS.SUBTITULO,".
                             " DS.DETALLE,".
                             " DS.ID_TIPO,".
                             " IM.PATH,".
                             "  IM.NOMBRE_IMAGEN".
                            " FROM TC_DEFINICION_SERVICIO DS,".
                                "  TC_IMAGENES_SERVICIO IM".
                      "  WHERE 1 = 1".
                      "    AND DS.ID = IM.ID_DEF".
                      "    AND DS.ID_TIPO = ".$defServicios->id. 
                      "    AND DS.ID = ".$defServicios->id;
                   
                
               $consulta = mysqli_query($con, $sSql);

               $response = array();
               
               while($fila = mysqli_fetch_array($consulta)){
                    array_push($response,array("id"=>$fila["ID"],"titulo"=>$fila["TITULO"],"subtitulo"=>$fila["SUBTITULO"],"id_tipo"=>$fila["ID_TIPO"],"path"=>$fila["PATH"],"nombre_imagen"=>$fila["NOMBRE_IMAGEN"]));
               }

               echo json_encode($response);
               mysqli_close($con);
          }

          function verImagenes($idTitulo) {
               $conn = new conexion();
               $con  = $conn->conectar();

               $imgServicios = new imagenesServicios();
               $imgServicios->idDef = $idTitulo;

               mysqli_select_db($con, "avandaro_home");

               $sSql ="SELECT ID, NOMBRE_IMAGEN, PATH, ID_DEF  FROM TC_DEFINICION_SERVICIO WHERE ID_DEF = ".$defServicios->idDef;
                   
                
               $consulta = mysqli_query($con, $sSql);

               $response = array();
               
               while($fila = mysqli_fetch_array($consulta)){
                    array_push($response,array("id"=>$fila["id"],"nombre_imagen"=>$fila["nombre_imagen"],"path"=>$fila["path"],"id_def"=>$fila["id_def"]));
               }

               echo json_encode($response);
               mysqli_close($con);

          }
     }

    /*$dataimage[0] = "img1.jpg";
    $dataimage[1] = "img2.jpg";
    $dataimage[2] = "img3.jpg";
    $dataimage[3] = "img4.jpg";
    $dataimage[4] = "img5.jpg";*/
   /* $obj = new definicionServiciosDao();
    echo "datos::".$obj->buscarPorMenu(1);
    
    /*if($obj->buscarTodos()("Renta de Casas", "fa fa-home", "Imperarial", 0)) {
          echo "todo bien";
     } else {
          echo "nada";
     }*/
?>