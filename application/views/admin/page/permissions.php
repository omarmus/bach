<?php $id_page = $page->getIdPage(); ?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Agregar permisos a <em><?php echo $page->getTitle() ?></em></h4>
</div>
<div class="modal-body font-default">
	<div class="alert alert-info">Para poder acceder a la página minimamente necesita tener permisos de Lectura.</div>
    <table id="main-table" class="table table-striped table-bordered">
    	<thead>
    		<tr>
    			<th>Rol</th>
    			<th>Read</th>
    			<th>Create</th>
    			<th>Update</th>
    			<th>Delete</th>
    		</tr>
    	</thead>
    	<tbody>
    	<?php if (count($permissions)): ?>
    		<?php foreach ($permissions as $permission): ?>
    			<?php $id_rol = $permission->getIdRol() ?>
    		<tr>
    			<td><?php echo $permission->getSysRoles()->getName() ?></td>
    			<td class="edit"><?php echo button_yes_no($permission->getRead(), 'admin/page/set_permission/'. $id_page . '/' . $id_rol . '/Read') ?></td>
    			<td class="edit"><?php echo button_yes_no($permission->getCreate(), 'admin/page/set_permission/'. $id_page . '/' . $id_rol . '/Create') ?></td>
    			<td class="edit"><?php echo button_yes_no($permission->getUpdate(), 'admin/page/set_permission/'. $id_page . '/' . $id_rol . '/Update') ?></td>
    			<td class="edit"><?php echo button_yes_no($permission->getDelete(), 'admin/page/set_permission/'. $id_page . '/' . $id_rol . '/Delete') ?></td>
    		</tr>
    		<?php endforeach ?>
		<?php endif ?>
		</tbody>
	</table>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
</div>
