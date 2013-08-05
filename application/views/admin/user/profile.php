<div class="modal-header">
    <h3>My profile</h3>
</div>
<div class="row profile-form">
	<div class="span3">
		<?php echo form_open_multipart('', array('id' => 'form-photo'));?>
			<figure class="photo-user">
			<?php if ($userdata['photo'] != "") : ?>
				<img src="<?php echo site_url('files/users') . '/'.$userdata['photo'] ?>" alt="user image"/>
			<?php else: ?>
				<img src="<?php echo site_url('img/profile.png') ?>" />
			<?php endif ?>
				<figcaption>
					<span class="btn btn-primary fileinput-button">
						<span><i class="icon-plus icon-white"></i> Seleccionar imagen...</span>
						<input type="file" name="photo" id="photo" size="20">
					</span>
					<button type="button" class="btn btn-danger<?php echo $userdata['photo'] == "" ? ' hide': '' ?>" id="delete-photo"><i class="icon-remove icon-white"></i> Eliminar imagen</button>
				</figcaption>
			</figure>
		<?php echo form_close(); ?>
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
<script src="<?php echo site_url('lib/ajax-file-uploader/ajaxfileupload.js') ?>"></script>
<script type="text/javascript">
	$(document).ready(function() {

		$('#photo').on('change', function (event) {
	    	event.preventDefault();
	    	$('#form-photo').submit();
	    });

	    $('#form-photo').on('submit', function (event) {
	    	var form = this;
            event.preventDefault();
            $.ajaxFileUpload({
				url           : '<?= base_url('admin/profile/upload_photo')?>',
				secureuri     : false,
				fileElementId : 'photo',
				dataType      : 'json',
				data          : {},
				success  : function (response) {
               		if (response.status == 'error') {
						messageError(response.msg);
               		} else {
               			$('.photo-user > img').prop('src', '<?php echo site_url('files/users') ?>/' + response.filename);
               			messageOk(response.msg);
               		}                	
                }
            });
        });

	    $('#delete-photo').on('click', function () {
	    	if (confirm('Se borrará su imagen de perfil.')) {
				$.post('<?= base_url('admin/profile/delete_photo')?>', function () {
					$('#delete-photo').addClass('hide');
					$('.photo-user > img').prop('src', '<?php echo site_url('img/profile.png') ?>');
	   				messageOk('Delete photo!');
	   			});
			};	
	    });

	});
</script>
