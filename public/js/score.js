//select type
$(function () {
	$('.selecttype').selectpicker({
	});
	$('.selecttemp').selectpicker({
	});
});
$(document).ready(function(){
    $("select.selecttemp").change(function(){
        $(this).find("option:selected").each(function(){
            if($(this).attr("value")=="temp1"){
                $(".box").not(".temp1").hide();
                $(".temp1").show();
            }
            else if($(this).attr("value")=="temp2"){
                $(".box").not(".temp2").hide();
                $(".temp2").show();
            }
            else if($(this).attr("value")=="temp3"){
                $(".box").not(".temp3").hide();
                $(".temp3").show();
            }
            else{
                $(".box").hide();
            }
        });
    }).change();
});
function back() {
		window.history.back()
	}

