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
		<label class="checkbox">
			<input type="checkbox" value="remember-me"> Remember me
		</label>
		<?php echo form_submit('submit', 'Log in', 'class="btn btn-large btn-primary"'); ?>
	<?php echo form_close(); ?>
</div>