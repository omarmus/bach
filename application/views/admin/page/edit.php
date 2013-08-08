<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        <img src="<?php echo site_url('img/close2.png') ?>">
    </button>
    <h3><?php echo empty($page['IdPage']) ? 'Add a new page' : 'Edit page ' .$page['Title'] ?></h3>
</div>
<form onsubmit="return validate(this, '<?php echo site_url('admin/page/edit'. (isset($page['IdPage'])?'/'.$page['IdPage']:'')) ?>')">
	<div class="modal-body">
		<div id="page-type">
			<label>Tipo de página</label>
			<label class="radio">
				<input type="radio" name="type-page" value="module">
				Módulo
			</label>
			<label class="radio">
				<input type="radio" name="type-page" value="section">
				Sección
			</label>
			<label class="radio">
				<input type="radio" name="type-page" value="subsection">
				Subsección
			</label>
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
	    <div>
	    	<label for="">Name <strong>*</strong></label> 
			<?php echo form_input('Title', set_value('Title', $page['Title'])); ?>
			<?php echo form_error('Title'); ?>
		</div>
		<div>
			<label for="">URI <strong>*</strong></label>
			<?php echo form_input('Slug', set_value('Slug', $page['Slug'])); ?>
			<?php echo form_error('Slug'); ?>
		</div>
	</div>
	<div class="modal-footer">
	    <button type="button" class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
	    <button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i>Save</button>
	</div>
</form>
