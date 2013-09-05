<?php $settings = get_parameters() ?>

<ul class="nav nav-tabs" id="myTab">
	<li class="active"><a href="#general">General</a></li>
	<li><a href="#mail">Correo</a></li>
	<li><a href="#aparence">Apariencia</a></li>
	<li><a href="#roles">Roles de usuario</a></li>
</ul>

<div class="tab-content">
	<div class="tab-pane active" id="general">
		
	</div>
	<div class="tab-pane" id="mail">
		<form class="form modal-body" onsubmit="return false">
			<div class="form-group">
				<label><?php echo $settings['SMTP']['Title'] ?></label>
				<div>
					<?php echo button_on_off($settings['SMTP']['Value'], 'admin/setting/set_on_off/SMTP') ?>
				</div>
			</div>
		<?php foreach ($settings as $key => $value): ?>
			<?php if ($key == 'SMTP') continue; ?>
			<div class="form-group">
				<label><?php echo $value['Title'] ?></label>
				<?php echo form_input($key, set_value($key, $value['Value']), 'class="form-control"'); ?>
			</div>
		<?php endforeach ?>
		</form>	
	</div>
	<div class="tab-pane" id="aparence">
		
	</div>
	<div class="tab-pane" id="roles">
		
	</div>
</div>

<script type="text/javascript">
$('#myTab a').click(function (e) {
	e.preventDefault();
	$(this).tab('show');
})
</script>
