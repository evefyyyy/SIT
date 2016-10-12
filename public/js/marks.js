$(document).on("change", ".score", function() {
    var sum = 0;
    $(".score").each(function(){
        sum += +$(this).val();
    });
     $("#subtotal").html(sum);
});