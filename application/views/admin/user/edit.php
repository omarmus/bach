<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        <img src="<?php echo site_url('img/close2.png') ?>">
    </button>
    <h3><?php echo empty($user['IdUser']) ? 'Add a new user' : 'Edit user ' .$user['FirstName'] ?></h3>
</div>
<form onsubmit="return validate(this, '<?php echo site_url('admin/user/edit'. (isset($user['IdUser'])?'/'.$user['IdUser']:'')) ?>')">
	<div class="modal-body">
	    <div>
	    	<label for="">First name <strong>*</strong></label> 
			<?php echo form_input('FirstName', set_value('FirstName', $user['FirstName'])); ?>
			<?php echo form_error('FirstName'); ?>
		</div>
		<div>
			<label for="">Last name <strong>*</strong></label>
			<?php echo form_input('LastName', set_value('LastName', $user['LastName'])); ?>
			<?php echo form_error('LastName'); ?>
		</div>
		<div>
			<label for="">Email <strong>*</strong></label>
			<?php echo form_input('Email', set_value('Email', $user['Email'])); ?>
			<?php echo form_error('Email'); ?>
		</div>
		<div>
			<label for="">Rol</label>
			<?php echo form_dropdown('idRol', $roles, set_value('idRol', $user['idRol'])); ?>
			<?php echo form_error('idRol'); ?>
		</div>
		<?php if (!isset($user['IdUser'])) : ?>
		<div>
			<label for="">Password </label>
			<?php echo form_password('Password'); ?>
			<?php echo form_error('Password'); ?>
		</div>
		<div>
			<label for="">Confirm password </label>
			<?php echo form_password('PasswordConfirm'); ?>
			<?php echo form_error('PasswordConfirm'); ?>
		</div>	
		<?php endif ?>
	</div>
	<div class="modal-footer">
	    <button type="button" class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
	    <button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i>Save</button>
	</div>
</form>