(function($) { if (!$) return console.error('System requires jQuery to function');

$parent = $('div#assessment_form');

$parent.find('input[name="total_units"]').on('keyup', function() {
	var perUnit = getHiddenAmount('units');
	var totalUnits = Number(this.value);

	if (!totalUnits) return clearCalculator();

	setHiddenAmount('units_cost', totalUnits * perUnit);

	calculateRegistrationFee();
	calculateMiscellaneousFee();
	calculateBalance();
});

$parent.find('input[name="other_fees"]').on('keyup', function() { calculateMiscellaneousFee(); calculateBalance(); });
$parent.find('input[name="payment_stated"]').on('keyup', function() { calculateBalance(); });

var setHiddenAmount = function(name, value) {
	var input = $parent.find('input[name="'+name+'"]');
	var showEl = input.closest('div').find('.show-hidden');
	input.val(value);
	showEl.text(Number(value).toLocaleString('en'));
}

var getHiddenAmount = function(name) {
	var amount = Number($parent.find('input[name="'+name+'"]').val());
	return amount ? amount: 0;
}

var clearCalculator = function() {
	var clearFields = ['sub_total', 'units_cost'];
	for (var field_index = 0; field_index < clearFields.length; field_index++) {
		var field = clearFields[field_index];
		var inputEl = $parent.find('input[name="'+field+'"]');
		var showEl = inputEl.closest('div').find('.show-hidden');
		inputEl.val("");
		showEl.text("--");
	}
}

var calculateRegistrationFee = function() {

	if (!getHiddenAmount('total_units')) return clearCalculator();

	var units_cost = getHiddenAmount('units_cost');
	var registration_fee = getHiddenAmount('registration_fee');
	setHiddenAmount('sub_total', units_cost + registration_fee);
}

var calculateMiscellaneousFee = function() {

	if (!getHiddenAmount('total_units')) return clearCalculator();

	var fields = [
		'library_fee',
		'sports',
		'laboratory_fee',
		'cultural',
		'nstp',
		'city_smile',
		'development_fee',
		'other_fees'
	];
	var total = 0;
	for (var field_index = 0; field_index < fields.length; field_index++) {
		var field = fields[field_index];
		total += getHiddenAmount(field);
	}

	/* Add registration fee */
	total += getHiddenAmount('sub_total');

	setHiddenAmount('total_fees', total);
}

var calculateBalance = function() {
	if (!getHiddenAmount('total_units')) return clearCalculator();
	var payment = getHiddenAmount('payment_stated');
	var total_fees = getHiddenAmount('total_fees');
	setHiddenAmount('balance', total_fees - payment);
}

})(window.jQuery);