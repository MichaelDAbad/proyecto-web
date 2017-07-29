<?php 

class Conexion{
	private static $conexion=null;
	public static function abrirConexion(){

		if(!isset(self::$conexion)){
			try{
				include_once"Config.php";
				self::$conexion= new PDO('mysql:host='.NOMBRE_SERVIDOR.'; dbname='.NOMBRE_BD,NOMBRE_USUARIO,NOMBRE_PASSWORD);
				self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				self::$conexion->exec("SET CHARACTER SET utf8");

			}catch(PDOExcption $ex){
				print "Error:".$ex->getMessage()."<br>";
				die();
			}
		}
	}

	public static function serrarConexion(){
		if(isset(self::$conexion)){
			self::$conexion=null;
		}
	}
	public static  function obtenerConexion(){
		return self::$conexion;
	}
}
?>