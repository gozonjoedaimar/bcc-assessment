<div class="row" id="statement_of_account">
	
		<?php echo $form->statement_of_account->open() ?>
		<?php echo form_hidden('form_type', 'statement_of_account') ?>


		<div class="col-md-6">
			


		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Student Information</h3>
			</div>
			<div class="box-body">

					<div class="row">
						<div class="col-sm-4">
							<?php echo $form->statement_of_account->bs3_text('Last Name','last_name'); ?>
						</div>
						<div class="col-sm-4">
							<?php echo $form->statement_of_account->bs3_text('First Name','first_name'); ?>
						</div>
						<div class="col-sm-4">
							<?php echo $form->statement_of_account->bs3_text('Middle Name','middle_name'); ?>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-4">
							<?php echo $form->bs3_dropdown('Course', 'course_code', $form->get_course_options(), $form->statement_of_account) ?>
						</div>
						<div class="col-sm-4">
							<?php echo $form->bs3_dropdown('Year', 'year_level', $form->get_year_options(), $form->statement_of_account); ?>
							<script type="text/javascript">
								console.log("Year value:", "<?php echo $form->statement_of_account->get_field_value('year') ?>");
							</script>
						</div>
						<div class="col-sm-4">
							<?php echo $form->statement_of_account->bs3_text('Section','section'); ?>
						</div>
						<div class="col-sm-4">
							<?php echo $form->bs3_input('Student ID','student_id', 'text', NULL, $form->statement_of_account, ["class"=>"id-input form-control", "maxlength"=>7]); ?>
						</div>
					</div>
					
			</div>
		</div>

		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Fees</h3>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-xs-offset-1 col-xs-11">
						<div class="checkbox">
							<label><?php echo $form->checkbox('examination', NULL, $form->statement_of_account) ?>Examination Dues</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-offset-2 col-xs-10">
						<div class="checkbox">
							<label><?php echo $form->checkbox('examterm', 'Mid-term', $form->statement_of_account) ?>Midterm</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-offset-2 col-xs-10">
						<div class="checkbox">
							<label><?php echo $form->checkbox('examterm', 'End-term', $form->statement_of_account) ?>End-Term</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-offset-1 col-xs-11">
						<div class="checkbox">
							<label><?php echo $form->checkbox('old_account', 'Old Account', $form->statement_of_account) ?>Old Account</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-offset-1 col-xs-11">
						<div class="checkbox">
							<label><?php echo $form->checkbox('certification', 'Certification', $form->statement_of_account) ?>Certification/s</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-offset-1 col-xs-3">
						<div class="checkbox">
							<label><?php echo $form->checkbox('other_payment', NULL, $form->statement_of_account) ?>Others</label>
						</div>
					</div>
					<div class="col-xs-3 border-bottom">
						<?php echo $form->statement_of_account->field_text('description', NULL,array( 'class'=>'borderless text-left', 'style'=>'text-align:left;', 'data-checkbox'=>'[name=\'other_payment\']' )); ?>
					</div>
				</div>
			</div>
		</div>

		</div>
		<div class="col-md-6">

			<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Adding/Dropping</h3>
			</div>
				<div class="box-body">
					<div class="row">
						<div class="col-xs-offset-1 col-xs-3">
							<div class="checkbox">
								<label><?php echo $form->checkbox('add_payment', NULL, $form->statement_of_account) ?>Adding</label>
							</div>
						</div>
						<div class="col-xs-3 ">
							<div class="border-bottom">
								<?php echo $form->textarea('adding_description', NULL, $form->statement_of_account, array( 'class'=>'borderless text-left form-control', 'style'=>'text-align:left;', 'placeholder'=>'Description', 'data-checkbox'=>'[name=\'add_payment\']' )); ?>
							</div>
						</div>
					</div>
					<div>&nbsp;</div>
					<div class="row">
						<div class="col-xs-offset-1 col-xs-3">
							<div class="checkbox">
								<label><?php echo $form->checkbox('drop_payment', NULL, $form->statement_of_account) ?>Dropping</label>
							</div>
						</div>
						<div class="col-xs-3 ">
							<div class="border-bottom">
								<?php echo $form->textarea('dropping_description', NULL, $form->statement_of_account, array( 'class'=>'borderless text-left form-control', 'style'=>'text-align:left;', 'placeholder'=>'Description', 'data-checkbox'=>'[name=\'drop_payment\']' )); ?>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Payment</h3>
			</div>
				<div class="box-body">

						<div class="row">
							
							<div class="col-sm-6 col-sm-offset-1">
								<?php echo form_label('Amount Due'); ?>
							</div>

						<div class="col-sm-1 text-right col-sm-offset-1 col-xs-2">
							<span class="">P</span>
						</div>
							<div class="col-sm-3 ">
								<span class="border-bottom full-width text-right">
									<?php echo $form->input('payment_stated', 'number', NULL, $form->statement_of_account, array('class'=>'borderless')) ?>
								</span>
							</div>


						</div>
						
				</div>
			</div>

			<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Staff</h3>
			</div>
				<div class="box-body">

						<div class="row">
							
							<div class="col-sm-5 col-sm-offset-1">
								<?php echo form_label('Assessed By:'); ?>
							</div>
							<div class="col-sm-6 ">
								<?php echo form_hidden('admin_user', $user->first_name . " " . $user->last_name) ?>
								<span class="border-bottom full-width text-center"><?php echo $user->first_name . " " . $user->last_name ?></span>
							</div>


						</div>

						<div class="row">
							
							<div class="col-sm-5 col-sm-offset-1">
								<?php echo form_label('Date Issued'); ?>
							</div>
							<div class="col-sm-6 ">
								<span class="border-bottom full-width">
									<input type="text" name="datetime" value="<?php echo date("m/d/Y") ?>" id="datetime" class="borderless text-center date-picker">
								</span>
							</div>


						</div>
						
				</div>
			</div>

			<div class="box box-primary">
				<div class="box-body">

						<?php echo $form->statement_of_account->bs3_submit('Save'); ?>
						<?php echo $form->statement_of_account->bs3_submit('Save and Print', 'btn btn-primary', [ 'name'=>'save', 'value'=>'print' ]); ?>
						<?php echo $form->statement_of_account->btn_reset('Reset', ['class'=>'btn btn-default']); ?>
						
				</div>
			</div>

	</div>

		<?php echo $form->statement_of_account->close() ?>

</div>


<script type="text/javascript" src="<?php echo site_url('assets/local/js/statement_of_account.js') ?>"></script>