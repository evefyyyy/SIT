$(document).ready(function() {
		var str = $("div.tools").html();
		$("div.tools").html(str.replace(/\n/g, "<br />"));

	}
	);
	WebFontConfig = {
		google: { families: [ 'Lato:400,700,300:latin' ] }
	};
	(function() {
		var wf = document.createElement('script');
		wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
		'://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
		wf.type = 'text/javascript';
		wf.async = 'true';
		var s = document.getElementsByTagName('script')[0];
		s.parentNode.insertBefore(wf, s);
	})();

// Initialize Share-Buttons
$.contactButtons({
	effect  : 'slide-on-scroll',
	buttons : {
		'facebook':   { class: 'facebook', use: true, extras: 'target="_blank"' },
		'twitter':    { class: 'twitter',   use: true, },
		'linkedin':   { class: 'linkedin', use: true, },
		'google':     { class: 'gplus',    use: true, },
		'pinterest':  { class: 'pinterest', use: true, },
		'email':      { class: 'email',    use: true, link: 'test@web.com' }
	}
});
$('#img-gallery').eagleGallery({
	miniSliderArrowStyle: 2,
	theme: 'light',
	autoPlayMediumImg: 3000,
	maxZoom: 2
});

jQuery(document).ready(function($){
	//open popup
	$('.btn-3e').on('click', function(event){
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
	//close popup when clicking the esc keyboard button
	$(document).keyup(function(event){
    	if(event.which=='27'){
    		$('.cd-popup').removeClass('is-visible');
	    }
    });

});