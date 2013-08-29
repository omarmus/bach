<form class="filter" method="post">
	<div>
		<label>First/Last name</label>		
		<input type="text" name="Name" value="<?php echo $this->input->post('Name') ?>" class="form-control">
	</div>
	<div>
		<label>State</label>
		<?php echo form_dropdown('State', array_merge(array('-' => 'ALL'), get_states_user()), $this->input->post('State'), 'class="form-control"'); ?>
	</div>
	<button class="btn btn-primary" type="submit">
		<span class="glyphicon glyphicon-search"></span>
	</button>
	<?php if (isset($filter)) : ?>
	<button class="btn btn-default" type="button" onclick="window.location = ''">
		<span class="glyphicon glyphicon-ban-circle"></span> Terminar búsqueda
	</button>
	<?php endif ?>
	<input type="hidden" name="filter" value="OK">
</form>
<div class="section-buttons">
	<button class="btn btn-primary" type="button" 
			onclick="show_modal('<?php echo site_url('admin/user/edit') ?>')">
		<span class="glyphicon glyphicon-plus"></span> Add a user
	</button>
	<button type="button" id="delete-rows" class="btn btn-danger disabled" 
			onclick="delete_selected(oTable, '<?php echo site_url('admin/user/delete_selected') ?>')">
		<span class="glyphicon glyphicon-trash"></span>
	</button>
</div>
<table id="main-table" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th></th>
			<th class="edit">Edit</th>
			<th class="edit">Password</th>
			<th>Username</th>
			<th>Email</th>
			<th>First name</th>
			<th>Last name</th>
			<th>Rol</th>
			<th>State</th>
		</tr>
	</thead>
	<tbody>
	<?php if (count($users)): ?>
		<?php foreach ($users as $user): ?>
		<tr>
			<td><?php echo $user->getPrimaryKey() ?></td>
			<td class="edit">
				<?php echo btn_panel('admin/user/edit/' . $user->getIdUser(), 'glyphicon-edit') ?>
			</td>
			<td class="edit">
				<?php echo btn_panel('admin/user/password/' . $user->getIdUser(), 'glyphicon-lock') ?>
			</td>
			<td><?php echo $user->getUsername(); ?></td>
			<td><?php echo $user->getEmail(); ?></td>
			<td><?php echo $user->getFirstName(); ?></td>
			<td><?php echo $user->getLastName(); ?></td>
			<td><?php echo $user->getSysRoles()->getName(); ?></td>
			<td><?php echo state_label($user->getState()); ?></td>
		</tr>
		<?php endforeach ?>
	<?php endif ?>
	</tbody>
</table>
<script type="text/javascript">
	$(document).ready(function() {
		oTable = $('#main-table').dataTable({
			"aoColumnDefs" : [
				{"bVisible": false, "aTargets": [ 0 ]}, 
				{"bSortable": false, "aTargets": [ 1, 2, 8 ] }
			],
		});
	});

	function toggle_password (input) {
		$('#main-modal .password')[input.checked ? 'hide' : 'show']();
	}

	function reset_password (id_user) {
		show_loading('Enviando mail...');
		$.post(_base_url + 'admin/user/reset_password/' + id_user, function (response) {
			hide_loading();
			if (response.state == 'OK') {
				hide_modal();
				message_mail('Mail sent!', 300);
			} else {
				message_error('Error al enviar el mail');
			};
		}, 'json');
	}
</script>