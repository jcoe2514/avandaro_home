<?php
   
   $fileSystem1 = strtolower(str_replace(" ", "_", "Casas en Renta"));
   $fileSystem2 = strtolower(str_replace(" ", "_", "Fontana Pura"));
   echo $fileSystem2;
   $carpeta1 = "../img/".$fileSystem1;
   $carpeta2 = $carpeta1."/".$fileSystem2;
   echo file_exists($carpeta1);
   if (!file_exists($carpeta1)) {
       
        mkdir($carpeta1, 0777, true);
        echo "entra a crear la primera carpeta";
   }

   if (!file_exists($carpeta2)) {
        mkdir($carpeta2, 0777, true);
   }

?>