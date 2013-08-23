<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Resetear password para <em><?php echo $user['FirstName'] ?> <?php echo $user['LastName'] ?></em></h4>
</div>
<div class="modal-body font-default">
	<div class="alert alert-info">Se enviará la nueva contraseña a su cuenta de correo: <em><strong><?php echo $user['Email'] ?></strong></em></div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
    <button type="button" class="btn btn-primary" onclick="reset_password(<?php echo $user['IdUser'] ?>)"><span class="glyphicon glyphicon-repeat"></span> Reset password</button>
</div>
