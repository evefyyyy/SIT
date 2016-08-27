$(document).ready(function(){
 $(".delete").on('click',function(){
       $(this).parent().parent().parent().fadeOut(400);
     });
});

$(document).ready(function(){
    $('#rowCount').html(str + $('#pendingTable').children().children().length);
});