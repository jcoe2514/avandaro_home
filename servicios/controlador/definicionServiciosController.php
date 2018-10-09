<?php
                       
     include "../datos/definicionServiciosDao.php";

     class definicionServiciosController {
          function insertar($idmenu, $titulo, $subtitulo, $detalle, $path, $dataimage) {
               $obj = new definicionServiciosDao();
    		   return $obj->insertar($idmenu, $titulo, $subtitulo, $detalle, $path, $dataimage);
          }

          function existeTitulo($titulo) {
          	   $obj = new definicionServiciosDao();
          	   return $obj->existeTitulo($titulo);
          }

          function buscarPorMenu($idMenu) {
          	   $obj = new definicionServiciosDao();
          	   return $obj->buscarPorMenu($idMenu);
          }

          function buscarEspecifica($idMenu, $idTitulo) {
          	   $obj = new definicionServiciosDao();
          	   return $obj->buscarEspecifica($idMenu, $idTitulo);
          }

          function verImagenes($idTitulo) {
          	   $obj = new definicionServiciosDao();
          	   return $obj->verImagenes($idTitulo);
          }


     }
?>