//select type
$(function () {
		$('.selecttype').selectpicker({
		});
		$('.selecttemp').selectpicker({
		});
	});
$(document).ready(function(){
    $("select").change(function(){
        $(this).find("option:selected").each(function(){
            if($(this).attr("value")=="research"){
                $(".box").not(".research").hide();
                $(".research").show();
            }
            else if($(this).attr("value")=="business"){
                $(".box").not(".business").hide();
                $(".business").show();
            }
            else if($(this).attr("value")=="social"){
                $(".box").not(".social").hide();
                $(".social").show();
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

