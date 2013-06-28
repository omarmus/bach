<h1><a href="" class="brand">Bach PHP</a></h1>
<div class="form-login">
	<?php $error = $this->session->flashdata('error'); ?>
	<?php if ($error): ?>
	<div class="msg msg-alert"><?php echo $error ?></div>	
	<?php endif ?>
	<?php $success = $this->session->flashdata('success'); ?>
	<?php if ($success): ?>
	<div class="msg msg-success"><?php echo $success ?></div>	
	<?php endif ?>
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
		<div class="options">
			<!-- <label class="checkbox">
				<input type="checkbox" value="remember-me"> Remember me
			</label> -->
			<label><a href="">¿Sé olvidó su contraseña?</a></label>
		</div>
		<?php echo form_submit('submit', 'Log in', 'class="btn btn-large btn-primary"'); ?>
	<?php echo form_close(); ?>
</div>