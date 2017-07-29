<?php
include_once"app/Conexion.php";
include_once"app/RepositorioUsuario.php";

$titulo="Abad-05";//nombre del titulo de la pagina web

include_once"plantillas/cabecera.php";
include_once"plantillas/navbar.php";
?>
    <!--  filas responsi-->
    <div class="container">
    	<div class="jumbotron">
    		<h1>Blog de Michael</h1>
    		<p>Blog dedicado a la programacion y desarrolo</p>
    	</div>
    </div>

    <div class="container">
    	<div class="row">
    		<div class="col-md-4">
    			<div class="row">
    				<div class="col-md-12">
    					<div class="panel panel-default">
    						<div class="panel-heading">
    							<span class="glyphicon glyphicon-search" aria-hidden="true"></span> Busqueda
    						</div>
    						<div class="panel-body">
    							<div class="form-group">
    								<input type="text" class="form-control" placeholder="¿Que buscas?" name="">
    							</div>
    							<button class="form-control">Buscar</button>
    						</div>
    					</div>
    				</div>
    			</div>
    			<div class="row">
    				<div class="col-md-12">
    					<div class="panel panel-default">
    						<div class="panel-heading">
    							<span class="glyphicon glyphicon-filter" aria-hidden="true"></span>Filtro
    						</div>
    						<div class="panel-body">
    							
    						</div>
    					</div>
    				</div>
    			</div>
    			<div class="row">
    				<div class="col-md-12">
    					<div class="panel panel-default">
    						<div class="panel-heading">
    							<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>Archivo
    						</div>
    						<div class="panel-body">
    							
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    		<div class="col-md-8">
    			<div class="panel panel-default">
    				<div class="panel-heading">
    					<span class="glyphicon glyphicon-time" aria-hidden="true"></span>Ultimas entradas
    				</div>
    				<div class="panel-body">
    					<P>Todavia  no hay entradas que mostrar</P>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
<?php include_once"plantillas/pie.php";?>