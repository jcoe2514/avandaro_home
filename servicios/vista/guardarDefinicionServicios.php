<?php
                            
    include "../controlador/definicionServiciosController.php";
    $id     = $_POST['id'];
    $menu   = $_POST['menu'];
    $fileSystem1 =strtolower(str_replace(" ", "_", $menu)) ;
    $titulo = $_POST['titulo'];//$_POST['titulo'];
    $fileSystem2 = strtolower(str_replace(" ", "_", $titulo));
    $subtitulo = $_POST['subtitulo'];

    $detalle   = $_POST['detalle'];
    $target_path = "img/";
    $defController = new definicionServiciosController();

    if($defController->existeTitulo($titulo) == 0) {
        $carpeta1 = $target_path ."". $fileSystem1;
        
    	$carpeta2 = $carpeta1."/".$fileSystem2;
    	
        if (!file_exists($carpeta1)) {
    		       
            mkdir($carpeta1, 0777, true);
            
        }

        if (!file_exists($carpeta2)) {
            mkdir($carpeta2, 0777, true);
        }
        
        $dataImage  = array();
        $bandera = "false";
        $i = 0;
        foreach($_FILES["file"]['tmp_name'] as $key => $tmp_name) {
            //Validamos que el archivo exista
            if($_FILES["file"]["name"][$key]) {
                $filename = $_FILES["file"]["name"][$key]; //Obtenemos el nombre original del archivo
                $source = $_FILES["file"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
                
                $pathDestino = $carpeta2."/";
                //$directorio = 'docs/'; //Declaramos un  variable con la ruta donde guardaremos los archivos
                
                //Validamos si la ruta de destino existe, en caso de no existir la creamos
                /*if(!file_exists($directorio)){
                    mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");    
                }*/
                
                $dir=opendir($pathDestino); //Abrimos el directorio de destino
                $target_path = $pathDestino.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
                
                //Movemos y validamos que el archivo se haya cargado correctamente
                //El primer campo es el origen y el segundo el destino
                if(move_uploaded_file($source, $target_path)) { 
                    $bandera = true;
                    $dataImage[$i] = $filename;
                    $i = $i + 1;
                } else {    
                    $bandera = false;
                }
                closedir($dir); //Cerramos el directorio de destino
            }
        }
       

        if($bandera == true) {

            
            if($defController->insertar($id, $titulo, $subtitulo, $detalle, $pathDestino, $dataImage)) {
                echo "true";
            } else {
                echo "false";
            }
        } else {
            echo "no se pudo guardar la informacion";
        }
    } else {
        echo "si";
    }
?>