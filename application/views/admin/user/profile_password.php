<div class="control-group">
	<label class="control-label">Contraseña anterior</label>
	<div class="controls">
		<div class="input-icon left">                                          
			<input type="password" name="old_password" class="m-wrap medium">
		</div>
		<?php echo form_error('old_password'); ?>		
	</div>
</div>
<div class="control-group">
	<label class="control-label">Nueva contraseña</label>
	<div class="controls">
		<div class="input-icon left">                                          
			<input type="password" name="password_usr" class="m-wrap medium">
		</div>
		<?php echo form_error('password_usr'); ?>		
	</div>
</div>
<div class="control-group">
	<label class="control-label">Confirmar nueva contraseña</label>
	<div class="controls">
		<div class="input-icon left">                                          
			<input type="password" name="rpassword" id="rpassword" class="m-wrap medium">
		</div>
		<?php echo form_error('rpassword'); ?>		
	</div>
</div>
<hr class="line-form">
<button class="btn btn-success" type="submit">Cambiar contraseña</button>
