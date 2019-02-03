<div class="box">
	<div class="box-body">
		<div class="row">
			<div class="report-header col-sm-12">
				<h4>Generate report</h4>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3">
				<?php echo $form->dropdown('course', $form->get_course_options(), $form_builder->create_form(), ['class'=>'form-control']); ?>
			</div>
			<div class="col-sm-3">
				<?php echo $form->dropdown('year_level', $form->get_year_options(), $form_builder->create_form(), ['class'=>'form-control']); ?>
			</div>
			<div class="col-sm-3">
				<?php echo $form->dropdown('batch', $form->get_batch_options(), $form_builder->create_form(), ['class'=>'form-control']); ?>
			</div>
			<div class="col-sm-3">
				<?php echo form_button('Generate', 'generate', ['class'=>'btn btn-primary']); ?>
			</div>
		</div>
	</div>
</div>