$('[data-toggle=confirmation]').confirmation({
				rootSelector: '[data-toggle=confirmation]',
				placement: 'top',
				onConfirm: function() {
					$(this).closest('tr').remove();
				}
			});
$('table').on('click', '.move-up', function () {
    var thisRow = $(this).closest('tr');
    var prevRow = thisRow.prev();
    if (prevRow.length) {
        prevRow.before(thisRow);
    }
});

$('table').on('click', '.move-down', function () {
    var thisRow = $(this).closest('tr');
    var nextRow = thisRow.next();
    if (nextRow.length) {
        nextRow.after(thisRow);
    }
});