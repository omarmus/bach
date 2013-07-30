<div>
	<label for="">Firstname <strong>*</strong></label>
	<input type="text" name="FirstName" value="<?php echo set_value('FirstName', $user['FirstName']) ?>">
	<?php echo form_error('FirstName'); ?>	
</div>
<div>
	<label for="">Lastname <strong>*</strong></label>
	<input type="text" name="LastName" value="<?php echo set_value('LastName', $user['LastName']) ?>">
	<?php echo form_error('LastName'); ?>
</div>
<div>
	<label for="">Email <strong>*</strong></label>
	<input type="text" name="Email" value="<?php echo set_value('Email', $user['Email']) ?>">
	<?php echo form_error('Email'); ?>
</div>
<div>
	<label for="">Phone</label>
	<input type="text" name="Phone" value="<?php echo set_value('Phone', $user['Phone']) ?>">
	<?php echo form_error('Phone'); ?>
</div>
<hr>
<button class="btn btn-success" type="submit">Actualizar mis datos</button>
