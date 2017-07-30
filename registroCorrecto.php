<?php
include_once"app/Config.php";
include_once"app/Conexion.php";
include_once"app/RepositorioUsuario.php";
include_once"app/Redireccion.php";

if(isset($_GET["nombre"])&& !empty($_GET["nombre"])){
	$nombre = $_GET["nombre"];
	}else{
		Redireccion::redirigir(SERVIDOR);
	}
$titulo="Registro Correcto";
include_once"plantillas/cabecera.php";
include_once"plantillas/navbar.php";
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel panel-heading">
					<span class="glyphicon glyphicon-ok-circle" aria-hidden="true">Registro correcto</span>
					<div class="panel-body text-center">
						<p>¡Gracias por registrarte <b><?php echo $nombre;?></b>!</p>
						<br>
						<p><a href="<?php echo RUTA_LOGIN ?>">inicia sesion</a>para usar tu cuenta.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>