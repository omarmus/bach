<?php 
	$id_page = $page->getIdPage();
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Permissions / <?php echo $page->getTitle() ?></h4>
</div>
<form onsubmit="return validate(this, '<?php echo site_url('admin/user/edit'. (isset($user['IdUser'])?'/'.$user['IdUser']:'')) ?>')">
	<div class="modal-body">
	    <table id="main-table" class="table table-striped table-bordered table-hover">
	    	<thead>
	    		<tr>
	    			<th>Rol</th>
	    			<th class="edit">Read</th>
	    			<th class="edit">Create</th>
	    			<th class="edit">Update</th>
	    			<th class="edit">Delete</th>
	    		</tr>
	    	</thead>
	    	<tbody>
	    	<?php if (count($permissions)): ?>
	    		<?php foreach ($permissions as $permission): ?>
	    			<?php $id_rol = $permission->getIdRol() ?>
	    		<tr>
	    			<td><?php echo $permision->getSysRoles()->getName() ?></td>
	    			<td><?php echo button_yes_no($permision->getRead(), 'admin/page/set_permission/'. $id_page . '/' . $id_rol . '/Read') ?></td>
	    			<td><?php echo button_yes_no($permision->getCreate(), 'admin/page/set_permission/'. $id_page . '/' . $id_rol . '/Create') ?></td>
	    			<td><?php echo button_yes_no($permision->getUpdate(), 'admin/page/set_permission/'. $id_page . '/' . $id_rol . '/Update') ?></td>
	    			<td><?php echo button_yes_no($permision->getDelete(), 'admin/page/set_permission/'. $id_page . '/' . $id_rol . '/Delete') ?></td>
	    		</tr>
	    		<?php endforeach ?>
			<?php endif ?>
			</tbody>
		</table>
	</div>
	<div class="modal-footer">
	    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Save</button>
	</div>
</form>