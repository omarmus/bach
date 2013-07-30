<div class="modal-header">
    <h3>My profile</h3>
</div>
<div class="row profile-form">
	<div class="span3">
		<?php echo form_open_multipart('', array('id' => 'form-photo'));?>
			<figure class="photo-user">
			<?php if (isset($user['photo'])): ?>
				<img src="<?php echo site_url('static/files/user_profile') . '/'.$user['photo'] ?>" style="display: none;" />
			<?php else: ?>
				<img src="<?php echo site_url('img/profile.png') ?>" style="display: none;" />
			<?php endif ?>
				<div class="loading-img" style="display: none"></div>
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
		</form>
	</div>
	<div class="span9">
		<div class="tabbable tabs-left profile">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#p-data" data-toggle="tab">My data</a></li>
				<li class=""><a href="#p-password" data-toggle="tab">My password</a></li>
			</ul>
			<div class="tab-content well">
				<div class="tab-pane active" id="p-data">
					<form class="form modal-body" onsubmit="return validate_data(this, '<?php echo site_url('admin/profile/update_data') ?>')" >
						<?php $this->load->view('admin/user/profile_data'); ?>
					</form>
				</div>
				<div class="tab-pane" id="p-password">
					<form class="form modal-body" onsubmit="return validate_data(this, '<?php echo site_url('admin/profile/update_password') ?>')">
						<?php $this->load->view('admin/user/profile_password'); ?>
					</form>
				</div>
			</div>
        </div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#photo').on('change', function (event) {
	    	event.preventDefault();
	    	$('#form-photo').submit();
	    });
	    $('#form-password').on('submit', function (event) {
	    	event.preventDefault();
	    	var form = this;
	    	$.post('<?= base_url('panel/sec/profile/change_password')?>', $(form).serialize(), function (response) {
	    		$(form).html(response);
	    		if($(form).find('.inline_validation_message').length == 0) {
	    			alert('Su contraseña se cambió con éxitó.')
	    		}
	    	});
	    });

	    $('#form-photo').on('submit', function (event) {
	    	var form = this;
            event.preventDefault();
            $.ajaxFileUpload({
               url         :'<?= base_url('panel/sec/profile/upload_photo')?>',
               secureuri      :false,
               fileElementId  :'photo',
               dataType    : 'json',
               data        : {},
               success  : function (data, status) {
               		if (data.status == 'ERROR') {
						alert(data.msg);
               		} else {
               			$(form).load('<?= base_url('panel/sec/profile/update_photo')?>', function () {
               				window.location = '';
               			});
               		}                	
               }
            });
            return false;
        });

        $("#form-photo img").on('load', function () {
        	var img = this;
        	$('.loading-img').fadeOut(function () {
        		$(img).fadeIn();
        	});
        })
	});

	function delete_photo () {
		if (confirm('Se borrará su imagen de perfil.')) {
			$('#form-photo').load('<?= base_url('panel/sec/profile/delete_photo')?>', function () {
   				window.location = '';
   			});
		};	
	}


</script>
