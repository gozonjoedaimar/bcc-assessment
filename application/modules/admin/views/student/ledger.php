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
							<?php echo $form->bs3_dropdown('Department', 'department', $form->get_department_options(), $form->student_information); ?>
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
							<?php echo $form->bs3_input('Tel. No.','phone_number', 'number', $form->student_information); ?>
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
					<div class="col-xs-6"><?php echo form_dropdown('year_level', $form->get_year_options(), [], ['id'=>'year_level', 'class'=>'form-control']) ?></div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="box-body">
				<table class="table table-bordered table-striped" id="ledger">
					<thead>
						<tr>
							<th>Date</th>
							<th>Particular</th>
							<th>O.R. No.</th>
							<th class="text-right">Pending</th>
							<th class="text-right">Debit</th>
							<th class="text-right">Credit</th>
							<th class="text-right">Balance</th>
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

<div class="modal fade add-receipt" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
    	<?php echo form_open('api/ledger', [ 'id'=>'add-receipt' ]) ?>
    	<div class="modal-header">
    		<?php echo form_label("Official Receipt") ?>
    	</div>
    	<div class="modal-body">
	    	<div class="form-group">
		      <?php echo  form_input([ "class"=>'account-id', 'name'=>'id', 'type'=>'hidden' ]) ?>
		      <?php echo  form_input('receipt', NULL, [ "class"=>'form-control' ]) ?>
	    	</div>
    	</div>
    	<div class="modal-footer text-right">
    		<?php echo form_submit('submit', "Submit", [ 'class'=>'btn btn-primary' ]) . form_reset('close', 'Close', [ 'class' => 'btn btn-default', "data-dismiss"=>"modal" ]); ?>
    	</div>
    	<?php echo form_close(); ?>
    </div>
  </div>
</div>

<script type="text/javascript">
	
(function($) {

var ledger_api = "<?php echo site_url('api/ledger') ?>"; var pending = 0; var paid = 0;

var toNumber = function($number) {
	$number = Number($number);

	$number = $number.toLocaleString("en-us", { maximumFractionDigits: 2, minimumFractionDigits: 2 });

	return $number;
};

var payments = function(row, data) {
	if (Number(data.paid)) {
		row.append('<td>');
		row.append('<td class="text-right">'+toNumber(data.payment)+"</td>");
		row.append('<td>');
		paid += Number(data.payment);
	}
	else {
		row.append('<td class="text-right">'+toNumber(data.payment)+"</td>");
		row.append('<td>');
		row.append('<td>');
		pending += Number(data.payment);
	}
};

var receipt = function(row, data) {

	if (Number(data.paid)) {
		var official_receipt = data.official_receipt ? data.official_receipt: "";
		row.append('<td>'+official_receipt+'</td>');
	}
	else {
		var button = $('<button class="pay">Pay</button>');
		button.attr('data-row-id', data.id);
		var cell = $('<td>');
		cell.append(button);
		row.append(cell);
	}

}

var reload_table = function(callback) {
	var table = $("table#ledger");
	var body = table.find('tbody');
	var norecord = $('<tr><td colspan="6" class="text-center">No Record</td></tr>');
	var loader = $('<tr><td colspan="6" class="text-center">Loading</td></tr>');

	body.html(loader);

	/* Reset values */
	pending = 0; paid = 0;

	var settings = {
		"async": true,
		"crossDomain": true,
		"url": ledger_api,
		"method": "GET",
		"headers": {},
		"data": {
			"student_id"  : $('[name="student_id"]').val(),
			"course_code" : $('[name="course_code"]').val(),
			"year_level"  : $('[name="year_level"]').val()
		}
	}

	$.ajax(settings).done(function (response) {
		if (response.status) {
			body.html("");

			/* Prepare beginning balance */
			var row = $('<tr>');
			row.append('<td>'+response.enrolled+'</td>');
			row.append('<td>Beginning Balance</td>');
			row.append('<td>');
			row.append('<td>');
			row.append('<td>');
			row.append('<td class="text-right">'+toNumber(response.account_total)+'</td>');
			row.append('<td>');
			body.append(row);

			/* Prepare payments */
			if (response.data.length) {
				for (var i = 0; i < response.data.length; i++) {
					var row = $('<tr>');
					var data = response.data[i];
					row.append('<td>'+data.datetime+'</td>');
					row.append('<td>'+data.description+'</td>');
					
					/* OR */
					receipt(row, data);
					
					/* payments */
					payments(row, data);

					/* balance */
					row.append('<td>');

					body.append(row);
				}

			}

			/* Prepare ending balance */
			var row = $('<tr>');
			row.append('<td><b>Total</b></td>');
			row.append('<td>');
			row.append('<td>');
			row.append('<td class="text-right"><u>'+toNumber(pending)+'</u></td>');
			row.append('<td class="text-right"><u>'+toNumber(paid)+'</u></td>');
			row.append('<td class="text-right"><u>'+toNumber(response.account_total)+'</u></td>');
			row.append('<td class="text-right"><b><u>'+toNumber(response.remaining)+'</u></b></td>');
			body.append(row);

			table.find('button.pay').on('click', function() {
				var btn = $(this);
				var modal = $('.add-receipt');
				modal.find('input.account-id').val(btn.data('row-id'));
				modal.modal();
			})

			if (typeof callback == "function") callback();
		}
		else {
			body.html(norecord);
		}
	});
}

reload_table();

$('select[name="year_level"], select[name="course_code"]').on('change', function() {
	reload_table();
});

$('.add-receipt').on('hide.bs.modal', function() {
	var modal = $(this);
	modal.find('input.account-id, input[name="receipt"]').val('');
	modal.find('input[name="submit"]').removeAttr('disabled');
	modal.find('.alert').remove();
});

$('form#add-receipt').on('submit', function(e) {
	var form = $(this);
	e.preventDefault();

	var form_data = form.serialize();
	var modal = $('.add-receipt');
	modal.find('.alert').remove();
	modal.find('input[name="submit"]').attr('disabled',true);

	if ( ! modal.find('input[name="receipt"]').val()) {
		modal.find('.modal-body').append('<div class="alert alert-warning">Receipt field is required</div>');
		modal.find('input[name="submit"]').removeAttr('disabled');
		return;
	}

	var settings = {
		"async": true,
		"crossDomain": true,
		"url": form.attr('action'),
		"method": "POST",
		"headers": {},
		"data": form_data
	}

	$.ajax(settings).done(function(response) {
		if (response.status) {
			modal.find('.modal-body').append('<div class="alert alert-success">'+response.message+'</div>')
			reload_table(function() { setTimeout(function() { modal.modal('hide'); }, 3000) });
		}
		else {
			modal.find('.modal-body').append('<div class="alert alert-danger">'+response.message+'</div>');
			modal.find('input[name="submit"]').removeAttr('disabled');
		}
	})

});

})(jQuery);

</script>