<?php
include_once"app/Conexion.php";
include_once"app/RepositorioEntrada.php";
include_once"app/Entrada.php";

class EscritorEntradas{
	public static function escribirEntradas(){
		$entradas=RepositorioEntrada::obtenerEntradasPorFechaDescendente(Conexion::obtenerConexion());
		if(count($entradas)){
			foreach($entradas as $entrada){
				self::escribirEntrada($entrada);
			}
		}
	}
	public static function escribirEntrada($entrada){
		if(!isset($entrada)){
			return ;
		}
		?>
		<div class="row">
			<div class="col-md-12">
				<div class="panel-default">
					<div class="panel-heading">
						<?php echo $entrada->obtener_titulo(); ?>
					</div>
					<div class="panel-body">
						<p>
							<strong>
								<?php
								echo $entrada->obtener_fecha();
								?>
							</strong>
						</p>
						<div class="text-justify">
						<?php
						echo nl2br(self::resumirTexto($entrada->obtener_texto()));
						?>
						</div>
						<br>
						<div class="text-center">
							<a class="btn btn-primary" href="<?php echo RUTA_ENTRADA.'/'.$entrada->obtener_url() ?>" role='button'>Seguir leyendo...</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}

	//funcion que permite resumir texto y lo mostramos llamando al meto 
	//demo en nl2br nl2br($entrada->obtener_texto());echo nl2br(self::resumirTexto($entrada->obtener_texto()));
	public static function resumirTexto($texto){
		$longitudMaxima=400;
		$resultado="";
		if(strlen($texto)>=$longitudMaxima){
			$resultado=substr($texto,0, $longitudMaxima);
			$resultado.="...";
		}else{
			$resultado=$texto;
		}
		return $resultado;
	}


}


