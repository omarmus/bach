<?php $new = ! isset($user['IdUser']); ?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title"><?php echo $new ? 'Add a new user' : 'Edit user ' .$user['FirstName'] ?></h4>
</div>
<form onsubmit="return validate(this, '<?php echo site_url('admin/user/edit'. ( $new ? '' : '/'.$user['IdUser'])) ?>')">
	<div class="modal-body">
		<div class="form-group">
			<label for="">Username</label>
			<?php echo form_input('Username', set_value('Username', $user['Username']), 'class="form-control"'); ?>
			<?php echo form_error('Username'); ?>
		</div>
		<div class="form-group">
			<label for="">Email <strong>*</strong></label>
			<?php echo form_input('Email', set_value('Email', $user['Email']), 'class="form-control"'); ?>
			<?php echo form_error('Email'); ?>
		</div>
	    <div class="form-group">
	    	<label for="">First name <strong>*</strong></label> 
			<?php echo form_input('FirstName', set_value('FirstName', $user['FirstName']), 'class="form-control"'); ?>
			<?php echo form_error('FirstName'); ?>
		</div>
		<div class="form-group">
			<label for="">Last name <strong>*</strong></label>
			<?php echo form_input('LastName', set_value('LastName', $user['LastName']), 'class="form-control"'); ?>
			<?php echo form_error('LastName'); ?>
		</div>
		<?php if ( $new ) : ?>
		<div class="form-group" style="width: 100%;">
			<label class="checkbox-inline">
				<input type="checkbox" name="Visible" onclick="toggle_password(this)" value="YES"> Generar contraseña automáticamente
			</label>
		</div>
		<div class="form-group password">
			<label for="">Password <strong>*</strong></label>
			<?php echo form_password('Password', '', 'class="form-control"'); ?>
			<?php echo form_error('Password'); ?>
		</div>
		<div class="form-group password">
			<label for="">Confirm password </label>
			<?php echo form_password('PasswordConfirm', '', 'class="form-control"'); ?>
			<?php echo form_error('PasswordConfirm'); ?>
		</div>
		<?php else : ?>
		<div class="form-group">
			<label for="">State</label>
			<?php echo form_dropdown('State', get_states_user(), set_value('State', $user['State']), 'class="form-control"'); ?>
			<?php echo form_error('State'); ?>
		</div>
		<?php endif ?>
		<div class="form-group">
			<label for="">Rol</label>
			<?php echo form_dropdown('IdRol', $roles, set_value('IdRol', $user['IdRol']), 'class="form-control"'); ?>
			<?php echo form_error('IdRol'); ?>
		</div>
	</div>
	<div class="modal-footer">
	    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Save</button>
	</div>
</form>