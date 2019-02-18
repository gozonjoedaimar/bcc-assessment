<div class="print-container">
	<div class="row">
		<div class="col-sm-12 text-center">
			<p>Republic of the philippines</p>
			<h4>Bacolod City College</h4>
			<p>Bacolod City</p>
			<p><b><i>Statement of Account</i></b></p>
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
						<td colspan="2">
							<span class="border-bottom print-block"><?php echo "{$form_data['first_name']} {$form_data['middle_name']} {$form_data['last_name']}"; ?></span>
						</td>
					</tr>
					<tr style="height: 0; overflow: hidden;">
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td class="cell-fit" colspan="2"><label>Course/Year/Sec:</label></td>
						<td><span class="border-bottom print-block"><?php echo "{$form_data['course_code']} {$form_data['year_level']}-{$form_data['section']}"; ?></span></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div>&nbsp;</div>
		<div class="col-sm-12">
			<table class="sec">
				<tr>
					<td><label>Particulars:</label></td>
				</tr>
				<tr>
					<td><i><?php echo $particulars ?></i></td>
				</tr>
			</table>
		</div>
		<div>&nbsp;</div>
		<div class="col-sm-12">
			<table class="sec">
				<tr>
					<td class="cell-fit">Assessed by: </td>
					<td><span class="border-bottom print-block text-center"><?php echo $form_data['admin_user'] ?></span></td>
				</tr>
				<tr>
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