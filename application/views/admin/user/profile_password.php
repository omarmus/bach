<div>
	<label for="">Contraseña anterior <strong>*</strong></label>
	<input type="password" name="OldPassword">
	<?php echo form_error('OldPassword'); ?>
</div>
<div>
	<label for="">Nueva contraseña <strong>*</strong></label>
	<input type="password" name="Password">
	<?php echo form_error('Password'); ?>
</div>
<div>
	<label for="">Confirmar nueva contraseña</label>
	<input type="password" name="PasswordConfirm">
	<?php echo form_error('PasswordConfirm'); ?>
</div>
<hr>
<button class="btn btn-success" type="submit">Cambiar contraseña</button>
