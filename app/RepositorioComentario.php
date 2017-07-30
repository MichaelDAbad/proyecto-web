<?php
include_once"app/Config.php";
include_once"app/Conexion.php";
include_once"app/Comentario.php";
class  RepositorioComentario{

	public static function insertarComentario($conexion,$comentario){
		$comentarioInsertado=false;
		if(isset($conexion)){
			try{
				$sql="INSERT INTO comentarios (autor_id,enrada_id, titulo,texto,fecha)VALUES(:autor_id, :enrada_id, :titulo,:texto,NOW())";
				//preaparamos sql
				$sentencia=$conexion->prepare($sql);
				// sentencia obtenemos el metodos respectivos de la clase comentario 
				$sentencia->bindParam(':autor_id',$comentario->obtenerautor_id(),PDO::PARAM_STR);
				$sentencia->bindParam(':enrada_id',$comentario->obtenerentrada_id(),PDO::PARAM_STR);
				$sentencia->bindParam(':titulo',$comentario->obtenerTitulo(),PDO::PARAM_STR);
				$sentencia->bindParam(':texto',$comentario->obtenerTexto(),PDO::PARAM_STR);

				$comentarioInsertado=$sentencia->execute();
			}catch(PDOException $ex){
				print "Error".$ex->getMessage();
			}
		}
		return $comentarioInsertado;
	}
}