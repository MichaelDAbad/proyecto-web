<?php
include_once"RepositorioUsuario.php";
class ValidarRegistro{
	private $avisoInicio;
	private $avisoCierre;

	private $nombre;
	private $email;

	private $errorNombre;
	private $errorEmail;
	private $errorclave1;
	private $errorclave2;
	private $clave;

	public function __construct($nombre,$email,$clave1,$clave2,$conexion){
		$this->avisoInicio="<br><div class='alert alert-danger' role='alert'>";
		$this->avisoCierre="</div>";

		$this->nombre="";
		$this->email="";
		$this->clave="";
		$this->errorNombre=$this->validarNombre($conexion,$nombre);
		$this->errorEmail=$this->validarEmail($conexion,$email);
		$this->errorclave1=$this->validarclave1($clave1);
		$this->errorclave2=$this->validarclave2($clave1,$clave2);

		if($this->errorclave1==="" &&$this->errorclave2===""){
			$this->clave=$clave1;
		}
	}
	private function variableIniciada($variable){
		if(isset($variable) && !empty($variable)){
			return true;
		}else{
			return false;
		}

	}
	private function  validarNombre($conexion,$nombre){
		if(!$this->variableIniciada($nombre)){;
			return "Deves escribir un nombre de usuario";
		}else{
			$this->nombre=$nombre;
		}
		if(strlen($nombre)<3){
			return "El nombre debe de de ser mas de 4 caracteres";
		}
		if(strlen($nombre)>24){
			return "el nombre no debe de ser mayor de 12 carecteres";
		}
		if(RepositorioUsuario::nombreExiste($conexion, $nombre)){
			return "Este nombre de usuario ya esta en uso. por favor prueva otro nombre";
		}
		return "";

	}
	private function validarEmail($conexion,$email){
		if(!$this->variableIniciada($email  )){
			return "Debes proporcionar un email";
		}else{
			$this->email=$email;
			if(RepositorioUsuario::emailExiste($conexion, $email)){
			return "Este email ya está en uso. Por favor pruebe otro o <a href='#'>intente recuperar su contraseña</a>.";
		}
			return "";
		}
	}
	public function validarclave1($clave1){
		if(!$this->variableIniciada($clave1)){
			return "Debes ingreasar una contraseña";
		}
		return "";
	}
	public function validarclave2($clave1,$clave2){
		if(!$this->variableIniciada($clave1)){
			return "primero debes rellenar la contraseña";
		}
		if(!$this->variableIniciada($clave2)){
			return "Debes repetir  tu contraseña";
		}
		if($clave1!==$clave2){
			return "Ambas contraseñas deben coincidir";
		}
		return "";
	}
	//obtener
	public function obtenerNombre(){
		return $this->nombre;

	}
	public function obtenerEmail(){
		return $this->email;

	}
	public function obtenerClave(){
		return $this->clave;
	}
	public function obtenerErrorNombre(){
		return $this->errorNombre;
	}
	public function obtenerErrorEmail(){
		return $this->errorEmail;
	}
	public function obtenerErrorclave1(){
		return $this->errorclave1;
	}
	public function obtenerErrorclave2(){
		return $this->errorclave2;
	}

	public function mostrarNombre(){
		if($this->nombre!==""){
			echo 'value="'.$this->nombre.'"';
		}
	}
	public function mostrarErrorNombre(){
		if($this->errorNombre!==""){
			echo $this->avisoInicio.$this->errorNombre.$this->avisoCierre;
		}
	}
	public function mostrarEmail(){
		if($this->email!==""){
			echo 'value="'.$this->email.'"'; 
		}
	}
	public function mostrarErrorEmail(){
		if($this->errorEmail!==""){
			echo $this->avisoInicio.$this->errorEmail.$this->avisoCierre;
		}
	}
		public function mostrarErrorclave1(){
		if($this->errorclave1!==""){
			echo $this->avisoInicio.$this->errorclave1.$this->avisoCierre;
		}
	}
		public function mostrarErrorclave2(){
		if($this->errorclave2!==""){
			echo $this->avisoInicio.$this->errorclave2.$this->avisoCierre;
		}
	}
	public function registroValido(){
		if(	$this->errorNombre==="" && 
		   	$this->errorEmail==="" &&
			$this->errorclave1===""&&
			$this->errorclave2===""){
			return true;
		}else{
			return false;

		}
	}

}
?>