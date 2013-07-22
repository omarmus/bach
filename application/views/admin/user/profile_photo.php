<figure class="photo-user">
<?php if (isset($user['photo'])): ?>
	<img src="<?php echo site_url('static/files/user_profile') . '/'.$user['photo'] ?>" style="display: none;" />
<?php else: ?>
	<img src="<?php echo site_url('static/panel/images/profile.jpg') ?>" style="display: none;" />
<?php endif ?>
	<div class="loading-img"></div>
	<figcaption>
		<span class="btn btn-primary fileinput-button">
			<span><i class="icon-plus icon-white"></i> Seleccionar imagen...</span>
			<input type="file" name="photo" id="photo" size="20">
		</span>
	<?php if (isset($user['photo'])): ?>
		<button type="button" class="btn btn-danger" onclick="delete_photo()"><i class="icon-remove icon-white"></i> Eliminar imagen</button>
	<?php endif ?>
		<button type="submit" class="btn btn-success" style="display: none;"><i class="icon-upload icon-white"></i> Subir foto de perfil</button>
	</figcaption>
</figure>