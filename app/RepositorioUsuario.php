<?php
class RepositorioUsuario{
	public static function obtener_tabla($conexion){
		$usuarios=array();
		if(isset($conexion)){
			try{
				include_once"Usuario.php";
				$sql="SELECT * FROM usuarios";
				$cmd=$conexion->prepare($sql);
				$cmd->execute();
				$resultado=$cmd->fetchAll();
				if(count($resultado)){
					foreach($resultado as $fila){
						$usuarios[]=new  Usuario($fila['id'],$fila['nombre'],$fila['email'],$fila['passwor'],$fila['fecha_registro'],$fila['activo']);
					}
				}else{
					echo "No hay datos";
				}
			}catch(PDOException $ex){
				echo "Error:".$ex->getMessage();
			}
		}
		return $usuarios;
	}
	public static function obtenerNumeroUsuarios($conexion){
		$totalUsuarios=null;
		if(isset($conexion)){
			try{
				$sql="SELECT COUNT(*)  as total FROM usuarios";
				$sentencia=$conexion ->prepare($sql);
				$sentencia->execute();
				$resultado=$sentencia->fetch();
				$totalUsuarios=$resultado['total'];
			}catch(PDOException $ex){
				echo "Error:".$ex->getMessage();
			}
		}
		return $totalUsuarios;
	}
	public static function insertarUsuario($conexion,$usuario){
		$usuarioInsertado=false;
		if(isset($conexion)){
			try{
				$sql="INSERT INTO usuarios(nombre, email,passwor,fecha_registro,activo) VALUES(:nombre,:email,:passwor,NOW(),0)";
				$sentencia=$conexion->prepare($sql);
				$sentencia->bindParam(':nombre',$usuario->obtenerNombre(),PDO::PARAM_STR);
				$sentencia->bindParam(':email',$usuario->obtenerEmail(),PDO::PARAM_STR);
				$sentencia->bindParam(':passwor',$usuario->obtenerPasswor(),PDO::PARAM_STR);
				$usuarioInsertado=$sentencia->execute();

			}catch(PDOException $ex){
				echo "ERRORR".$ex->getMessge();
			}
		}
		return $usuarioInsertado;
	}


}
?>