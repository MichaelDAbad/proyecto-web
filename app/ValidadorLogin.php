<?php
include_once"RepositorioUsuario.php";

class ValidadorLogin{
	private $usuario;
	private $error;
	public function __construct($email,$clave,$conexion){
		$this->error="";
		if($this->variableIniciada($email)){//no esta completo  completar si deseas (video 26) aun no es necesario
			$this->usuario=null;
			$this->error="Debes introducir tu email y tu contraseña";
		}else{
			$this->usuario=RepositorioUsuario::obtenerUsuarioPorEmail($conexion,$email);
			if(is_null($this->usuario) or !password_verify($clave,$this->usuario->obtenerpasswor())){
				$this->error="Datos incorrectos";
			}
		}
	}
	private function variableIniciada(){
		if(isset($variable) && !empty($variable)){
			return true;
		}else{
			return false;
		}
	}
	public function obtenerUsuario(){
		return $this->usuario;
	}
	public function obtenerError(){
		return $this->error;
	}
	public function mostrarError(){
		if($this->error!==""){
			echo "<br><div class='alert alert-danger' role='alert'>";
			echo $this->error;
			echo "</div><br>";
		}

		
	}

}