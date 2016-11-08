@extends('adminTmp')
@section('content')
<div class="row news-head">
	<div class="hidden-xs col-md-1 col-lg-1"></div>
	<div class="col-xs-12 col-md-10 col-lg-10">
		<img height="45" src="/img/room.png"><label>manage exam room</label>
		<span id="pendlink">
			<a class="btn" id="create" href="{{url('exam/manageroom/create')}}"><i class="glyphicon glyphicon-plus" data-toggle="modal" data-target="#addDoc"></i>add room</a>
		</span>
	</div>
	<div class="hidden-xs col-md-1 col-lg-1"></div>
</div>
<div class="row" id="examroom">
	<div class="col-xs-1 col-md-3 col-lg-3"></div>
	<div class="col-xs-10 col-md-6 col-lg-6">
		@foreach($room as $rooms)
			<?php  
			$checkexamroom = App\RoomExam::where('room_id', $rooms->id)->first();
			?>
			@if($checkexamroom != null)
				<div class="panel panel-primary">
					<div class="panel-heading">{{$rooms->room_name}}
						<div class="btn-group pull-right">
							<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span> <span class="caret"></span></button>
							<div class="dropdown-menu">
								<li><a href="manageroom/preview/{{$rooms->id}}">preview</a></li>
								<li><a href="manageroom/create">edit</a></li>
								<li><a class="cd-popup-trigger">delete</a></li>
							</div>
						</div>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-xs-4 col-md-4 col-lg-4 titlee">room</div>
							<div class="col-xs-8 col-md-8 col-lg-8">{{$rooms->room_name}}</div>
						</div>
						<div class="row">
							<div class="col-xs-4 col-md-4 col-lg-4 titlee">date</div>
							<?php 
								$getexamroom = App\RoomExam::where('room_id', $rooms->id)->get();
								foreach($getexamroom as $ger){
									$examdate = new DateTime($ger->exam_datetime);
									$examtime_start = new DateTime($checkexamroom->exam_starttime);
									$examtime_end = new DateTime($ger->exam_endtime);
								}
								$advisor_room = App\RoomAdvisor::where('room_exam_id', $checkexamroom->id)->get();
							 ?>
							<div class="col-xs-8 col-md-8 col-lg-8">{{$examdate->format('d M Y')}} ({{$examtime_start->format('H:i')}}-{{$examtime_end->format('H:i')}})</div>
						</div>
						<div class="row">
							<div class="col-xs-4 col-md-4 col-lg-4 titlee">exam commitee</div>
							<div class="col-xs-8 col-md-8 col-lg-8">

							@foreach($advisor_room as $key => $ar)
								<span class="firstname">
								@if($key != 0)
									,
								@endif
								{{$ar->advisor->advisor_name}}
								</span>
							@endforeach
							</div>						
						</div>
					</div>
				</div>
			@endif
		@endforeach
	</div>
	<div class="col-xs-1 col-md-3 col-lg-3"></div>
</div>
<div class="cd-popup" role="alert">
	<div class="cd-popup-container">
		<p>Are you sure you want to delete this room?</p>
		<ul class="cd-buttons">
			<li><a class="cd-delete">Yes</a></li>
			<li><a class="cd-close">No</a></li>
		</ul>
		<a class="cd-popup-close cd-close img-replace"></a>
	</div> <!-- cd-popup-container -->
</div> <!-- cd-popup -->
<script src="{!! URL::asset('js/approve.js') !!}"></script>
<script>
	jQuery(document).ready(function($){
  //close popup and delete panel
  $('.cd-popup').on('click', function(event){
  	if( $(event.target).is('.cd-delete') ) {
  		event.preventDefault();
  		$(this).removeClass('is-visible');
  		$(this).fadeOut(400);
  	}
  });
});
</script>
@stop
