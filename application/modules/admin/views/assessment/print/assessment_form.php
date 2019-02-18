<div class="print-container">
	<div class="row">
		<div class="col-sm-12 text-center">
			<p>Republic of the philippines</p>
			<h4>Bacolod City College</h4>
			<p>Bacolod City</p>
			<p><b><i>Assessment Form</i></b></p>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<table class="sec">
				<tbody>
					<tr>
						<td class="cell-fit">
							<label>Name:</label>
						</td>
						<td colspan="4">
							<span class="border-bottom print-block"><?php echo "{$form_data['first_name']} {$form_data['middle_name']} {$form_data['last_name']}"; ?></span>
						</td>
					</tr>
					<tr>
						<td class="cell-fit" colspan="2"><label>Course/Year:</label></td>
						<td><span class="border-bottom print-block text-center"><?php echo "{$form_data['course_code']} {$form_data['year_level']}"; ?></span></td>
						<td class="cell-fit"><label>ID No.:</label></td>
						<td><span class="border-bottom print-block text-center"><?php echo "{$form_data['student_id']}"; ?></span></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="col-sm-12">
			<table class="sec">
				<tr>
					<td class="cell-fit">No. of Units:</td>
					<td style="max-width: 100px;">
						<span class="border-bottom print-block text-center">
						<?php echo $form_data['total_units'] ?>
						</span>
					</td>
					<td class="cell-fit">x<?php echo $form_data['units'] ?></td>
					<td style="width: 100px;">&nbsp;</td>
					<td class="cell-fit">P</td>
					<td>
						<span class="border-bottom print-block text-right"><?php echo $form_data['units_cost'] ?></span>
					</td>
				</tr>
			</table>
		</div>
		<div class="col-sm-12">
			<table class="sec">
				<tr style="height: 0; overflow: hidden;">
					<td style="width: 10%;">&nbsp;</td>
					<td style="width: 5%;">&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td colspan="5">Registration Fee:</td>
					<td><span class="border-bottom print-block text-right"><?php echo $form_data['registration_fee'] ?></span></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td colspan="5">Sub-total:</td>
					<td><span class="border-bottom print-block text-right"><?php echo $form_data['sub_total'] ?></span></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td colspan="6">ADD: Miscellaneous:</td>
				</tr>
				<tr>
					<td colspan="2">&nbsp;</td>
					<td colspan="4">Library Fee</td>
					<td><span class="print-block text-right" style="padding-right: 5px;"><?php echo $form_data['library_fee'] ?></span></td>
				</tr>
				<tr>
					<td colspan="2">&nbsp;</td>
					<td colspan="4">Development Fee</td>
					<td><span class="print-block text-right" style="padding-right: 5px;"><?php echo $form_data['development_fee'] ?></span></td>
				</tr>
				<tr>
					<td colspan="2">&nbsp;</td>
					<td colspan="4">Sports</td>
					<td><span class="print-block text-right" style="padding-right: 5px;"><?php echo $form_data['sports'] ?></span></td>
				</tr>
				<tr>
					<td colspan="2">&nbsp;</td>
					<td colspan="4">Cultural</td>
					<td><span class="print-block text-right" style="padding-right: 5px;"><?php echo $form_data['cultural'] ?></span></td>
				</tr>
				<tr>
					<td colspan="2">&nbsp;</td>
					<td colspan="4">Laboratory Fee</td>
					<td><span class="print-block text-right" style="padding-right: 5px;"><?php echo $form_data['laboratory_fee'] ?></span></td>
				</tr>
				<tr>
					<td colspan="2">&nbsp;</td>
					<td colspan="4">NSTP</td>
					<td><span class="print-block text-right" style="padding-right: 5px;"><?php echo $form_data['nstp'] ?></span></td>
				</tr>
				<tr>
					<td colspan="2">&nbsp;</td>
					<td colspan="4">City Smile (Sch. Paper)</td>
					<td><span class="print-block text-right" style="padding-right: 5px;"><?php echo $form_data['city_smile'] ?></span></td>
				</tr>
				<tr>
					<td colspan="2">&nbsp;</td>
					<td colspan="4">Others</td>
					<td><span class="print-block text-right" style="padding-right: 5px;"><?php echo $form_data['other_fees'] ?></span></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td colspan="2">TOTAL FEES</td>
					<td>&nbsp;</td>
					<td colspan="2" class="text-center">P</td>
					<td><span class="border-bottom print-block text-right sub"><?php echo $form_data['total_fees'] ?></span></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td colspan="5">Payment Upon Enrollment</td>
					<td><span class="border-bottom print-block text-right"><?php echo $form_data['payment_stated'] ?></span></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td colspan="2">Balance</td>
					<td>&nbsp;</td>
					<td colspan="2" class="text-center">P</td>
					<td><span class="border-bottom print-block text-right"><?php echo $form_data['balance'] ?></span></td>
				</tr>
			</table>
		</div>
		<div class="col-sm-12">
			<table class="sec">
				<tr>
					<td class="cell-fit">Assessed by: </td>
					<td><span class="border-bottom print-block text-center"><?php echo $form_data['admin_user'] ?></span></td>
					<td>&nbsp;</td>
					<td class="cell-fit">Date</td>
					<td><span class="border-bottom print-block text-center"><?php echo $form_data['datetime'] ?></span></td>
				</tr>
			</table>
		</div>
	</div>
</div>

<style type="text/css">
	.print-block {
		width: 100%;
		display: block;
	}
	.cell-fit {
		width: 1%;
		white-space: nowrap;
	}
	table.sec {
		width: 100%;
		margin-bottom: 15px;
	}
</style>