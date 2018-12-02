<?php echo $form->messages(); ?>

<div class="row">

	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Default amounts</h3>
			</div>
			<div class="box-body">
				<?php echo $form->open(); ?>

					<?php if (isset($default_labels)) : ?>
					<?php foreach ($default_labels as $default) : ?>
					<?php echo $form->bs3_text($default['label'], $default['name'], $default['value']); ?>
					<?php endforeach; ?>
					<?php endif; ?>

					<?php echo $form->bs3_submit('Save'); ?>
					<a href="<?php echo base_url('admin/defaults/labels') ?>" class="btn btn-default">Manage Labels</a>
					
				<?php echo $form->close(); ?>
			</div>
		</div>
	</div>
	
</div>