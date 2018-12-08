(function($) { if (!$) return console.error('System requires jQuery to function');

var $parent = $('div#statement_of_account');

var other_payment = $parent.find('[name="other_payment"]');
var description = $parent.find('[name="description"]');

description.on('keyup', function() {
	if (this.value) {
		other_payment.prop('checked',true);
	}
	else {
		other_payment.prop('checked',false);
	}
});

var terms = $parent.find('[name="examterm"]');
var examination = $parent.find('[name="examination"]');

terms.on('change', function() {
	terms.prop('checked', false);
	$(this).prop('checked', true);
	examination.prop('checked', true);
});

examination.on('change', function() {
	var $checked = $(this).prop('checked');
	if (!$checked) {
		terms.prop('checked', false);
	}
})

})(window.jQuery);