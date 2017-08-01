<?php
include_once"app/ControlSesion.php";
include_once"app/Redireccion.php";
include_once"app/Config.php";

ControlSesion::cerrarSesion();
Redireccion::redirigir(SERVIDOR);
?>
