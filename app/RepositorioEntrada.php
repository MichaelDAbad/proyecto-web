<?php
include_once"app/Config.php";
include_once"app/Conexion.php";
include_once"app/Entrada.php";
class  RepositorioEntrada{

	public static function insertarEntrada($conexion,$entrada){
		$entradaInsertada=false;
		if(isset($conexion)){
			try{
				$sql="INSERT INTO entradas (autor_id,titulo,texto,fecha,activa)VALUES(:autor_id,:titulo,:texto,NOW(),0)";
				//preaparamos sql
				$sentencia=$conexion->prepare($sql);
				// sentencia obtenemos el metodos respectivos de la clase Entrada 
				$sentencia->bindParam(':autor_id',$entrada->obtenerAutorId(),PDO::PARAM_STR);
				$sentencia->bindParam(':titulo',$entrada->obtenerTitulo(),PDO::PARAM_STR);
				$sentencia->bindParam(':texto',$entrada->obtenerTexto(),PDO::PARAM_STR);

				$entradaInsertada=$sentencia->execute();
			}catch(PDOException $ex){
				print "Error".$ex->getMessage();
			}
		}
		return $entradaInsertada;
	}
}
