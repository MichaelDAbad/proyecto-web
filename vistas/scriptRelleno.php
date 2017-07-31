<?php
include_once"app/Config.php";
include_once"app/Conexion.php";

include_once"app/Usuario.php";
include_once"app/Entrada.php";
include_once"app/Comentario.php";

include_once"app/RepositorioUsuario.php";
include_once"app/RepositorioEntrada.php";
include_once"app/RepositorioComentario.php";

Conexion::abrirConexion();
for($usuarios=0;$usuarios<100;$usuarios++){
	$nombre=sa(10);
	$email=sa(5).'@.'.sa(3);
	$password=password_hash('123456',PASSWORD_DEFAULT);
	$usuario=new Usuario('',$nombre,$email,$password,'','');
	RepositorioUsuario::insertarUsuario(Conexion::obtenerConexion(),$usuario);
}
for($entradas=0;$entradas<100;$entradas++){
	$titulo=sa(10);
	$url=$titulo;
	$texto=lorem();
	$autor=rand(1,100);

	$entrada=new Entrada('',$autor,$url,$titulo,$texto,'','');
	RepositorioEntrada::insertarEntrada(Conexion::obtenerConexion(),$entrada);
}

for($comentarios=0;$comentarios<100;$comentarios++){
	$titulo=sa(10);
	$texto=lorem();
	$autor=rand(1,100);
	$entrada=rand(1,100);

	$comentario=new Comentario('',$autor,$entrada,$titulo,$texto,'');
	RepositorioComentario::insertarComentario(Conexion::obtenerConexion(),$comentario);
}


function sa($longitud){
	$caracteres="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$numCarecteres=strlen($caracteres);
	$strignAleatorio="";
	for($i=0;$i<$longitud; $i++){
		$strignAleatorio.=$caracteres[rand(0,$numCarecteres-1)];
	}
	return $strignAleatorio;
}

function lorem(){
	$lorem="

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas eget ipsum volutpat, tincidunt enim sit amet, feugiat lorem. Sed efficitur, orci vel sodales fermentum, dui nisl fermentum massa, congue consequat ex nisl id metus. Vestibulum quis nulla convallis, pharetra nibh eu, vulputate turpis. Nunc mattis euismod arcu. Praesent dictum interdum felis, eget imperdiet risus ultrices ac. Integer at ultrices dui. Vestibulum dapibus leo eu vestibulum lacinia. Donec posuere odio ac odio sodales, id consequat ante accumsan. Proin ac arcu dolor. Aenean id justo tristique, convallis enim feugiat, porttitor neque. Mauris vel tristique augue, vitae rutrum quam. Donec malesuada sem dolor, eget gravida nulla ullamcorper sed. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis malesuada leo turpis. Donec maximus rutrum justo ac euismod. Morbi interdum aliquet ligula eu tristique.

In non felis quis lacus finibus vestibulum eu a enim. Ut vehicula turpis bibendum ante semper cursus eu non turpis. In in eros ac quam consectetur tincidunt. Quisque vehicula, tellus in varius lobortis, felis quam ultrices magna, at volutpat ante enim ac diam. Donec vel posuere urna, nec viverra diam. Etiam eu fermentum tellus, eu semper arcu. Integer maximus nulla et est pretium ullamcorper. Fusce sed magna venenatis, imperdiet purus a, sollicitudin purus. Sed eget elit eu ante tincidunt venenatis. Sed blandit feugiat ullamcorper. Donec lobortis iaculis orci tincidunt convallis. Quisque sed dolor ullamcorper, aliquam elit quis, ultrices mauris.";
return $lorem;
}