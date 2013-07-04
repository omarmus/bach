<?php 
function btn_edit($uri)
{
	$uri = site_url($uri);
	return anchor('#', '<i class="icon-edit"></i>', array(
		'onclick' => "edit('{$uri}', event)"
	));
}

function btn_delete($uri)
{
	return anchor($uri, '<i class="icon-remove"></i>', array(
		'onclick' => "return confirm('You are about to delete a record. This cannot be undone. Are you sure?')")
	);
}