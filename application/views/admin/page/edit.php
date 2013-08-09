<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title"><?php echo empty($page['IdPage']) ? 'Add a new page' : 'Edit page ' .$page['Title'] ?></h4>
</div>
<form onsubmit="return validate(this, '<?php echo site_url('admin/page/edit'. (isset($page['IdPage'])?'/'.$page['IdPage']:'')) ?>')">
	<div class="modal-body">
		<div id="page-type">
			<label>Tipe page</label>
			<div class="form-group text-center">
				<label class="radio-inline">
					<input type="radio" name="type-page" value="module" checked> Module
				</label>
				<label class="radio-inline">
					<input type="radio" name="type-page" value="section"> Section
				</label>
				<label class="radio-inline">
					<input type="radio" name="type-page" value="subsection"> Subsection
				</label>
			</div>
		</div>
		<div>
			<div id="container-module" style="display : none;"> 
				<?php echo form_dropdown('IdModule', $list_modules, set_value('IdModule', $page['IdModule'])); ?>
				<?php echo form_error('IdModule'); ?>
			</div>
			<div id="container-section" style="display : none;">
				<?php echo form_dropdown('IdSection', array(0 => 'Seleccione una sección')); ?>				
				<?php echo form_error('IdSection'); ?>
			</div>
		</div>
	    <div class="form-group">
	    	<label for="">Name <strong>*</strong></label> 
			<?php echo form_input('Title', set_value('Title', $page['Title']), 'class="form-control"'); ?>
			<?php echo form_error('Title'); ?>
		</div>
		<div class="form-group">
			<label for="">URI <strong>*</strong></label>
			<?php echo form_input('Slug', set_value('Slug', $page['Slug']), 'class="form-control"'); ?>
			<?php echo form_error('Slug'); ?>
		</div>
	</div>
	<div class="modal-footer">
	    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Save</button>
	</div>
</form>
