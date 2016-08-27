$(document).ready(function(){
 $(".delete").on('click',function(){
       $(this).parent().parent().parent().fadeOut(400);
     });
});

$(function() {
	var count = $('#pendingTable').find('tbody tr').length;
        $('#rowCount').html(count);
 });

jQuery(document).ready(function($){
	//open popup
	$('.cd-popup-trigger').on('click', function(event){
		event.preventDefault();
		$('.cd-popup').addClass('is-visible');
	});
	
	//close popup
	$('.cd-popup').on('click', function(event){
		if( $(event.target).is('.cd-close') || $(event.target).is('.cd-popup') ) {
			event.preventDefault();
			$(this).removeClass('is-visible');
		}
	});
	//close popup and delete row
	$('.cd-popup').on('click', function(event){
		if( $(event.target).is('.cd-delete') ) {
			event.preventDefault();
			$(this).removeClass('is-visible');
		}
	});
	//close popup when clicking the esc keyboard button
	$(document).keyup(function(event){
    	if(event.which=='27'){
    		$('.cd-popup').removeClass('is-visible');
	    }
    });
});