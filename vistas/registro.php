<?php
include_once"app/Conexion.php";
include_once"app/Usuario.php";
include_once"app/RepositorioUsuario.php";
include_once"app/ValidarRegistro.php";
include_once"app/Redireccion.php";
if(isset($_POST["enviar"])){
	Conexion::abrirConexion();
	$validador=new ValidarRegistro($_POST["nombre"],$_POST["email"],$_POST["clave"],$_POST["clave2"],Conexion::obtenerConexion());

	if($validador->registroValido()){
		$usuario=new Usuario('',$validador->obtenerNombre(),$validador->obtenerEmail()
			,password_hash($validador->obtenerClave(),PASSWORD_DEFAULT),'','');
		$usuarioInsertado=RepositorioUsuario::insertarUsuario(Conexion::obtenerConexion(),$usuario);
	
	if($usuarioInsertado){
		//rederigui al registro correcto
		Redireccion::redirigir(RUTA_REGISTRO_CORRECTO.'/'.$usuario->obtenerNombre());
	}
}
	Conexion::serrarConexion();
}
$titulo="Registro";//nombre del titulo de la pagina web
include_once"plantillas/cabecera.php";
include_once"plantillas/navbar.php";
?>
<div class="container">
	<div class="jumbotron">
		<h1 class="text-center">Formulario de registro</h1>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-6 text-center">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						Instrucciones
					</h3>
				</div>
				<div class="panel-body">
					<br>
					<p class="text-justify">
						Para Unirse al blog de csociety.. introdusca su nombre de usuario, email y contraseña. El email que escriba debe ser real ya que lo necesitará para gestionar su cuenta. Si necesita apoyo con su cuenta dale ckick a los siguientes enlaces
					</p>
					<br>
					<a href="#">¿Ya tienes cuenta?</a>
					<br>
					<br>
					<a href="#">¿Olvidaste tu contraseña?</a>
					<br>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						Introdusca sus datos
					</h3>
				</div>
				<div class="panel-body">
						<form role="form" method="post" action="<?php echo RUTA_REGISTRO ?>" >
							<?php
								if(isset($_POST["enviar"])){
									include_once"plantillas/registroValidado.php";
								}else{
									include_once"plantillas/registroVacio.php";
								}
							?>
						</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include_once"plantillas/pie.php";?>