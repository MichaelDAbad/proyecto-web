<?php
include_once"app/Config.php";
include_once"app/Conexion.php";
include_once"app/Comentario.php";
class  RepositorioComentario{

	public static function insertarComentario($conexion,$comentario){
		$comentarioInsertado=false;
		if(isset($conexion)){
			try{
				$sql="INSERT INTO comentarios (autor_id,entrada_id, titulo , texto, fecha)VALUES(:autor_id, :entrada_id, :titulo,:texto,NOW())";
				//preaparamos sql
				$sentencia=$conexion->prepare($sql);
				// sentencia obtenemos el metodos respectivos de la clase comentario 
				$sentencia->bindParam(':autor_id',$comentario->obtener_autor_id(),PDO::PARAM_STR);
				$sentencia->bindParam(':entrada_id',$comentario->obtener_entrada_id(),PDO::PARAM_STR);
				$sentencia->bindParam(':titulo',$comentario->obtener_titulo(),PDO::PARAM_STR);
				$sentencia->bindParam(':texto',$comentario->obtener_texto(),PDO::PARAM_STR);

				$comentarioInsertado=$sentencia->execute();
			}catch(PDOException $ex){
				print "Error".$ex->getMessage();
			}
		}

		return $comentarioInsertado;
	}

	public static function obtenerComentarios($conexion,$entrada_id){
		$comentarios=array();
		if(isset($conexion)){
			try{
				include_once"app/Comentario.php";
				$sql="SELECT * FROM comentarios WHERE entrada_id=:entrada_id";
				$sentencia=$conexion->prepare($sql);
				$sentencia->bindParam(':entrada_id',$entrada_id,PDO::PARAM_STR);
				$sentencia->execute();
				$resultado=$sentencia->fetchAll();
				if(count($resultado)){
					foreach($resultado as $fila){
						$comentarios[]= new Comentario($fila['id'],$fila['autor_id'],$fila['entrada_id'],$fila['titulo'],$fila['texto'],$fila['fecha']);
					}
				}
			}catch(PDOException $ex){
				print"Error...".$ex->getMessage();
			}
		}
		return $comentarios;
	} 
}