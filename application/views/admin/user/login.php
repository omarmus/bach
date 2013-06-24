<h1><a href="" class="brand">Bach PHP</a></h1>
<div class="form-signin">
	<?php echo form_open(); ?>
		<div class="input-append">
			<input type="text" placeholder="Email">
			<span class="add-on"><i class="icon-user"></i></span>
		</div>
		<div class="input-append">
			<input type="text" placeholder="Password">
			<span class="add-on"><i class="icon-lock"></i></span>
		</div>
		<div class="options">
			<label class="checkbox">
				<input type="checkbox" value="remember-me"> Remember me
			</label>
			<label><a href="">¿Sé olvidó su contraseña?</a></label>
		</div>
		<?php echo form_submit('submit', 'Log in', 'class="btn btn-large btn-primary"'); ?>
	<?php echo form_close(); ?>
</div>1232