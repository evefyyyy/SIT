$(".score").ready( function() {
    var sum = 0;
    $(".score").each(function(){
        sum += +$(this).val();
    });
     $("#subtotal").html(sum);
});

$(".score").keyup( function() {
    var sum = 0;
    $(".score").each(function(){
        sum += +$(this).val();
    });
     $("#subtotal").html(sum);
});

$("table").ready(function(){
    var Total = 0;
    $("td:nth-child(3)").each(function () {
        var val = $(this).text().replace(" ", "").replace(",-", "");
        Total += parseInt(val);
    });
    $("#tsubtotal").html(Total);
});

$(function () {
	$('.selectgrade').selectpicker({
	});
});

$('#sendscore').submit( function(e) {
      if ($('.selectgrade span').html() == "-"){
            $('.selectgrade span').parent().addClass("required");
            e.preventDefault();
            return false;
        } else {
            $('.selectgrade span').parent().removeClass("required");
        }
});