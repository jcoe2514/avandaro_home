<?php
    class menuServicios {
    	public $id;
    	public $nombre;
    	public $icon;
    	public $url;
    	public $status;

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

		 function get_icon() {
         	return $this -> icon;
         }

		 function set_icon(){
		 	$this->icon = $icon;
		 }

		 function get_url() {
         	return $this -> url;
         }

		 function set_url(){
		 	$this->url = $url;
		 }

		 function get_status() {
         	return $this -> status;
         }

		 function set_status(){
		 	$this->status = $status;
		 }
    }
 ?>