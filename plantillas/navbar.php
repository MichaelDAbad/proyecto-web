<?php
Conexion::abrirConexion();
$totalUsuarios=RepositorioUsuario::obtenerNumeroUsuarios(Conexion::obtenerConexion());
Conexion::serrarConexion();
?>
<nav class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Abad-05</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="#about"><span class="glyphicon glyphicon-th-list"></span>Entrada</a></li>
            <li><a href="#contact"><span class="glyphicon glyphicon-star"></span>Favoritos</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-book"></span>Autores <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Lenguajes de programacion</a></li>
                <li><a href="#">Java</a></li>
                <li><a href="#">Python</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Frameworks</li>
                <li><a href="#">Phalcon</a></li>
                <li><a href="#">Laravel</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    <?php echo  $totalUsuarios; ?>
                </a>
            </li>
            <li><a href="#"><span class="glyphicon glyphicon-log-in"></span>Iniciar sesion</a></li>
            <li><a href="registro.php"><span class="glyphicon glyphicon-plus"></span> Registro</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>