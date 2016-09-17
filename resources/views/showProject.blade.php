@extends('generalTmp')
@section('content')
<link href="{!! URL::asset('css/ninja-slider.css') !!}" rel="stylesheet">
<script src="{!! URL::asset('js/ninja-slider.js') !!}"></script>
<div id="detail">
	<div class="row">
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
			<img src="{{$poster}}" class="cover">
		</div>
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
	</div>
	<div class="row">
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
		<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
			<h3>{{$projectNameEN}}</h3>
			<h4>{{$projectNameTH}}</h4>
		</div>
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 btn-save">
		<form class="" action="{{url('student/myproject/edit/'.$checkProject.'/edit')}}" method="get">
			<button style="float:right" class="btn btn-browse" onclick="window.location.href='/student/myproject/edit'">edit my project</button>
		</form>
		</div>
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
			<img src="{{$groupPic}}" class="group-member img-thumbnail">
			<div class="panel panel-info">
				<div class="panel-heading">tools & techniques</div>
				<div class="panel-body">
					<div class="col-lg-12">
						{{$tools}}
					</div>
				</div>
			</div>
		<div id='ninja-slider'>
        <div>
            <div class="slider-inner">
                <ul>
										@foreach($screenshot as $img)
                    <li><a class="ns-img" href="{{$img->picture_path_name}}"></a></li>
										@endforeach
                </ul>
                <div class="fs-icon" title="Expand/Close"></div>
            </div>
            <div id="thumbnail-slider">
                <div class="inner">
                    <ul>
												@foreach($screenshot as $img)
                        <li>
                            <a class="thumb" href="{{$img->picture_path_name}}"></a>
                        </li>
												@endforeach
                    </ul>
                </div>
            </div>
        </div>
   		</div>
		</div>
		<div class="col-xs-1 col-sm-1 hidden-md hidden-lg"></div>
		<div class="col-xs-12 col-sm-12 hidden-md hidden-lg"></div>
		<div class="col-xs-1 col-sm-1 hidden-md hidden-lg"></div>
		<div class="col-xs-10 col-sm-10 col-md-5 col-lg-5">
		<div class="panel panel-info">
			<div class="panel-heading">author</div>
			<div class="panel-body">
			<div class="col-xs-6 col-md-6 col-lg-6 text">{{$stdName1}}</div>
			<div class="col-xs-6 col-md-6 col-lg-6 text">รหัสนักศึกษา {{$stdId1}}</div>
			<div class="col-xs-6 col-md-6 col-lg-6"></div>
			<div class="col-xs-6 col-md-6 col-lg-6 mail"><img height="11" src="/img/email.png"> {{$email1}}</div>
			<div class="col-xs-6 col-md-6 col-lg-6 text">{{$stdName2}}</div>
			<div class="col-xs-6 col-md-6 col-lg-6 text">รหัสนักศึกษา {{$stdId2}}</div>
			<div class="col-xs-6 col-md-6 col-lg-6"></div>
			<div class="col-xs-6 col-md-6 col-lg-6 mail"><img height="11" src="/img/email.png"> {{$email2}}</div>
			<div class="col-xs-6 col-md-6 col-lg-6 text">{{$stdName3}}</div>
			<div class="col-xs-6 col-md-6 col-lg-6 text">รหัสนักศึกษา {{$stdId3}}</div>
			<div class="col-xs-6 col-md-6 col-lg-6"></div>
			<div class="col-xs-6 col-md-6 col-lg-6 mail"><img height="11" src="/img/email.png"> {{$email3}}</div>
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
		<div class="embed-responsive embed-responsive-16by9">
			<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/TW9sK8G2eW4"></iframe>
		</div>
		</div>
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
	</div>
	<!-- in case no video -->
<!-- <div class="row">
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
			<div id='ninja-slider'>
        <div>
            <div class="slider-inner">
                <ul>
										@foreach($screenshot as $img)
                    <li><a class="ns-img" href="{{$img->picture_path_name}}"></a></li>
        						@endforeach
                </ul>
                <div class="fs-icon" title="Expand/Close"></div>
            </div>
            <div id="thumbnail-slider">
                <div class="inner">
                    <ul>
												@foreach($screenshot as $img)
                        <li>
                            <a class="thumb" href="{{$img->picture_path_name}}"></a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
   		</div>
		</div>
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
	</div> -->
</div>
@stop
