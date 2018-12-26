<?php echo $form->student_information->messages(); ?>

<div class="row">

	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Student Information</h3>
			</div>
			<div class="box-body">
				<?php echo $form->student_information->open(); ?>

					<div class="row">
						<div class="col-sm-4">
							<?php echo $form->hidden('db_id', NULL, $form->student_information) ?>
							<?php echo $form->student_information->bs3_text('Student Number', 'student_id'); ?>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<?php echo $form->student_information->bs3_text('Last Name', 'last_name'); ?>
						</div>
						<div class="col-sm-4">
							<?php echo $form->student_information->bs3_text('First Name', 'first_name'); ?>
						</div>
						<div class="col-sm-4">
							<?php echo $form->student_information->bs3_text('Middle Name', 'middle_name'); ?>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<?php echo $form->student_information->bs3_text('Department','department'); ?>
						</div>
						<div class="col-sm-4">
							<?php echo $form->bs3_dropdown('Course', 'course_code', $form->get_course_options(), $form->student_information); ?>
						</div>
						<div class="col-sm-4">
							<?php echo $form->bs3_dropdown('Sex', 'gender', ['male'=>'Male','female'=>'Female'], $form->student_information); ?>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<?php echo $form->bs3_textarea('Permanent Address','permanent_address', NULL, $form->student_information); ?>
						</div>
						<div class="col-sm-4">
							<?php echo $form->student_information->bs3_text('Email','email'); ?>
						</div>
						<div class="col-sm-4">
							<?php echo $form->student_information->bs3_text('Tel. No.','phone_number'); ?>
						</div>
					</div>
					<?php echo $form->student_information->bs3_submit('Save'); ?>
					
				<?php echo $form->student_information->close(); ?>
			</div>
		</div>
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Ledger</h3>
				<div style="width: 300px; float: right;" class="row">
					<div class="col-xs-6 text-right"><label>Year Level: </label></div>
					<div class="col-xs-6"><?php echo form_dropdown('year_select', $form->get_year_options(), [], ['id'=>'year_select', 'class'=>'form-control']) ?></div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="box-body">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Date</th>
							<th>Particular</th>
							<th>O.R. No.</th>
							<th>Debit</th>
							<th>Credit</th>
							<th>Balance</th>
						</tr>
					</thead>
					<tfoot class="hide">
						<tr>
							<td><input type="text" class="datepicker" name=""></td>
							<td><input type="text" name=""></td>
							<td><input type="text" name=""></td>
							<td><input type="text" name=""></td>
							<td><input type="text" name=""></td>
							<td><input type="submit" name="" class="btn btn-primary" value="Save"></td>
						</tr>
					</tfoot>
					<tbody>
							<tr><td colspan="6" class="text-center">No Record</td></tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	
</div>