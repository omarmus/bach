<div class="headline no-margintop">
    <h3 class="short_headline">
        <span>Mi Perfíl de Usuario</span>
    </h3>
</div>
<div class="row">
	<div class="span3">
		<?php echo isset($error)?$error:'';?>
		<?php echo form_open_multipart('upload/do_upload', array('id' => 'form-photo'));?>
			<?php $this->load->view('panel/sec/profile_photo'); ?>
		</form>
	</div>
	<div class="span9">
		<div id="pills-basic" class="tab-pane">
			<div class="tabbable">
				<ul class="nav nav-pills">
					<li class="active"><a data-toggle="tab" href="#datos">Mis datos</a></li>
					<li class=""><a data-toggle="tab" href="#password">Mi contraseña</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="datos">
						<form action="" class="form form-horizontal form-add" method="post">
							<div class="control-group">
								<label for="" class="control-label">Firstname</label>
								<div class="controls">
									<input type="text" name="fname_usr" value="<?php echo set_value('fname_usr', $user['fname_usr']) ?>">
									<?php echo form_error('fname_usr'); ?>		
								</div>
							</div>
							<div class="control-group">
								<label for="" class="control-label">Lastname</label>
								<div class="controls">
									<input type="text" name="lname_usr" value="<?php echo set_value('lname_usr', $user['lname_usr']) ?>">
									<?php echo form_error('lname_usr'); ?>		
								</div>
							</div>
							<div class="control-group">
								<label for="" class="control-label">Email</label>
								<div class="controls">
									<input type="text" name="email_usr" value="<?php echo set_value('email_usr', $user['email_usr']) ?>">
									<?php echo form_error('email_usr'); ?>		
								</div>
							</div>
							<div class="control-group">
								<label for="" class="control-label">Phone</label>
								<div class="controls">
									<input type="text" name="phone_usr" value="<?php echo set_value('phone_usr', $user['phone_usr']) ?>">
									<?php echo form_error('phone_usr'); ?>		
								</div>
							</div>
							<hr class="line-form">
							<button class="btn btn-success" type="submit">Actualizar mis datos</button>
						</form>
					</div>
					<div class="tab-pane" id="password">
						<form id="form-password" class="form form-horizontal form-add" method="post">
							<?php $this->load->view('panel/sec/profile_password'); ?>
						</form>
					</div>
				</div>
				<!-- /.tab-content -->
			</div>
			<!-- /.tabbable -->
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
