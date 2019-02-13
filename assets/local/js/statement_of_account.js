(function($) { if (!$) return console.error('System requires jQuery to function');

var $parent = $('div#statement_of_account');

var description = $parent.find('[data-checkbox]');

description.on('keyup', function() {
	var selector = $(this).data('checkbox');
	var checkbox = $parent.find(selector);
	if (this.value) {
		checkbox.prop('checked',true);
	}
	else {
		checkbox.prop('checked',false);
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