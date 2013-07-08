<?php 
function btn_edit($uri)
{
	$uri = site_url($uri);
	return anchor('#', '<img src="'.site_url('img/glyphicons/glyphicons_150_edit.png').'">', array(
		'onclick' => "edit('{$uri}', event)", 'class' => 'btn btn-mini'
	));
}

function btn_delete($uri)
{
	return anchor($uri, '<i class="icon-remove"></i>', array(
		'onclick' => "return confirm('You are about to delete a record. This cannot be undone. Are you sure?')")
	);
}