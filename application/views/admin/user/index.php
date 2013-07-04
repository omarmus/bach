<script type="text/javascript" src="<?php echo site_url('js/user.js') ?>"></script>
<div class="section-buttons">
	<button class="btn btn-primary" type="button" 
			onclick="showModal('<?php echo site_url('admin/user/edit') ?>')">
		<i class="icon-plus icon-white"></i>Add a user
	</button>
	<button type="button" class="btn btn-danger input-mini disabled"><i class="icon-trash icon-white"></i></button>
</div>
<table class="table table-striped table-bordered table-hover data-table">
	<thead>
		<tr>
			<th></th>
			<th>Edit</th>
			<th>Email</th>
			<th>First name</th>
			<th>Last name</th>
		</tr>
	</thead>
	<tbody>
	<?php if (count($users)): ?>
		<?php foreach ($users as $user): ?>
		<tr>
			<td><?php echo $user->getPrimaryKey() ?></td>
			<td><?php echo btn_edit('admin/user/edit/' . $user->getIdUser()) ?></td>
			<td><?php echo $user->getEmail(); ?></td>
			<td><?php echo $user->getFirstName() ?></td>
			<td><?php echo $user->getLastName() ?></td>
		</tr>
		<?php endforeach ?>
	<?php endif ?>
	</tbody>
</table>