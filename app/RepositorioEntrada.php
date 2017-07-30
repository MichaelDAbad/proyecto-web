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
				$sentencia->bindParam(':autor_id',$entrada->obtener_autor_id(),PDO::PARAM_STR);
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
					echo "conexion ok<br>";
				//realizamos la consulta
				$sql="SELECT * FROM entradas  ORDER BY fecha DESC";
				//preparamos
				$sentencia=$conexion->prepare($sql);
				//ejecutamos
				$sentencia->execute();
				//guardamos los datos areglos en resultado
				$resultado=$sentencia->fetchAll();
				//preguntamos si hay datos (si hay recorremos el resultaodo como fila)

				if(count($resultado)){
					foreach($resultado as $fila){
						//creamos un nuevo objeto de la clase entrada para
						$entradas[]=new Entrada(
							//mandamos estos datos al constructor de la clase Entrada
							$fila['id'],$fila['autor_id'],$fila['titulo'],
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

}
