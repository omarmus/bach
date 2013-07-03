<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        <img src="<?php echo site_url('img/close.png') ?>">
    </button>
    <h3><?php echo empty($user['IdUser']) ? 'Add a new user' : 'Edit user ' .$user['FirstName'] ?></h3>
</div>
<form onsubmit="return validate(this, '<?php echo site_url('admin/user/edit') ?>')">
	<div class="modal-body">
	    <div>
	    	<label for="">First name <strong>*</strong></label> 
			<input type="text" name="FirstName" value="<?php echo set_value('FirstName') ?>">
			<?php echo form_error('FirstName'); ?>
		</div>
		<div>
			<label for="">Last name <strong>*</strong></label>
			<input type="text" name="LastName" value="<?php echo set_value('LastName') ?>">
			<?php echo form_error('LastName'); ?>
		</div>
		<div>
			<label for="">Email <strong>*</strong></label>
			<input type="text" name="Email" value="<?php echo set_value('Email') ?>">
			<?php echo form_error('Email'); ?>
		</div>
		<div>
			<label for="">Password </label>
			<input type="password" name="Password" value="<?php echo set_value('Password') ?>">
			<?php echo form_error('Password'); ?>
		</div>
		<div>
			<label for="">Confirm password </label>
			<input type="text" name="PasswordConfirm" value="<?php echo set_value('PasswordConfirm') ?>">
		</div>
	</div>
	<div class="modal-footer">
	    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
	    <button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i>Save</button>
	</div>
</form>