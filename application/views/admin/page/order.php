<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        <img src="<?php echo site_url('img/close2.png') ?>">
    </button>
    <h3>Order Page</h3>
</div>
<div class="modal-body">
	<p class="alert alert-info">Drag to order pages and then click 'Save'</p>
	<div id="order-result" class="modal-container"></div>
</div>
<div class="modal-footer">
    <button type="button" class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
    <button type="submit" class="btn btn-primary" id="save-order"><i class="icon-ok icon-white"></i>Save</button>
</div>
<script type="text/javascript">
	$.post('<?php echo site_url('admin/page/order_ajax') ?>', {}, function (data) {
		$('#order-result').html(data);
	});

	$('#save-order').on('click', function () {
		var oSortable = $('.sortable').nestedSortable('toArray');
		$.post('<?php echo site_url('admin/page/order_ajax') ?>', { sortable: oSortable }, function (data) {
			hideModal();
			messageOk('Order!', 1000);
			setTimeout(function () {window.location = '';}, 1200);
		});
	});
</script>