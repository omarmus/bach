<?php $new = ! isset($page['IdPage']); ?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title"><?php echo $new ? 'Add a new page' : 'Edit page ' .$page['Title'] ?></h4>
</div>
<form onsubmit="return validate_page(this, '<?php echo site_url('admin/page/edit'. ( $new ? '' : '/' . $page['IdPage'] )) ?>')">
	<div class="modal-body">
		<div id="page-type">
			<div>
				<label><?php echo $new ? '¿Que tipo de página deséa crear?' : 'Seleccione el tipo de página para:' ?></label>
			</div>
			<div class="form-group radio-group">
				<label class="radio-inline">
					<input type="radio" name="PageType" onclick="page_type(this)" value="module" <?php echo $page_type == 'module' || $page['IdModule'] == 0 ? 'checked' : '' ?>> Un módulo
				</label>
				<label class="radio-inline">
					<input type="radio" name="PageType" onclick="page_type(this)" value="section" <?php echo $page_type == 'section' || $page['IdModule'] ? 'checked' : '' ?>> Una sección
				</label>
				<label class="radio-inline">
					<input type="radio" name="PageType" onclick="page_type(this)" value="subsection" <?php echo $page_type == 'subsection' || $page['IdSection'] ? 'checked' : '' ?>> Una subsección
				</label>
			</div>
		</div>
		<div>
			<div class="form-group" id="container-module" <?php echo $page_type == 'section' || $page_type == 'subsection' || $page['IdModule'] || $page['IdSection'] ? '' : 'style="display : none;"' ?>> 
				<div class="alert alert-info">Seleccione el módulo al que pertenecerá la página.</div>
				<?php echo form_dropdown('IdModule', $list_modules, set_value('IdModule', $page['IdModule']), 'class="form-control" onchange="get_sections(this, '.$page['IdSection'].')"'); ?>
				<?php echo form_error('IdModule'); ?>
			</div>
			<div class="form-group" id="container-section" <?php echo $page_type == 'subsection' || $page['IdSection'] ? '' : 'style="display : none;"' ?>>
				<div class="alert alert-info">Seleccione la sección a la que pertenecerá la página.</div>
				<?php echo form_dropdown('IdSection', array(0 => 'Seleccione una sección'), set_value('IdSection', $page['IdSection']), 'class="form-control"'); ?>				
				<?php echo form_error('IdSection'); ?>
			</div>
		</div>
		<?php if ( $new ) : ?>
		<div class="form-group" style="width: 100%;">
			<label class="checkbox-inline">
				<input type="checkbox" name="Visible" value="YES" checked> La página será parte del menú principal
			</label>
		</div>
		<?php endif ?>
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
