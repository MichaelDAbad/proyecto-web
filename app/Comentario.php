<?php
class Comentario{
	private $id;
	private $autor_id;
	private $entrada_id;
	private $titulo;
	private $texto;
	private $fecha;

	public function __construct($id,$autor_id,$entrada_id,$titulo,$texto,$fecha){
		$this->id=$id;
		$this->autor_id=$autor_id;
		$this->entrada_id=$entrada_id;
		$this->titulo=$titulo;
		$this->texto=$texto;
		$this->fecha=$fecha;
	}
	//geters
	public function obtener_id(){
		return $this->id=$id;
	}
	public function obtener_autor_id(){
		return $this->autor_id=$autor_id;
	}
	public function obtener_entrada_id(){
		return $this->entrada_id=$entrada_id;
	}
	public function obtener_itulo(){
		return $this->titulo=$titulo;
	}
	public function obtener_exto(){
		return $this->texto=$texto;
	}
	public function obtenerFecha(){
		return $this->fecha=$fecha;
	}

	//seters
	public function cambiarTitulo($titulo){
		$this->titulo=$titulo;
	}
	public function cambiarTexto($texto){
		$this->texto=$texto;
	}

}