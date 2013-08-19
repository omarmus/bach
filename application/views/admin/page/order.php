<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Order Page</h4>
</div>
<div class="modal-body font-default">
	<p class="alert alert-info">Drag to order pages and then click 'Save'</p>
	<div id="order-result" class="modal-container"></div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
    <button type="submit" class="btn btn-primary" id="save-order"><span class="glyphicon glyphicon-ok"></span> Save</button>
</div>
<script type="text/javascript">
	$.post('<?php echo site_url('admin/page/order_ajax') ?>', function (response) {
		$('#order-result').html(response);
	});

	$('#save-order').on('click', function (event) {
		event.preventDefault();
		var oSortable = $('.sortable').nestedSortable('toArray');
		show_loading('Ordenando...');
		$.post(_base_url + 'admin/page/order_ajax', { sortable: oSortable }, function (response) {
			console.log(response);
			hide_loading();
			hideModal();
			messageOk('Order!', 1000);
			setTimeout(function () {window.location = '';}, 1200);
		});
	});
</script>