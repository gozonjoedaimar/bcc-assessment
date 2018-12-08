<div class="row" id="statement_of_account">
	
		<?php echo $form->statement_of_account->open() ?>


		<div class="col-md-6">
			


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
							<?php echo $form->assessment_form->bs3_text('Course','course'); ?>
						</div>
						<div class="col-sm-4">
							<?php echo $form->assessment_form->bs3_text('Year','year'); ?>
						</div>
						<div class="col-sm-4">
							<?php echo $form->assessment_form->bs3_text('Section','section'); ?>
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
							<label><?php echo form_checkbox('examination') ?>Examination Dues</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-offset-2 col-xs-10">
						<div class="checkbox">
							<label><?php echo form_checkbox('examterm', 'midterm') ?>Midterm</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-offset-2 col-xs-10">
						<div class="checkbox">
							<label><?php echo form_checkbox('examterm', 'endterm') ?>End-Term</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-offset-1 col-xs-11">
						<div class="checkbox">
							<label><?php echo form_checkbox('') ?>Old Account</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-offset-1 col-xs-11">
						<div class="checkbox">
							<label><?php echo form_checkbox('') ?>Certification/s</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-offset-1 col-xs-3">
						<div class="checkbox">
							<label><?php echo form_checkbox('other_payment') ?>Others</label>
						</div>
					</div>
					<div class="col-xs-3 border-bottom">
						<?php echo $form->statement_of_account->field_text('description','',array( 'class'=>'borderless text-left', 'style'=>'text-align:left;' )); ?>
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

						<div class="row">
							
							<div class="col-sm-6 col-sm-offset-1">
								<?php echo form_label('Amount Due'); ?>
							</div>

						<div class="col-sm-1 text-right col-sm-offset-1 col-xs-2">
							<span class="">P</span>
						</div>
							<div class="col-sm-3 ">
								<span class="border-bottom full-width text-right">
									<?php echo $form->statement_of_account->field_text('payment_stated', '', array('class'=>'borderless')) ?>
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
								<span class="border-bottom full-width text-right">&nbsp;</span>
							</div>


						</div>

						<div class="row">
							
							<div class="col-sm-5 col-sm-offset-1">
								<?php echo form_label('Date Issued'); ?>
							</div>
							<div class="col-sm-6 ">
								<span class="border-bottom full-width text-right">&nbsp;</span>
							</div>


						</div>
						
				</div>
			</div>

			<div class="box box-primary">
				<div class="box-body">

						<?php echo $form->assessment_form->bs3_submit('Save'); ?>
						
				</div>
			</div>

	</div>

		<?php echo $form->statement_of_account->close() ?>

</div>


<script type="text/javascript" src="<?php echo base_url('assets/local/js/statement_of_account.js') ?>"></script>