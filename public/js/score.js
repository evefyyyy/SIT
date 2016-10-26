//select type
$(function () {
	$('.selecttype').selectpicker({
	});
	$('.selecttemp').selectpicker({
	});
});
$(document).ready(function(){
    $(".box").hide();
    $("select.selecttype").change(function(){
        $(this).find("option:selected").each(function(){
            var x = $(this).attr("value");
            // console.log($(this).attr("value"))
            if($(this).attr("value")==x){
                $(".box").not("."+x).hide();
                $("."+x).show();
                $(".subClear").each(function(){
                  $(this).val('');
                })
                $(".totalClear").each(function(){
                  $(this).html('');
                })
            }
            else{
              console.log('else')
                $(".box").hide();
            }
        });
    }).change();
});
$(document).ready(function(){
    $(".box").hide();
    $("select.selecttemp").change(function(){
        $(this).find("option:selected").each(function(){
            var x = $(this).attr("value");
            // console.log($(this).attr("value"))
            if($(this).attr("value")==x){
                $(".box").not("."+x).hide();
                $("."+x).show();
                $(".subClear").each(function(){
                  $(this).val('');
                })
                $(".totalClear").each(function(){
                  $(this).html('');
                })
            }
            else{
              console.log('else')
                $(".box").hide();
            }
        });
    }).change();
});
$('.checkvalue').click(function(){
  $i = $('.checkvalue').length;
  $x = 1;
  for($x=1;$x<=$i;$x++){
  if($("#subtotal"+$x).html() != 100){
    $('#alert'+$x).show();
  } else {
    if ($('#alert'+$x).show()) {
      $('#alert'+$x).hide();
    } else {
      $('#alert'+$x).hide();
    }
  }
}
});
