//select type
$(function () {
	$('.selecttype').selectpicker({
	});
	$('.selecttemp').selectpicker({
	});
});
$(document).ready(function(){
    $(".box").hide();   
    $("select.selecttemp").change(function(){
        $(this).find("option:selected").each(function(){
            var x = $(this).attr("value");
            if($(this).attr("value")==x){
                $(".box").not("."+x).hide();
                $("."+x).show();
            }
            else{
                $(".box").hide();
            }
        });
    }).change();
});
$('#main-order').multiSelect({ keepOrder: true });
    $('#sub-order').multiSelect({ keepOrder: true });
    $('#select-all').click(function(){
      $('#main-order').multiSelect('select_all');
      return false;
    });
    $('#deselect-all').click(function(){
      $('#main-order').multiSelect('deselect_all');
      return false;
    });
    $('#select-all1').click(function(){
      $('#sub-order').multiSelect('select_all');
      return false;
    });
    $('#deselect-all1').click(function(){
      $('#sub-order').multiSelect('deselect_all');
      return false;
    });
    function back() {
    window.history.back()
  }
function back() {
		window.history.back()
}


