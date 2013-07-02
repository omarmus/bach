<section class="row-fluid">
	<div class="section-buttons">
		<?php echo anchor('admin/user/edit', '<i class="icon-plus icon-white"></i> Add a user', array('class' => 'btn btn-primary')); ?>
	</div>
	<table class="table table-striped table-bordered table-hover data-table">
		<thead>
			<tr>
				<th></th>
				<th>Email</th>
				<th>First name</th>
				<th>Last name</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
		<?php if (count($users)): ?>
			<?php foreach ($users as $user): ?>
			<tr>
				<td><?php echo $user->getPrimaryKey() ?></td>
				<td><?php echo anchor('admin/user/edit/' . $user->getIdUser(), $user->getEmail()); ?></td>
				<td><?php echo $user->getFirstName() ?></td>
				<td><?php echo $user->getLastName() ?></td>
				<td><?php echo btn_edit('admin/user/edit/' . $user->getIdUser()) ?></td>
				<td><?php echo btn_delete('admin/user/delete/' . $user->getIdUser()) ?></td>
			</tr>
			<?php endforeach ?>
		<?php else: ?>
			<tr>
				<td colspan="3">We could not find any users.</td>
			</tr>
		<?php endif ?>
		</tbody>
	</table>
</section>