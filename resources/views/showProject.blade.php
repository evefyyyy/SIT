@extends('generalTmp')
@section('content')
<link href="{!! URL::asset('css/eagle.gallery.min.css') !!}" rel="stylesheet">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link href="{!! URL::asset('css/contact-buttons.css') !!}" rel="stylesheet">
<?php $link = url()->current(); ?>
<input type="hidden" id="linkurl" value="{{$link}}"></div>
<div id="detail">
	<div class="row">
		<div class="col-hidden-xs col-sm-1 col-md-1 col-lg-1"></div>
		<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
			@if($poster != null)
			<img src="{{$poster}}" class="cover">
			@else
			<img src="/img/no-poster.png" class="cover">
			@endif
		</div>
		<div class="col-hidden-xs col-sm-1 col-md-1 col-lg-1"></div>
	</div>
	<div class="row">
		<div class="col-hidden-xs col-sm-1 col-md-1 col-lg-1"></div>
		@if(Auth::check())
		@if(Auth::user()->user_student != null)
		<?php
		$objs = Auth::user()->user_student->student->student_id;
		$checkStd = DB::table('students')->where('student_id',$objs)->value('id');
		$projectId = DB::table('project_students')->where('student_pkid',$checkStd)->value('project_pkid');
		?>
		@if($projectId == $checkProject)
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
			<h3>{{$projectNameEN}}</h3>
			<h4>{{$projectNameTH}}</h4>
		</div>
		<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 btn-save">

			<form action="{{url('student/myproject/edit')}}" method="get">
				<button style="float:right" class="btn btn-browse" onclick="window.location.href='/student/myproject/edit'">edit my project</button>
			</form>
		</div>
		@else
		<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
			<h3>{{$projectNameEN}}</h3>
			<h4>{{$projectNameTH}}</h4>
		</div>
		@endif

		@endif
		@else
		<div class="col-xs-12 col-sm-7 col-md-8 col-lg-8">
			<h3>{{$projectNameEN}}</h3>
			<h4>{{$projectNameTH}}</h4>
		</div>
		<div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
			<a class="btn3 btn-3 btn-3e">vote<i class="glyphicon glyphicon-star"></i></a>
		</div>
		@endif
		<div class="col-hidden-xs col-sm-1 col-md-1 col-lg-1"></div>
	</div>
	<div class="row">
		<div class="col-hidden-xs col-sm-1 col-md-1 col-lg-1"></div>
		<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
			<div class="panel panel-info">
				<div class="panel-heading">details</div>
				<div class="panel-body">
					<div class="col-lg-12 text">
						{{$detail}}
					</div>
				</div>
			</div>
		</div>
		<div class="col-hidden-xs col-sm-1 col-md-1 col-lg-1"></div>
	</div>
	<div class="row">
		<div class="col-hidden-xs col-sm-1 col-md-1 col-lg-1"></div>
		<div class="col-xs-12 col-sm-10 col-md-5 col-lg-5">
			@if($groupPic != null)
			<img src="{{$groupPic}}" class="group-member img-thumbnail">
			@else
			<img src="/img/no-image.png" class="group-member img-thumbnail">
			@endif
			<div class="panel panel-info">
				<div class="panel-heading">tools & techniques</div>
				<div class="panel-body">
					<div class="col-lg-12 tools">{!!$tools!!}</div>
				</div>
			</div>
			@if($video != null && $screenshot != null)
			<div id="img-gallery" class="eagle-gallery img300">
				<div class="owl-carousel">
					@foreach($screenshot as $img)
					<img src="{{$img->picture_path_name}}" data-medium-img="{{$img->picture_path_name}}" data-big-img="{{$img->picture_path_name}}">
					@endforeach
				</div>
			</div>
			@endif
		</div>
		<div class="col-hidden-xs col-sm-1 hidden-md hidden-lg"></div>
		<div class="col-hidden-xs col-sm-12 hidden-md hidden-lg"></div>
		<div class="col-hidden-xs col-sm-1 hidden-md hidden-lg"></div>
		<div class="col-xs-12 col-sm-10 col-md-5 col-lg-5">
			<div class="panel panel-info">
				<div class="panel-heading">author</div>
				<div class="panel-body">
					@foreach($student as $st)
					<div class="col-xs-6 col-md-6 col-lg-6 text fullname">{{$st->student_name}}</div>
					<div class="col-xs-6 col-md-6 col-lg-6 text">รหัสนักศึกษา {{$st->student_id}}</div>
					<div class="col-xs-6 col-md-6 col-lg-6"></div>
					<div class="col-xs-6 col-md-6 col-lg-6 mail"><img height="11" src="/img/email.png"> {{$st->student_email}}</div>
					@endforeach
				</div>
			</div>
			<div class="panel panel-info">
				<div class="panel-heading">advisor</div>
				<div class="panel-body">
					@foreach($advisors as $adv)
					<div class="col-lg-12 text">{{$adv->advisor_name}}</div>
					@endforeach
				</div>
			</div>
			@if($video != null)
			<div class="embed-responsive embed-responsive-16by9">
				<iframe width="1280" height="720" src="{!! $video !!}" frameborder="0" allowfullscreen></iframe>
			</div>
		</div>
		<div class="col-hidden-xs col-sm-1 col-md-1 col-lg-1"></div>
	@endif
	<!-- in case no video -->
	@if($screenshot != null && $video == null)
	<div id="img-gallery" class="eagle-gallery img300">
		<div class="owl-carousel">
			@foreach($screenshot as $img)
			<img src="{{$img->picture_path_name}}" data-medium-img="{{$img->picture_path_name}}" data-big-img="{{$img->picture_path_name}}">
			@endforeach
		</div>
	</div>
</div>
<div class="col-hidden-xs col-sm-1 col-md-1 col-lg-1"></div>
@endif

<div class="cd-popup" role="alert">
    <div class="col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6">
    <div class="cd-popup-container">
       <img src="/img/dday.png">
       <p>Enter your code to vote</p>
       	<p><strong>" {{$projectNameEN}} "</strong></p>
       <input class="form-control"/>
       <ul class="cd-buttons">
          <li><a class="cd-vote">Vote</a></li>
      </ul>
      <a class="cd-popup-close cd-close img-replace"></a>
  	</div> <!-- cd-popup-container -->
  </div>
</div> <!-- cd-popup -->
</div>
<script src="{!! URL::asset('js/eagle.gallery.min.js') !!}"></script>
<script src="{!! URL::asset('js/contact-buttons.js') !!}"></script>
<script src="{!! URL::asset('js/dday.js') !!}"></script>
@stop
