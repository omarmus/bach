<div class="form-login">
	<?php echo form_open(); ?>
		<?php $error = $this->session->flashdata('error'); ?>
		<?php if ($error): ?>
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php echo $error ?>
		</div>	
		<?php endif ?>
		<?php $success = $this->session->flashdata('success'); ?>
		<?php if ($success): ?>
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
		<?php echo $success ?></div>	
		<?php endif ?>

		<h3 class="form-signin-heading">Please sign in</h3>

		<div class="input-group">
			<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
			<input type="text" name="email" class="form-control" placeholder="Email address" autofocus>
		</div>
		<?php echo form_error('email'); ?>

		<div class="input-group">
			<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
			<input type="password" name="password" class="form-control" placeholder="Password">
		</div>
		<?php echo form_error('password'); ?>

		<label class="checkbox">
			<input type="checkbox" value="remember-me"> Remember me
		</label>
		<label><a href="">¿Sé olvidó su contraseña?</a></label>
		<button class="btn btn-primary btn-block btn-lg" type="submit">Sign in</button>
	<?php echo form_close(); ?>
</div>