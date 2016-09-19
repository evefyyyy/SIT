$(function () {
		$('.selectroom').selectpicker({
		});
	});
	$(function () {
		$('.datepicker').datetimepicker({
			format: 'DD/MM/YYYY'
		});
	});
	$(function () {
        $('#timepicker1').datetimepicker({
            format: 'LT'
        });
    });
	$(function () {
		$('.selectpicker').selectpicker({
			liveSearch: true,
			maxOptionsText: 'limit reach (5 commitees max)',
			noneSelectedText: 'no commitee selected',
		});
	});
function divFunction() {
$( ".selectpicker" ).each(function() {
	var targets = [];
	$.each($(".selectpicker option:selected"), function(){
	targets.push($(this).val());
	});
	document.getElementById("selectAdv").value =targets
	document.getElementById("starttime").value;
	document.getElementById("minute").value;
});
}

$('[data-toggle=confirmation]').confirmation({
				rootSelector: '[data-toggle=confirmation]',
				placement: 'left',
				onConfirm: function() {
					$(this).closest('tr').remove();
				}
			});

$('table').on('click', '.move-up', function () {

    var thisRow = $(this).closest('tr');
    var thisColumn = thisRow.children('td')[2];
    var thisDateColumn = thisColumn.innerHTML;

    var prevRow = thisRow.prev();

    if(prevRow.length > 0){

		var prevColumn = prevRow.children('td')[2];
		var prevDateColumn = prevColumn.innerHTML;

		var tempDateData = thisDateColumn;
		thisColumn.innerHTML = prevDateColumn;
		prevColumn.innerHTML = tempDateData;

		if (prevRow.length) {
		    prevRow.before(thisRow);
		}
	}

});

$('table').on('click', '.move-down', function () {
    var thisRow = $(this).closest('tr');
    var thisColumn = thisRow.children('td')[2];
    var thisDateColumn = thisColumn.innerHTML;

    var nextRow = thisRow.next();

    if(nextRow.length > 0){

	    var nextColumn = nextRow.children('td')[2];
	    var nextDateColumn = nextColumn.innerHTML;

		var tempDateData = thisDateColumn;
		thisColumn.innerHTML = nextDateColumn;
		nextColumn.innerHTML = tempDateData;

	}

    if (nextRow.length) {
        nextRow.after(thisRow);
    }
});

function parseTime(timeString)
{
  if (timeString == '') return null;
  var d = new Date();
  var time = timeString.match(/(\d+)(:(\d\d))?\s*(P?)/);
  d.setHours( parseInt(time[1]) + ( ( parseInt(time[1]) < 12 && time[4] ) ? 12 : 0) );
  d.setMinutes( parseInt(time[3]) || 0 );
  d.setSeconds(0, 0);
  return d;
} // parseTime()

function highlight(e) {
    if (selectpj[0]) selectpj[0].className = '';
    e.target.parentNode.className = 'selectpj';
}
var table = document.getElementById('addroomTB'),
    selectpj = table.getElementsByClassName('selectpj');
table.onclick = highlight;
// add project
function pjselect(){
    var addpj = $("tr.selectpj td:first").html();
}
