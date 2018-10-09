<?php
    class imagenesServicios {
    	public $id;
    	public $nombreImagen;
    	public $path;
    	public $idDef;

    	function get_() {
         	return $this -> id;
        }

		function set_id(){
		 	$this->id = $id;
		}

		function get_nombreImagen() {
         	return $this -> nombreImagen;
        }

		function set_nombreImagen(){
		 	$this->nombreImagen = $nombreImagen;
		}

		function get_path() {
         	return $this -> path;
        }

		function set_path(){
		 	$this->path = $path;
		}

		function get_idDef() {
         	return $this -> idDef;
        }

		function set_idDef(){
		 	$this->idDef = $idDef;
		}

    }