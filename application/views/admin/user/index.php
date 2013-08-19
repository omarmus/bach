<div class="section-buttons">
	<button class="btn btn-primary" type="button" 
			onclick="showModal('<?php echo site_url('admin/user/edit') ?>')">
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
			<td class="edit"><?php echo btn_edit('admin/user/edit/' . $user->getIdUser()) ?></td>
			<td><?php echo $user->getEmail(); ?></td>
			<td><?php echo $user->getFirstName() ?></td>
			<td><?php echo $user->getLastName() ?></td>
			<td><?php echo $user->getSysRoles()->getName() ?></td>
			<td><?php echo $user->getState(); ?></td>
		</tr>
		<?php endforeach ?>
	<?php endif ?>
	</tbody>
</table>