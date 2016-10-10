@extends('adminTmp')
@section('content')
<div id="scoresheet">
	<h2><img height="45" src="/img/exam.png">manage criteria</h2>
	<div class="row">
		<div class="col-xs-1 col-md-3 col-lg-3"></div>
		<div class="col-xs-10 col-md-6 col-lg-6">
					<div class="control-group" id="fields">
						<h5>main criteria</h5>
						<div class="controls">
							<form role="form" autocomplete="off" action="{{$url}}" method="post">
									<input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
								@if($count != 0)
								@foreach($mainCriteria as $main)
								<div class="entry input-group">
									<input class="form-control" name="mainfields[]" type="text" placeholder="Type something" value="{{$main}}"/>
									<span class="input-group-btn">
										<button class="btn btn-success btn-add" type="button">
											<span class="glyphicon glyphicon-plus"></span>
										</button>
									</span>
								</div>
								@endforeach
								@else
								<div class="entry input-group">
									<input class="form-control" name="mainfields[]" type="text" placeholder="Type something"/>
									<span class="input-group-btn">
										<button class="btn btn-success btn-add" type="button">
											<span class="glyphicon glyphicon-plus"></span>
										</button>
									</span>
								</div>
								@endif
							<small>Press <span class="glyphicon glyphicon-plus gs"></span> to add another criteria</small>
						</div>
					</div>
		</div>
		<div class="col-xs-1 col-md-3 col-lg-3"></div>
	</div>
	<div id="center">
	  <a><button class="action-button" onclick="back()">back</button></a>
	  <button type="submit" class="action-button">save</button>
	</div>
	</form>
</div>
<script>
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
		$(this).parents('.entry:first').remove();

		e.preventDefault();
		return false;
	});
});
function back() {
		window.history.back()
}
</script>
@stop
