<?php
include_once"app/Config.php";
include_once"app/Conexion.php";
include_once"app/Entrada.php";
class  RepositorioEntrada{

	public static function insertarEntrada($conexion,$entrada){
		$entradaInsertada=false;
		if(isset($conexion)){
			try{
				$sql="INSERT INTO entradas (autor_id, url,titulo,texto,fecha,activa)VALUES(:autor_id,:url,:titulo,:texto,NOW(),0)";
				//preaparamos sql
				$sentencia=$conexion->prepare($sql);
				// sentencia obtenemos el metodos respectivos de la clase Entrada 
				$sentencia->bindParam(':autor_id',$entrada->obtener_autor_id(),PDO::PARAM_STR);
				$sentencia->bindParam(':url',$entrada->obtener_url(),PDO::PARAM_STR);
				$sentencia->bindParam(':titulo',$entrada->obtener_titulo(),PDO::PARAM_STR);
				$sentencia->bindParam(':texto',$entrada->obtener_texto(),PDO::PARAM_STR);

				$entradaInsertada=$sentencia->execute();
			}catch(PDOException $ex){
				print "Error".$ex->getMessage();
			}
		}
		return $entradaInsertada;
	}
	public static function obtenerEntradasPorFechaDescendente($conexion){
		$entradas=[];
		if(isset($conexion)){
			try{
				//realizamos la consulta
				$sql="SELECT * FROM entradas  ORDER BY fecha DESC LIMIT 3";
				//preparamos
				$sentencia=$conexion->prepare($sql);
				//ejecutamos
				$sentencia->execute();
				//guardamos los datos areglos en resultado
				$resultado=$sentencia->fetchAll();
				//preguntamos si hay datos (si hay recorremos el resultado como fila)

				if(count($resultado)){
					foreach($resultado as $fila){
						//creamos un nuevo objeto de la clase entrada para
						$entradas[]=new Entrada(
							//mandamos estos datos al constructor de la clase Entrada
							$fila['id'],$fila['autor_id'],$fila['url'],$fila['titulo'],
							$fila['texto'],$fila['fecha'],$fila['activa']);
					}
				}
			}catch(PDOException $ex){
				print "Error:".$ex->getMessage();
			}
		}else{
			echo "Conexion falló";
		}
		return $entradas;
	}
	public static function obtenerEntradaPorUrl($conexion,$url){
		$entrada=null;
		if(isset($conexion)){
			try{
				$sql="SELECT * FROM entradas WHERE url LIKE :url ";
				$sentencia=$conexion->prepare($sql);
				$sentencia->bindParam(':url',$url,PDO::PARAM_STR);
				$sentencia->execute();
				$resultado=$sentencia->fetch();
				if(!empty($resultado)){
					$entrada = new Entrada(
							$resultado['id'],$resultado['autor_id'],$resultado['url'],
							$resultado['titulo'],$resultado['texto'],$resultado['fecha'],$resultado['activa']);
				}
			}catch(PDOException $ex){
				print "Error:".$ex->getMessage();
			}
		}
		return $entrada;
	}

	public static function obtenerEntradasAlAzar($conexion,$limite){
		$entradas=[];
		if(isset($conexion)){
			try{
				$sql="SELECT * FROM entradas ORDER BY RAND() LIMIT $limite";
				$sentencia=$conexion->prepare($sql);
				$sentencia->execute();
				$resultado=$sentencia->fetchAll();
				if(count($resultado)>0){
					foreach ($resultado as $fila) {
						$entradas[]=new Entrada(
							$fila['id'],$fila['autor_id'],$fila['url'],$fila['titulo'],$fila['texto'],$fila['fecha'],$fila['activa']);
					}
				}
			}catch(PDOException $ex){
				print "Error:.$ex->getMessage()";
			}
		}
		return $entradas;
	}

}
