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
	    		<?php if (count($pages)): ?>
	    		<?php foreach ($pages as $page): ?>
	    		<tr>
	    			<td><?php echo $page->id_page ?></td>
	    			<td class="edit">
	    				<?php echo btn_panel('admin/page/edit/' . $page->id_page, 'glyphicon-edit', 'load_sections') ?>
	    			</td>
	    			<td class="edit">
	    				<?php echo btn_panel('admin/page/permissions/' . $page->id_page, 'glyphicon-lock') ?>
	    			</td>
	    			<td><?php echo $page->title; ?></td>
	    			<td><?php echo $page->slug; ?></td>
	    			<td>
	    				<span class="label label-<?php echo $page->module == '' ? 'primary' : ( $page->section == '' ? 'success' : 'info'); ?>">
	    					<?php echo $page->module == '' ? 'Module' : ( $page->section == '' ? 'Section' : 'Subsection'); ?>
	    				</span>
	    			</td>
	    			<td>
	    				<?php echo $page->module == '' ? '' : ( $page->section == '' ? $page->module : $page->section); ?>
	    			</td>
	    			<td class="edit"><?php echo button_on_off($page->state, 'admin/page/set_on_off/'. $page->id_page) ?></td>
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