<div class="section-buttons">
	<button class="btn btn-primary" type="button" 
			onclick="showModal('<?php echo site_url('admin/page/edit') ?>')">
		<i class="icon-plus icon-white"></i> Add a page
	</button>
	<button class="btn" type="button" 
			onclick="showModal('<?php echo site_url('admin/page/order') ?>')">
		<i class="icon-th-list"></i> Order page
	</button>
	<button type="button" id="delete-rows" class="btn btn-danger input-mini disabled" 
			onclick="deleteSelected(oTable, '<?php echo site_url('admin/page/deleteSelected') ?>', true)">
		<i class="icon-trash icon-white"></i>
	</button>
</div>
<table id="main-table" class="table table-striped table-bordered table-hover data-table">
	<thead>
		<tr>
			<th></th>
			<th class="edit">Edit</th>
			<th class="edit">Permissions</th>
			<th>Name</th>
			<th>URI</th>
			<th>Module</th>
		</tr>
	</thead>
	<tbody>
	<?php if (count($pages)): ?>
		<?php foreach ($pages as $page): ?>
		<tr>
			<td><?php echo $page->id_page ?></td>
			<td class="edit"><?php echo btn_edit('admin/page/edit/' . $page->id_page) ?></td>
			<td class="edit"><?php echo btn_permissions('admin/page/permissions/' . $page->id_page) ?></td>
			<td><?php echo $page->title; ?></td>
			<td><?php echo $page->slug; ?></td>
			<td><?php echo $page->parent_title ?></td>
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
			{"bSortable": false, "aTargets": [ 1, 2 ] }
		],
	});
});
</script>