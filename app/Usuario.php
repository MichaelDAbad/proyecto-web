<?php
class Usuario{
	private $id;
	private $nombre;
	private $email;
	private $passwor;
	private $fecha_registro;
	private $estado;

	public function __construct($id,$nombre,$email,$passwor,$fecha_registro,$estado){
		$this->id=$id;
		$this->nombre=$nombre;
		$this->email=$email;
		$this->passwor=$passwor;
		$this->fecha_registro=$fecha_registro;
		$this->estado=$estado;
	}
	public function obtenerId(){
		return $this->id;
	}
	public function obtenerNombre(){
		return $this->nombre;
	}
	public function obtenerEmail(){
		return $this->email;
	}
	public function obtenerpasswor(){
		return $this->passwor;
	}
	public function obtenerFecha_registro(){
		return $this->fecha_registro;
	}
	public function obtenerEstado(){
		return $this->estado;
	}
	//para cambiar 
	public function cambiarNombre($nombre){
		$this->nombre=$nombre;
	}
	public function cambiarEmail($email){
		$this->email=$email;
	}
	public function cambiarpasswor($passwor){
		$this->passwor=$passwor;
	}
	public function cambiarEstado($estado){
		$this->estado=$estado;
	}


}
?>