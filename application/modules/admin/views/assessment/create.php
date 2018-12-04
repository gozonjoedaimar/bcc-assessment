<?php

echo $form->messages(); ?>

<div class="row">

	<div class="col-md-12">
		<?php echo $form->open(); ?>
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Student Information</h3>
			</div>
			<div class="box-body">

					<div class="row">
						<div class="col-sm-4">
							<?php echo $form->bs3_text('Last Name',''); ?>
						</div>
						<div class="col-sm-4">
							<?php echo $form->bs3_text('First Name',''); ?>
						</div>
						<div class="col-sm-4">
							<?php echo $form->bs3_text('Middle Name',''); ?>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-4">
							<?php echo $form->bs3_text('Course',''); ?>
						</div>
						<div class="col-sm-4">
							<?php echo $form->bs3_text('Year',''); ?>
						</div>
						<div class="col-sm-4">
							<?php echo $form->bs3_text('ID No.',''); ?>
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
								<?php echo form_input('total_units','', array('style'=>'width: 120px;')) ?>
								<?php echo form_hidden('units', $this->defaults->get('units')) ?>
								<?php echo form_label(' x P' . $this->defaults->get('units')) ?>
							</div>
						</div>
						<div class="col-sm-1 text-right col-sm-offset-1 col-xs-2">
							<span class="">P</span>
						</div>
						<div class="col-sm-3 col-xs-10">
							<?php echo form_hidden('units_cost') ?>
							<span class="border-bottom full-width text-right show-hidden">--</span>
						</div>
					</div>


					<div class="row">
						<div class="col-sm-5 col-sm-offset-1">
							<div class="form-group"><?php echo form_label('Registration Fee:') ?></div>
						</div>
						<div class="col-sm-3 col-sm-offset-3">
							<?php echo form_hidden('registration_fee', $this->defaults->get('registration_fee')) ?>
							<span class="border-bottom full-width text-right show-hidden">
								<?php echo $this->defaults->get('registration_fee') ?>
							</span>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-5 col-sm-offset-1">
							<div class="form-group"><?php echo form_label('Sub-total') ?></div>
						</div>
						<div class="col-sm-3 col-sm-offset-3">
							<?php echo form_hidden('sub_total') ?>
							<span class="border-bottom sub full-width text-right show-hidden">--</span>
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
							<?php echo form_hidden('library_fee', $this->defaults->get('library_fee')) ?>
							<span class="border-bottom full-width text-right show-hidden">
								<?php echo $this->defaults->get('library_fee') ?>
							</span>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-5 col-sm-offset-2">
							<div class="form-group"><?php echo form_label('Development Fee') ?></div>
						</div>
						<div class="col-sm-3 col-sm-offset-2">
							<?php echo form_hidden('development_fee', $this->defaults->get('development_fee')) ?>
							<span class="border-bottom full-width text-right show-hidden">
								<?php echo $this->defaults->get('development_fee') ?>
							</span>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-5 col-sm-offset-2">
							<div class="form-group"><?php echo form_label('Sports') ?></div>
						</div>
						<div class="col-sm-3 col-sm-offset-2">
							<?php echo form_hidden('sports', $this->defaults->get('sports')) ?>
							<span class="border-bottom full-width text-right show-hidden">
								<?php echo $this->defaults->get('sports') ?>
							</span>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-5 col-sm-offset-2">
							<div class="form-group"><?php echo form_label('Cultural') ?></div>
						</div>
						<div class="col-sm-3 col-sm-offset-2">
							<?php echo form_hidden('cultural', $this->defaults->get('cultural')) ?>
							<span class="border-bottom full-width text-right show-hidden">
								<?php echo $this->defaults->get('cultural') ?>
							</span>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-5 col-sm-offset-2">
							<div class="form-group"><?php echo form_label('Laboratory Fee') ?></div>
						</div>
						<div class="col-sm-3 col-sm-offset-2">
							<?php echo form_hidden('laboratory_fee', $this->defaults->get('laboratory_fee')) ?>
							<span class="border-bottom full-width text-right show-hidden">
								<?php echo $this->defaults->get('laboratory_fee') ?>
							</span>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-5 col-sm-offset-2">
							<div class="form-group"><?php echo form_label('NSTP') ?></div>
						</div>
						<div class="col-sm-3 col-sm-offset-2">
							<?php echo form_hidden('nstp', $this->defaults->get('nstp')) ?>
							<span class="border-bottom full-width text-right show-hidden">
								<?php echo $this->defaults->get('nstp') ?>
							</span>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-5 col-sm-offset-2">
							<div class="form-group"><?php echo form_label('City Smile (Sch. Paper)') ?></div>
						</div>
						<div class="col-sm-3 col-sm-offset-2">
							<?php echo form_hidden('city_smile', $this->defaults->get('city_smile')) ?>
							<span class="border-bottom full-width text-right show-hidden">
								<?php echo $this->defaults->get('city_smile') ?>
							</span>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-5 col-sm-offset-2">
							<div class="form-group"><?php echo form_label('Others') ?></div>
						</div>
						<div class="col-sm-3 col-sm-offset-2">
							<span class="border-bottom full-width text-right">
								<?php echo form_input('other_fees', '', array('class'=>'borderless')) ?>
							</span>
						</div>
					</div>



					<div class="row">
						<div class="col-sm-4 col-sm-offset-1">
							<div class="form-group"><?php echo form_label('Total Fees') ?></div>
						</div>
						<div class="col-sm-1 col-sm-offset-3 text-right"><span>P</span></div>
						<div class="col-sm-3 ">
							<?php echo form_hidden('total_fees') ?>
							<span class="border-bottom full-width text-right show-hidden sub">--</span>
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
							
							<div class="col-sm-8 col-sm-offset-1">
								<?php echo form_label('Payment Upon Enrollment'); ?>
							</div>
							<div class="col-sm-3 ">
								<span class="border-bottom full-width text-right">
									<?php echo form_input('payment_stated', '', array('class'=>'borderless')) ?>
								</span>
							</div>


						</div>

						<div class="row">
							
							<div class="col-sm-6 col-sm-offset-1">
								<?php echo form_label('Balance'); ?>
							</div>
							<div class="col-sm-1 col-sm-offset-1 text-right">
								<span>P</span>
							</div>
							<div class="col-sm-3 ">
								<?php echo form_hidden('balance') ?>
								<span class="border-bottom full-width text-right show-hidden sub">--</span>
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
							<div class="col-sm-6 ">
								<span class="border-bottom full-width text-right">&nbsp;</span>
							</div>


						</div>

						<div class="row">
							
							<div class="col-sm-5 col-sm-offset-1">
								<?php echo form_label('Date'); ?>
							</div>
							<div class="col-sm-6 ">
								<span class="border-bottom full-width text-right">&nbsp;</span>
							</div>


						</div>
						
				</div>
			</div>
		</div>


		<div class="col-md-6">

			<div class="box box-primary">
				<div class="box-body">

						<?php echo $form->bs3_submit('Save'); ?>
						
				</div>
			</div>
			<?php echo $form->close(); ?>
		</div>
	
</div>


<style type="text/css">
	

.full-width {
  display: block;
  width: 100%;
}

.border-bottom {
  border-bottom: 1px solid grey;
  padding: 0 5px;
}

.border-bottom.sub {
  border-bottom: 3px solid grey;
}

.show-hidden {
	font-weight: bold;
}

input.borderless {
    width: 100%;
    display: inline-block;
    border: 0;
    text-align: right;
    font-weight: bold;
    margin: 0 -5px;
    padding: 0 5px;
    box-sizing: content-box;
}

</style>

<script type="text/javascript" src="<?php echo base_url('assets/local/js/assessment_calculator.js') ?>"></script>