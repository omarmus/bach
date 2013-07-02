<?php echo form_open(); ?>
    <fieldset class="fields-form">
	    <legend><?php echo empty($user['IdUser']) ? 'Add a new user' : 'Edit user ' .$user['FirstName'] ?></legend>
	    <div>
	    	<label for="">First name:</label> 
			<input type="text" name="FirstName">
			<?php echo form_error('FirstName'); ?>
		</div>
		<div>
			<label for="">Last name:</label>
			<input type="text" name="LastName">
			<?php echo form_error('LastName'); ?>
		</div>
		<div>
			<label for="">Email:</label>
			<input type="text" name="Email">
			<?php echo form_error('Email'); ?>
		</div>
		<div>
			<label for="">Password:</label>
			<input type="password" name="Password">
			<?php echo form_error('Password'); ?>
		</div>
		<div>
			<label for="">Confirm password:</label>
			<input type="text" name="PasswordConfirm">
		</div>
		<?php echo form_error('PasswordConfirm'); ?>
	    <button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i>Save</button>
    </fieldset>
<?php echo form_close(); ?>
