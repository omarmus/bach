<h2><?php echo empty($user['IdUser']) ? 'Add a new user' : 'Edit user ' .$user['FirstName'] ?></h2>
<?php echo form_open(); ?>
	<div class="input-append">
		<input type="text" name="email" placeholder="Email">
		<span class="add-on"><i class="icon-user"></i></span>
	</div>
	<?php echo form_error('email'); ?>
	<div class="input-append">
		<input type="password" name="password" placeholder="Password">
		<span class="add-on"><i class="icon-lock"></i></span>
	</div>
	<?php echo form_error('password'); ?>

	<?php echo form_submit('submit', 'Log in', 'class="btn btn-large btn-primary"'); ?>
<?php echo form_close(); ?>
