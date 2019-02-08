<div class="box">
	<div class="box-body">
		<div class="row">
			<div class="col-sm-3">
				<?php echo $form->bs3_dropdown("Sponsor", 'sponsor', $form->get_batch_options(), $form_builder->create_form()); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 batches"></div>
		</div>
	</div>
</div>
<div class="box">
	<div class="box-body">
		<div class="row">
			<div class="col-sm-3">
				<a href="<?php echo $list_url ?>" class="btn btn-default">Back</a>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

(function($) {

document.addEventListener('DOMContentLoaded', function(e) {
	$('[name="sponsor"]').on('change', function() {
		let base_url = $('meta[name="base_url"]').attr('content');
		let input = this;
		let resultDiv = $('.batches');
		$.ajax({
            url: base_url + "/api/scholars",
            method: 'POST',
            data: { q: input.value },
            beforeSend: function() {
                $(resultDiv).html("<p class=\"text-center\">Loading...</p>");
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

            $(resultDiv).html(resultHtml);
        }).fail(function(result) {
            $(resultDiv).html('<p class="text-center alert alert-danger">An error occured. Please contact administrator to address this issue.</p>');
        });
	});
})

})(window.jQuery)

</script>