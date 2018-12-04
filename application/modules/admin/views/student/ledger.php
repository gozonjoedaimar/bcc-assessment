<?php echo $form->messages(); ?>

<div class="row">

	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Student Information</h3>
			</div>
			<div class="box-body">
				<?php echo $form->open(); ?>

					<div class="row">
						<div class="col-sm-4">
							<?php echo $form->bs3_text('Student Number', 'studentNumber'); ?>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<?php echo $form->bs3_text('Last Name', 'lastName'); ?>
						</div>
						<div class="col-sm-4">
							<?php echo $form->bs3_text('First Name', 'firstName'); ?>
						</div>
						<div class="col-sm-4">
							<?php echo $form->bs3_text('Middle Name', 'middleName'); ?>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<?php echo $form->bs3_text('Department',''); ?>
						</div>
						<div class="col-sm-4">
							<?php echo $form->bs3_text('Course',''); ?>
						</div>
						<div class="col-sm-4">
							<?php echo $form->bs3_text('Sex',''); ?>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-8">
							<div class="form-group">
								<?php echo form_label('Permanent Address'); ?>
								<?php echo form_textarea(array( 'rows'=>2, 'class'=>'form-control' )); ?>
							</div>
						</div>
						<div class="col-sm-4">
							<?php echo $form->bs3_text('Tel. No.',''); ?>
						</div>
					</div>
					<?php echo $form->bs3_submit('Save'); ?>
					
				<?php echo $form->close(); ?>
			</div>
		</div>
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Ledger</h3>
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
						<?php if (isset($record)) : ?>
						<?php else: ?>
							<tr><td colspan="6" class="text-center">No Record</td></tr>
						<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	
</div>