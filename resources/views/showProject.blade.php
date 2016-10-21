@extends('generalTmp')
@section('content')
<link href="{!! URL::asset('css/eagle.gallery.min.css') !!}" rel="stylesheet">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link href="{!! URL::asset('css/contact-buttons.css') !!}" rel="stylesheet">
<?php $link = url()->current(); ?>
<input type="hidden" id="linkurl" value="{{$link}}"></div>
<div id="detail">
	<div class="row">
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
			@if($poster != null)
			<img src="{{$poster}}" class="cover">
			@else
			<img src="/img/no-poster.png" class="cover">
			@endif
		</div>
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
	</div>
	<div class="row">
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
		@if(Auth::user()->user_student != null)
		<?php
		$objs = Auth::user()->user_student->student->student_id;
		$checkStd = DB::table('students')->where('student_id',$objs)->value('id');
		$projectId = DB::table('project_students')->where('student_pkid',$checkStd)->value('project_pkid');
		?>
			@if($projectId == $checkProject)
		<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
			<h3>{{$projectNameEN}}</h3>
			<h4>{{$projectNameTH}}</h4>
		</div>
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 btn-save">

			<form action="{{url('student/myproject/edit/'.$checkProject.'/edit')}}" method="get">
				<button style="float:right" class="btn btn-browse" onclick="window.location.href='/student/myproject/edit'">edit my project</button>
			</form>
		</div>
			@else
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
			<h3>{{$projectNameEN}}</h3>
			<h4>{{$projectNameTH}}</h4>
		</div>
			@endif
		@else
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
			<h3>{{$projectNameEN}}</h3>
			<h4>{{$projectNameTH}}</h4>
		</div>
		@endif

		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
	</div>
	<div class="row">
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
			<div class="panel panel-info">
				<div class="panel-heading">details</div>
				<div class="panel-body">
					<div class="col-lg-12 text">
						{{$detail}}
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
	</div>
	<div class="row">
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
		<div class="col-xs-10 col-sm-10 col-md-5 col-lg-5">
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
			@if($video != null)
			<div id="img-gallery" class="eagle-gallery img300">
				<div class="owl-carousel">
					@foreach($screenshot as $img)
					<img src="{{$img->picture_path_name}}" data-medium-img="{{$img->picture_path_name}}" data-big-img="{{$img->picture_path_name}}">
					@endforeach
				</div>
			</div>
			@endif
		</div>
		<div class="col-xs-1 col-sm-1 hidden-md hidden-lg"></div>
		<div class="col-xs-12 col-sm-12 hidden-md hidden-lg"></div>
		<div class="col-xs-1 col-sm-1 hidden-md hidden-lg"></div>
		<div class="col-xs-10 col-sm-10 col-md-5 col-lg-5">
			<div class="panel panel-info">
				<div class="panel-heading">author</div>
				<div class="panel-body">
					@foreach($student as $st)
					<div class="col-xs-6 col-md-6 col-lg-6 text">{{$st->student_name}}</div>
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
				{!! $video !!}
			</div>
		</div>
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
	</div>
	@else
	<!-- in case no video -->
	@if($screenshot != null)
			<div id="img-gallery" class="eagle-gallery img300">
				<div class="owl-carousel">
					@foreach($screenshot as $img)
					<img src="{{$img->picture_path_name}}" data-medium-img="{{$img->picture_path_name}}" data-big-img="{{$img->picture_path_name}}">
					@endforeach
				</div>
			</div>
		</div>
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
	@endif
	@endif
</div>
<script src="{!! URL::asset('js/eagle.gallery.min.js') !!}"></script>
<script src="{!! URL::asset('js/contact-buttons.js') !!}"></script>
<script>
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
</script>
@stop
