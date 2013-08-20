<div class="row profile-form">
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">My photo</h3>
			</div>
			<div class="panel-body">
				<?php echo form_open_multipart('', array('id' => 'form-photo'));?>
					<figure class="photo-user">
					<?php if ($userdata['photo'] != "") : ?>
						<img src="<?php echo site_url('files/users') . '/'.$userdata['photo'] ?>" alt="user image"class="img-responsive"/>
					<?php else: ?>
						<img src="<?php echo site_url('img/profile.png') ?>" class="img-responsive"/>
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
		</div>
	</div>
	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">My profile</h3>
			</div>
			<div class="panel-body">
				<ul class="nav nav-tabs" id="my-profile">
					<li class="active"><a href="#data">My data</a></li>
					<li><a href="#password">My password</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="data">
						<form class="form modal-body" onsubmit="return validate_data(this, '<?php echo site_url('admin/profile/update_data') ?>')" >
							<?php $this->load->view('admin/profile/profile_data'); ?>
						</form>	
					</div>
					<div class="tab-pane" id="password">
						<form class="form modal-body" onsubmit="return validate_data(this, '<?php echo site_url('admin/profile/update_password') ?>')">
							<?php $this->load->view('admin/profile/profile_password'); ?>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?php echo site_url('lib/ajax-file-uploader/ajaxfileupload.js') ?>"></script>
<script type="text/javascript">
	$(document).ready(function() {

		$('#my-profile a').click(function (e) {
			e.preventDefault();
			$(this).tab('show');
		})

		$('#photo').on('change', function (event) {
	    	event.preventDefault();
	    	$('#form-photo').submit();
	    });

	    $('#form-photo').on('submit', function (event) {
	    	var form = this;
            event.preventDefault();
            show_loading('Subiendo imagen...')
            $.ajaxFileUpload({
				url           : _base_url + 'admin/profile/upload_photo',
				secureuri     : false,
				fileElementId : 'photo',
				dataType      : 'json',
				data          : {},
				success  : function (response) {
					hide_loading();
               		if (response.status == 'error') {
						messageError(response.msg);
               		} else {
               			messageOk(response.msg);
               			setTimeout(function () {
               				window.location = '';
               			}, 2000)
               		}                	
                }
            });
        });

	    $('#delete-photo').on('click', function () {
	    	if (confirm('Se borrará su imagen de perfil.')) {
				$.post(_base_url + 'admin/profile/delete_photo', function () {
					$('#delete-photo').addClass('hide');
					$('.photo-user > img').prop('src', _base_url + 'img/profile.png');
					$('a.photo-user').css('backgroundImage', 'url("'+_base_url + 'img/profile.png")');
	   				messageOk('Delete photo!');
	   			});
			};	
	    });

	});
</script>
