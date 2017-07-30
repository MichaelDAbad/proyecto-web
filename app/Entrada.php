<?php
class Entrada{
	private $id;
	private $autorId;
	private $titulo;
	private $texto;
	private $fecha;
	private $activa;

	public function __construct($id,$autorId,$titulo,$texto,$fecha,$activa){
		$this->id=$id;
		$this->autorId=$autorId;
		$this->titulo=$titulo;
		$this->texto=$texto;
		$this->fecha=$fecha;
		$this->activa=$activa;
	}
	// se llaman geters
	public function obtenerId(){
		return $this->id;
	}
	public function obtenerAutorId(){
		return $this->autorId;
	}
	public function obtenerTitulo(){
		return $this->titulo;
	}
	public function obtenerTexto(){
		return $this->texto;
	}
	public function obtenerFecha(){
		return $this->fecha;
	}
	public function estaActiva(){
		return $this->activa;
	}
	// se llaman seters
	public function cambiarTitulo($titulo){
		$this->titulo=$titulo;
	}
	public function cambiarTexto($texto){
		$this->texto=$texto;
	}
	public function cambiarActiva($activa){
		$this->activa=$activa;
	}

}