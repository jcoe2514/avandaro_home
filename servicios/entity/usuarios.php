<?php
    class usuarios {
    	 public $id;
         public $nombre;
         public $usuario;
         public $password;

          function get_id() {
         	return $this -> id;
         }

         function set_id(){
         	$this->id = $id;
         }

         function get_nombre() {
         	return $this -> nombre;
         }

         function set_nombre(){
         	$this->nombre = $nombre;
         }

         function get_usuario() {
         	return $this -> usuario;
         }

         function set_usuario(){
         	$this->usuario = $usuario;
         }

          function get_password() {
         	return $this -> password;
         }

         function set_password(){
         	$this->password = $password;
         }

    }
?>