<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php 
	if (!isset($titulo)){
		$titulo="Bienvenido";
	}
	echo "<title>$titulo</title>";

	?>
	
</head>
<!-- estamos utilizando CDN por que lo que descargamos no funciona muy bien los gripicons -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo SERVIDOR ?>/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo SERVIDOR?>/css/estilos.css">
<body>