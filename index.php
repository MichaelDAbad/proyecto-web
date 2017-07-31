<?php
include_once"app/Config.php";
include_once"app/Conexion.php";

include_once"app/Usuario.php";
include_once"app/Entrada.php";
include_once"app/Comentario.php";

include_once"app/RepositorioUsuario.php";
include_once"app/RepositorioEntrada.php";
include_once"app/RepositorioComentario.php";

$componentes_url=parse_url($_SERVER['REQUEST_URI']);
$ruta=$componentes_url['path'];

$partes_ruta=explode('/',$ruta);
$partes_ruta=array_filter($partes_ruta);
$partes_ruta=array_slice($partes_ruta, 0);


$ruta_elegida='vistas/404.php';
if($partes_ruta[0]=='proyecto-web'){
	if(count($partes_ruta)==1){
		$ruta_elegida='vistas/home.php';
	}else if(count($partes_ruta)==2){
		switch($partes_ruta[1]){
			case 'login':
				$ruta_elegida='vistas/login.php';
				break;
			case 'logout':
				$ruta_elegida='vistas/logout.php';
				break;
			case 'registro':
				$ruta_elegida='vistas/registro.php';
				break;
			case 'relleno-dev':
				$ruta_elegida="vistas/scriptRelleno.php";
				break;
		}
		//KIIS -->keep it siple stupid
	}else if(count($partes_ruta)==3){
		if($partes_ruta[1]=='registroCorrecto'){
			$nombre=$partes_ruta[2];
			$ruta_elegida="vistas/registroCorrecto.php";
		}

		//url video 37
		if($partes_ruta[1]=='entrada'){
			$url=$partes_ruta[2];
			Conexion::abrirConexion();
			$entrada=RepositorioEntrada::obtenerEntradaPorUrl(Conexion::obtenerConexion(),$url);
			if($entrada!=null){
				$ruta_elegida='vistas/entrada.php';
			}
		}
	}
}
include_once $ruta_elegida;