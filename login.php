<?php
include_once"app/Config.php";
include_once"app/Conexion.php";
include_once"app/RepositorioUsuario.php";
$titulo="login";

include_once"plantillas/cabecera.php";
include_once"plantillas/navbar.php";
?>
<div class="container">
	<div class="row">
		<div class="col-md-3">
		</div>
		<div class="col-lg-6">
			<div class="panel-default">
				<div class="panel-heading text-center">
					<h3>Iniciar sesion</h3>
				</div>
				<div class="panel-body">
					<form role="form" method="post" action="">
						<h2>Introduce tus datos</h2>
						<br>
						<label for="email" class="sr-only">Email</label>
						<input type="email" name="email" id="email" class="form-control" placeholder="email">
						<br>
						<label for="clave" class="sr-only">Contraseña</label>
						<input type="password" name="clave" id="clave" class="form-control" placeholder="Contraseña">
						<br>
						<button type="submit" name="login" class="btn btn-lg btn-primary btn-block">Ingresar</button>
					</form>
					<br>
					<br>
					<div class="text-center">
						<a href="" class="">¿Olvidaste tu contraseña?</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include_once"plantillas/pie.php";?>