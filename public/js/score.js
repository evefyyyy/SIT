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

$(document).on("change", ".score1", function() {
    var sum = 0;
    $(".score1").each(function(){
        sum += +$(this).val();
    });
     $("#subtotal1").html(sum);
});
$(document).on("change", ".score2", function() {
    var sum = 0;
    $(".score2").each(function(){
        sum += +$(this).val();
    });
     $("#subtotal2").html(sum);
});
$(document).on("change", ".score3", function() {
    var sum = 0;
    $(".score3").each(function(){
        sum += +$(this).val();
    });
     $("#subtotal3").html(sum);
});
$(document).on("change", ".score4", function() {
    var sum = 0;
    $(".score4").each(function(){
        sum += +$(this).val();
    });
     $("#subtotal4").html(sum);
});
$(document).on("change", ".main1", function() {
    var sum = 0;
    $(".main1").each(function(){
        sum += +$(this).val();
    });
     $("#maintotal1").html(sum);
});
function countTotal() {
  if($("#maintotal1").html() != 100){
    $('#warning').html( "total must be 100%" );
  } else {
    $('#warning').html( "" );
  }
}
function back() {
		window.history.back()
}
// <div class="alert alert-danger" role="alert">
//      <a class="close" data-dismiss="alert">×</a>
//      <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
//      Total score must be 100
//    </div>