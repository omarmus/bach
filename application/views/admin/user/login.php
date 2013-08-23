<div class="form-login">
	<form id="form-login" accept-charset="utf-8" method="post">
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

		<h3 class="form-signin-heading">Please log in</h3>
		<div class="input-group">
			<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
			<input type="text" name="Email" class="form-control" placeholder="Email address or Username" autofocus>
		</div>
		<?php echo form_error('Email'); ?>

		<div class="input-group">
			<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
			<input type="password" name="Password" class="form-control" placeholder="Password">
		</div>
		<?php echo form_error('Password'); ?>
		<!-- <label class="checkbox">
			<input type="checkbox" value="remember-me"> Remember me
		</label> -->
		<div class="input-group bottom">
			<a href="#" id="open-reset">¿Sé olvidó su contraseña?</a>
		</div>
		<button class="btn btn-primary btn-block btn-lg" type="submit">Log in</button>
	</form>
	<div>
		<h3 class="form-signin-heading">Recuperar mi contraseña</h3>
		<div class="input-group ">
			<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
			<input id="reset-email" type="text" name="Email" class="form-control" placeholder="Email address">
		</div>
		<?php echo form_error('Email'); ?>
		<div class="input-group bottom">
			<a href="#" id="open-login">Log in</a>
		</div>
		<button id="button-reset" class="btn btn-primary btn-block btn-lg" type="button">Reset password</button>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#button-reset').on('click', function () {
			$.post(_base_url + 'ajax/reset_password', {email: $('#reset-email').val()}, function (response) {
				console.log(response);
			});
		});
		$('#open-reset').on('click' , function (event) {
			event.preventDefault();
			var width = $('#form-login').outerWidth()
			$('#form-login').animate({marginLeft: '-' + width + 'px'});
		});
		$('#open-login').on('click' , function (event) {
			event.preventDefault();
			$('#form-login').animate({marginLeft: 0});
		});
	});
</script>