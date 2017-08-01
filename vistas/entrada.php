<?php
include_once"app/Config.php";
include_once"app/Conexion.php";

include_once"app/Usuario.php";
include_once"app/Entrada.php";
include_once"app/Comentario.php";

include_once"app/RepositorioUsuario.php";
include_once"app/RepositorioEntrada.php";
include_once"app/RepositorioComentario.php";

$titulo=$entrada->obtener_titulo();;

include_once"plantillas/cabecera.php";
include_once"plantillas/navbar.php";

?>
<div class="container contenido-articulo">
	<div class="row">
		<div class="col-md-12">
			<h1>
				<?php echo $entrada->obtener_titulo();?>
			</h1>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-12">
			<p>
				por
				<a href="#">
					<span class="glyphicon glyphicon-user" aria-hidden="true"></span><?php echo  $autor->obtenerNombre(); ?>
				</a>
				el
				<?php  echo $entrada->obtener_fecha(); ?>
			</p>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-12">
			<article class="text-justify">
				<?php echo nl2br($entrada->obtener_texto());?>
			</article>
		</div>
	</div>
	<?php
	include_once"plantillas/entradasAlAzar.php";?>
	<br>
	<?php
	if(count($comentarios)){
		include_once"plantillas/comentariosEntrada.php";
	}else{
		echo "<p>¡Todavia no hay comentarios</p>";
	}
	?>
</div>

<!-- pie de la pagina-->
<?php
include_once"plantillas/pie.php";
?>