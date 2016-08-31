@extends('stdTmp')
@section('content')
	<div id="waitApp">
	<div class="proname">{{$projectNameEN}}</div>
	<div class="proname">{{$projectNameTH}}</div>
	<div id="center"><div class="title">Type :</div><div class="info infoType">{{$types}}</div>
	<div class="title">Category :</div><div class="info">{{$categories}}</div></div>

	<div class="title" id="head">Team members</div>
		<table class="teammem">
			@foreach($std as $s)
			<tr>
				<td>Student no. {{$s->student_id}}</td>
				<td>{{$s->student_prefix}}{{$s->student_fname}} {{$s->student_lname}}</td>
			</tr>
			@endforeach
		</table>
	<div class="title" id="head">Advisor</div>
	<div class="row" style="margin-bottom:10px">
		<div class="col-lg-3"></div>
		<div class="col-lg-3">
			@foreach($advisors as $adv)
				<p>{{$adv->prefix}}{{$adv->advisor_fname}} {{$adv->advisor_lname}}</p>
			@endforeach
		</div>
		<div class="col-lg-6"><th rowspan="2"><img height="50" src="/img/waitApprove.png"></th></div>
	</div>
	<div class="row">
		<div class="title" id="uploaded">
				Already uploaded file <span class="glyphicon glyphicon-ok"></span>
		</div>
				<div class="col-lg-12" id="center">
					<a href="{{url('student/myproject/create/'.$obj.'/edit')}}"><< back to edit project</a>
				</div>
	</div>
	</div>
	</div>
@stop
