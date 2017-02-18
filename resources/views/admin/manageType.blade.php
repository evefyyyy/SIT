@extends('setting')
@section('content')
<div id="set">
<h2><img height="45" src="/img/setting.png">project type</h2>
<div class="row">
		<div class="col-xs-1 col-md-3 col-lg-4"></div>
		<div class="col-xs-10 col-md-6 col-lg-4">
					<div class="control-group" id="fields">
						<div class="controls">
								<form role="form" autocomplete="off" method="post">
								@foreach($alltype as $type)
								<div class="entry input-group">
									<input class="form-control" type="text" placeholder="Type something" value="{{$type->type_name}}" />
									<span class="input-group-btn">
										<button class="btn btn-success btn-add" type="button">
											<span class="glyphicon glyphicon-plus"></span>
										</button>
									</span>
								</div>
								@endforeach
						</div>
					</div>
					<small>Press <span class="glyphicon glyphicon-plus gs"></span> to add another type</small>
					</div>
		<div class="col-xs-1 col-md-43 col-lg-4"></div>
	</div>
	<div id="center">
	  <button class="action-button cancel">cancel</button>
	  <button type="submit" class="action-button save">save</button>
	</div>
	</form>
	<div class="cd-popup" role="alert">
	    <div class="cd-popup-container">
	       <p>This type cannot be deleted.</p>
	      <a class="cd-popup-close cd-close img-replace"></a>
	      <ul class="cd-buttons">
	          <li><a class="cd-close">OK</a></li>
     	 </ul>
	  </div> <!-- cd-popup-container -->
	</div> <!-- cd-popup -->
</div>
<script>
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

$(function()
{
	$(document).on('click', '.btn-add', function(e)
	{
		e.preventDefault();

		var controlForm = $('.controls form:first'),
		currentEntry = $(this).parents('.entry:first'),
		newEntry = $(currentEntry.clone()).appendTo(controlForm);

		newEntry.find('input').val('');
		controlForm.find('.entry:not(:last) .btn-add')
		.removeClass('btn-add').addClass('btn-remove')
		.removeClass('btn-success').addClass('btn-danger')
		.html('<span class="glyphicon glyphicon-minus"></span>');
	}).on('click', '.btn-remove', function(e)
	{
		// if () {
			$(this).parents('.entry:first').remove();
		// } else {
		// 	$('.cd-popup').addClass('is-visible');
		// }
	});
});
</script>
@stop