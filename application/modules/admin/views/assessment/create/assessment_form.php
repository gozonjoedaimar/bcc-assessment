<div class="row" id="assessment_form">

	<?php echo $form->assessment_form->open(); ?>
	<?php echo form_hidden('form_type', 'assessment_form') ?>
	<div class="col-md-8">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Student Information</h3>
			</div>
			<div class="box-body">

					<div class="row">
						<div class="col-sm-4">
							<?php echo $form->assessment_form->bs3_text('Last Name','last_name'); ?>
						</div>
						<div class="col-sm-4">
							<?php echo $form->assessment_form->bs3_text('First Name','first_name'); ?>
						</div>
						<div class="col-sm-4">
							<?php echo $form->assessment_form->bs3_text('Middle Name','middle_name'); ?>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-4">
							<?php echo $form->bs3_dropdown('Course','course_code', $form->get_course_options(), $form->assessment_form); ?>
						</div>
						<div class="col-sm-4">
							<?php echo $form->bs3_dropdown('Year','year_level', $form->get_year_options(), $form->assessment_form); ?>
						</div>
						<div class="col-sm-4">
							<?php echo $form->bs3_input('ID No.','student_id', 'text', NULL, $form->assessment_form, ["class"=>"id-input form-control", "maxlength"=>7]); ?>
						</div>
					</div>
					
			</div>
		</div>

	</div>
	<div class="col-md-4">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Student Status</h3>
			</div>
			<div class="box-body">

					<div class="row">
						<div class="col-sm-12">
							<?php echo $form->bs3_dropdown('Scholar','sponsor', $form->get_sponsor_options(), $form->assessment_form, [],
								"Select sponsor if the student is scholar"
								); ?>
							<a href="#" class="add-sponsor">+ Add sponsor</a>
						</div>
					</div>
					
			</div>
		</div>

	</div>
	<div class="col-md-6">

		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Fees</h3>
			</div>
			<div class="box-body">

					<div class="row">
						<div class="col-sm-7">
							<div class="form-group">
								<?php echo form_label('No. of Units') ?>
								<?php echo $form->input('total_units', 'number', NULL, $form->assessment_form, array('style'=>'width: 120px;')) ?>
								<?php echo form_hidden('units', $this->defaults->get('units')) ?>
								<?php echo form_label(' x P' . $this->defaults->get('units')) ?>
							</div>
						</div>
						<div class="col-sm-1 text-right col-sm-offset-1 col-xs-2">
							<span class="">P</span>
						</div>
						<div class="col-sm-3 col-xs-10">
							<?php echo $form->show_hidden('units_cost', NULL, $form->assessment_form) ?>
						</div>
					</div>


					<div class="row">
						<div class="col-sm-5 col-sm-offset-1">
							<div class="form-group"><?php echo form_label('Registration Fee:') ?></div>
						</div>
						<div class="col-sm-3 col-sm-offset-3">
							<?php echo $form->show_hidden('registration_fee', $this->defaults->get('registration_fee')) ?>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-5 col-sm-offset-1">
							<div class="form-group"><?php echo form_label('Sub-total') ?></div>
						</div>
						<div class="col-sm-3 col-sm-offset-3">
							<?php echo $form->show_hidden('sub_total', NULL, $form->assessment_form, ['sub']) ?>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-5 col-sm-offset-1">
							<div class="form-group"><?php echo form_label('Add: Miscellaneous:') ?></div>
						</div>
					</div>



					<div class="row">
						<div class="col-sm-5 col-sm-offset-2">
							<div class="form-group"><?php echo form_label('Library Fee') ?></div>
						</div>
						<div class="col-sm-3 col-sm-offset-2">
							<?php echo $form->show_hidden('library_fee', $this->defaults->get('library_fee')) ?>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-5 col-sm-offset-2">
							<div class="form-group"><?php echo form_label('Development Fee') ?></div>
						</div>
						<div class="col-sm-3 col-sm-offset-2">
							<?php echo $form->show_hidden('development_fee', $this->defaults->get('development_fee')) ?>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-5 col-sm-offset-2">
							<div class="form-group"><?php echo form_label('Sports') ?></div>
						</div>
						<div class="col-sm-3 col-sm-offset-2">
							<?php echo $form->show_hidden('sports', $this->defaults->get('sports')) ?>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-5 col-sm-offset-2">
							<div class="form-group"><?php echo form_label('Cultural') ?></div>
						</div>
						<div class="col-sm-3 col-sm-offset-2">
							<?php echo $form->show_hidden('cultural', $this->defaults->get('cultural')) ?>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-5 col-sm-offset-2">
							<div class="form-group"><?php echo form_label('Laboratory Fee') ?></div>
						</div>
						<div class="col-sm-3 col-sm-offset-2">
							<?php echo $form->show_hidden('laboratory_fee', $this->defaults->get('laboratory_fee')) ?>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-5 col-sm-offset-2">
							<div class="form-group"><?php echo form_label('NSTP') ?></div>
						</div>
						<div class="col-sm-3 col-sm-offset-2">
							<?php echo $form->show_hidden('nstp', $this->defaults->get('nstp')) ?>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-5 col-sm-offset-2">
							<div class="form-group"><?php echo form_label('City Smile (Sch. Paper)') ?></div>
						</div>
						<div class="col-sm-3 col-sm-offset-2">
							<?php echo $form->show_hidden('city_smile', $this->defaults->get('city_smile')) ?>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-5 col-sm-offset-2">
							<div class="form-group"><?php echo form_label('Others') ?></div>
						</div>
						<div class="col-sm-3 col-sm-offset-2">
							<span class="border-bottom full-width text-right">
								<?php echo $form->assessment_form->field_text('other_fees', NULL, array('class'=>'borderless')) ?>
							</span>
						</div>
					</div>



					<div class="row">
						<div class="col-sm-4 col-sm-offset-1">
							<div class="form-group"><?php echo form_label('Total Fees') ?></div>
						</div>
						<div class="col-sm-1 col-sm-offset-3 text-right"><span>P</span></div>
						<div class="col-sm-3 ">
							<?php echo $form->show_hidden('total_fees', NULL, $form->assessment_form, ['sub']) ?>
						</div>
					</div>
					
			</div>
		</div>


			
		</div>
		<div class="col-md-6">

			<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Payment</h3>
			</div>
				<div class="box-body">

						<div class="row" style="margin-bottom: 5px;">
							
							<div class="col-sm-8 col-sm-offset-1">
								<?php echo form_label('Payment Method'); ?>
							</div>
							<div class="col-sm-3 ">
								<?php echo $form->dropdown('payment_method', [
									"Cash", "Check", "Guarantee"
									], $form->assessment_form, ["class"=>"form-control"]) ?>
							</div>


						</div>
						<div class="row" style="margin-bottom: 5px;">
							
							<div class="col-sm-8 col-sm-offset-1">
								<?php echo form_label('Payment Upon Enrollment'); ?>
							</div>
							<div class="col-sm-3 ">
								<span class="border-bottom full-width text-right">
									<?php echo $form->input('payment_stated', 'number', NULL, $form->assessment_form, array('class'=>'borderless form-control')) ?>
								</span>
							</div>


						</div>

						<div class="row">
							
							<div class="col-sm-6 col-sm-offset-1">
								<?php echo form_label('Balance'); ?>
							</div>
							<div class="col-sm-1 col-sm-offset-1 text-right">
								<span class="sub">P</span>
							</div>
							<div class="col-sm-3 ">
								<?php echo $form->show_hidden('balance', NULL, $form->assessment_form, ['sub', 'form-control']) ?>
							</div>


						</div>
						
				</div>
			</div>
		</div>
		<div class="col-md-6">

			<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Staff</h3>
			</div>
				<div class="box-body">

						<div class="row">
							
							<div class="col-sm-5 col-sm-offset-1">
								<?php echo form_label('Assessed By:'); ?>
							</div>
							<div class="col-sm-6">
								<?php echo form_hidden('admin_user', $user->first_name . " " . $user->last_name) ?>
								<span class="border-bottom full-width text-center"><?php echo $user->first_name . " " . $user->last_name ?></span>
							</div>


						</div>

						<div class="row">
							
							<div class="col-sm-5 col-sm-offset-1">
								<?php echo form_label('Date'); ?>
							</div>
							<div class="col-sm-6 ">
								<span class="border-bottom full-width">
									<input type="text" name="datetime" value="<?php echo date("m/d/Y") ?>" id="datetime" class="borderless text-center date-picker">
								</span>
							</div>


						</div>
						
				</div>
			</div>
		</div>


		<div class="col-md-6">

			<div class="box box-primary">
				<div class="box-body">

						<?php echo $form->assessment_form->bs3_submit('Save'); ?>
						<?php echo $form->assessment_form->bs3_submit('Save and Print', 'btn btn-primary', [ 'name'=>'save', 'value'=>'print' ]); ?>
						<?php echo $form->assessment_form->btn_reset('Reset', ['class'=>'btn btn-default']); ?>
						
				</div>
			</div>
			<?php echo $form->assessment_form->close(); ?>
		</div>	
