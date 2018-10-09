<?php
    class definicionServicios {
    	public $id;
    	public $titulo;
    	public $subtitulo;
    	public $detalle;
    	public $idTipo;

    	function get_id() {
         	return $this -> id;
         }

		function set_id(){
		 	$this->id = $id;
		}

		function get_titulo() {
         	return $this -> titulo;
        }

		function set_titulo(){
		 	$this->titulo = $titulo;
		}

		function get_subtitulo() {
         	return $this -> subtitulo;
        }

		function set_subtitulo(){
		 	$this->subtitulo = $subtitulo;
		}

		function get_detalle() {
         	return $this -> detalle;
        }

		function set_detalle(){
		 	$this->detalle = $detalle;
		}

		function get_idTipo() {
         	return $this -> idTipo;
         }

		function set_idTipo(){
		 	$this->idTipo = $idTipo;
		}

    }