@extends('advTmp')
@section('content')
<div class="row" id="editroom">
	<form id="sendmarks" action="/exam/round/{{$round}}" method="post">
	<input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
	<div class="hidden-xs col-md-1 col-lg-2"></div>
	<div class="col-xs-12 col-md-10 col-lg-8">
	<h2>exam round {{$round}}</h2>
	@if($roomExam == null)
		<h4 class="text-center noProject">You did not have permission in this exam.</h4>
	@else
	<div class="row">
		<div class="col-xs-2 col-md-3 col-lg-3 titlee">room</div>
		<div class="col-xs-2 col-md-2 col-lg-2">{{$roomExam[0]->room_name}}</div>
		<div class="col-xs-2 col-md-2 col-lg-2 titlee">date</div>
		<div class="col-xs-6 col-md-5 col-lg-5">
			{{date('d F Y',strtotime($roomExam[0]->exam_datetime))}} ({{date('g:ia',strtotime($roomExam[0]->exam_starttime))}} - {{date('g:ia',strtotime(end($roomExam)->exam_endtime))}} )
		</div>
	</div>
	<div class="row">
		<div class="col-xs-3 col-md-3 col-lg-3 titlee">exam commitee</div>
		<div class="col-xs-9 col-md-8 col-lg-8">
			@foreach($advName as $adv)
				{{$adv}} ,
			@endforeach
		</div>
	</div>
	<div class="hidden-xs col-md-1 col-lg-2"></div>
	</div>
</div>
<div class="row" id="marksTB">
	<div class="hidden-xs col-md-1 col-lg-2"></div>
	<div class="col-xs-12 col-md-10 col-lg-8">
	<table class="table table-bordered">
				<thead>
					<tr>
						<th>Project ID</th>
						<th>Project name</th>
						<th>give marks</th>
					</tr>
				</thead>
				<tbody>
					@foreach($project as $pj)
					<tr>
						<td>{{$pj[0]->group_project_id}}</td>
						<td id="name"><a class="tblink" href="/exam/round/{{$round}}/givemarks/{{$pj[0]->group_project_id}}">{{$pj[0]->group_project_th_name}}</a></td>
						@if($pj['grade'] != null)
						<td><i class="glyphicon glyphicon-ok"></i></td>
						@else
						<td></td>
						@endif
					</tr>
					@endforeach
				</tbody>
			</table>
			<div id="center">
				@if($submitted == null)
			  	<a href="/exam/round"><button class="action-button" type="button">back</button></a>
			  	<button class="action-button cd-popup-trigger">submit</button>
				@else
					<a href="/exam/round"><button class="action-button" type="button">back</button></a>
				@endif
			</div>
	</div>
		</form>
	<div class="hidden-xs col-md-1 col-lg-2"></div>
<div class="cd-popup" role="alert">
	<div class="cd-popup-container">
		<p>You cannot give or edit marks after submitted. Please ensure your marks before submit.</p>
		<ul class="cd-buttons">
			<li><a class="cd-close">cancel</a></li>
			<li><a class="cd-submit">submit</a></li>
		</ul>
		<a class="cd-popup-close cd-close img-replace"></a>
	</div> <!-- cd-popup-container -->
</div> <!-- cd-popup -->
</div>
@endif
<script src="{!! URL::asset('js/approve.js') !!}"></script>
<script>
$(document).ready(function($){
	  //close popup and delete panel
	  	$('.cd-popup').on('click', function(event){
	  	 if( $(event.target).is('.cd-submit') ) {
	  		event.preventDefault();
	  		$(this).fadeOut(400);
	  		$('#sendmarks').submit();
	  		}
	 	 });
	});
</script>
@stop