</div>

<script type="text/javascript" src="<?php echo site_url('assets/local/js/assessment_calculator.js') ?>"></script>
<script type="text/javascript">
(function($) {

	$('a.add-sponsor').on('click', function(e) {
		e.preventDefault();
		var modal = $('.modal.add-sponsor');
		var form = $('form#add-sponsor');
		var input = modal.find('input[name=name].form-control');

		modal.unbind('shown.bs.modal').on('shown.bs.modal', function() {
			input.trigger('focus');
		});

		form.unbind('submit').on('submit', function(e) {
			e.preventDefault();
			var that =  this;
			var submit = form.find('input[type="submit"]');
			submit.attr('disabled','disabled');
			$.post(that.action, { name: input.val() }).done(function(response) {
					$.get(that.action).done(function(response) {
						input.val('');
						var select = $('select[name="sponsor"]');
						select.html('<option value="" selected="selected">Select sponsor</option>');
						for (var i = 0; i < response.data.length; i++) {
							var data = response.data[i];
							select.append('<option value="'+data.id+'">'+data.name+'</option>');
						}
						modal.unbind('hidden.bs.modal').on('hidden.bs.modal', function() {
							notif("Successfully added sponsor", "success");
						});
						modal.modal('hide');
						submit.removeAttr('disabled');
					})
					.fail(function() {
						input.val('');
						modal.unbind('hidden.bs.modal').on('hidden.bs.modal', function() {
							notif("Unable update sponsor list. There was an error on your request.", "danger");
						});
						modal.modal('hide');
						submit.removeAttr('disabled');
					});
			})
			.fail(function() {
				input.val('');
				modal.unbind('hidden.bs.modal').on('hidden.bs.modal', function() {
					notif("Unable to add sponsor. There was an error on your request.", "danger");
				});
				modal.modal('hide');
				submit.removeAttr('disabled');
			});

		});

		modal.modal('show');
	});

})(window.jQuery);
</script>