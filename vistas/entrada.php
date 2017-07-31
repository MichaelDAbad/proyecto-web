<?php
include_once"app/Config.php";
include_once"app/Conexion.php";

include_once"app/Usuario.php";
include_once"app/Entrada.php";
include_once"app/Comentario.php";

include_once"app/RepositorioUsuario.php";
include_once"app/RepositorioEntrada.php";
include_once"app/RepositorioComentario.php";

echo $entrada->obtener_titulo();
echo "<br>";
echo $entrada->obtener_texto();