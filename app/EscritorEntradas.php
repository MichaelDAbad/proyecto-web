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
						<?php
						echo nl2br($entrada->obtener_texto());
						?>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}
