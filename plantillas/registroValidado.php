	<div class="form-group">
	<label>Nombre de usuario</label>
	<input type="text" name="nombre" class="form-control"<?php $validador->mostrarNombre();?>>
	<?php 
		$validador->mostrarErrorNombre();
	?>
	</div>
	<div class="form-group">
	<label>Email</label>
	<input type="email" name="email" class="form-control" <?php $validador->mostrarEmail();?>>
	<?php 
		$validador->mostrarErrorEmail();
	?>
	</div>
	<div class="form-group">
	<label>Contraseña</label>
	<input type="text" name="clave" class="form-control">
	<?php 
		$validador->mostrarErrorClave1();
	?>
	</div>
	<div class="form-group">
	<label>Repita la contraseña</label>
	<input type="text" name="clave2" class="form-control" >
	<?php 
		$validador->mostrarErrorClave2();
	?>
	</div>
	<button type="submit" class="btn btn-primary btn-lg btn-block" name="enviar"> Enviar datos</button>