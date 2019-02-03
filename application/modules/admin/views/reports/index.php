<div class="box">
	<div class="box-body">
		<div class="row">
			<div class="report-header col-sm-12">
				<h4>Generate report</h4>
			</div>
		</div>
		<?php echo $form_builder->open() ?>
		<div class="row">
			<div class="col-sm-3">
				<?php echo $form->dropdown('course_code', $form->get_course_options(), $form_builder, ['class'=>'form-control']); ?>
			</div>
			<div class="col-sm-3">
				<?php echo $form->dropdown('year_level', $form->get_year_options(), $form_builder, ['class'=>'form-control']); ?>
			</div>
			<div class="col-sm-3">
				<?php echo $form->dropdown('batch', $form->get_batch_options(), $form_builder, ['class'=>'form-control']); ?>
			</div>
			<div class="col-sm-3">
				<?php echo form_button('Generate', 'generate', ['class'=>'btn btn-primary btn-gen-report']); ?>
				<?php echo form_button('Print', 'print', ['class'=>'btn btn-primary btn-print-report']); ?>
			</div>
		</div>
		<?php echo $form_builder->close() ?>
		<div>&nbsp;</div>
		<div class="reports row">
			<div class="col-sm-12 body"></div>
		</div>
	</div>
</div>

<script type="text/javascript">
(function($) {
	var base_url = $('meta[name="base_url"]').attr('content');
	var resultDiv = $('.reports .body');

	$('link:first').attr('media','all');

	$('.btn-print-report').on('click', function(el) {
		resultDiv.printThis();
	});
	
	$('.btn-gen-report').on('click', function(el) {
            if (el.req && typeof el.req.abort == "function") el.req.abort();
            el.req = $.ajax({
                url: base_url + "/api/reports",
                method: 'GET',
                data: $('#reports_gen').serialize(),
                beforeSend: function() {
                    resultDiv.html("<p class=\"text-center\">Loading...</p>");
                }
            }).done(function(result) {
                var resultHtml = $(result.html);

                /* Trigger row clicks */
                // var row = resultHtml.find('tbody tr');
                // row.css({ cursor: 'pointer' });
                // row.on('click', function() {
                //     var $row = $(this);
                //     if (typeof callback == "function") callback(this, result);
                //     $('#studentSearchModal').modal('hide');
                // });

                resultDiv.html(resultHtml);
            }).fail(function(result) {
                resultDiv.html('<p class="text-center alert alert-danger">An error occured. Please contact administrator to address this issue.</p>');
            });
        });
})(window.jQuery);
</script>