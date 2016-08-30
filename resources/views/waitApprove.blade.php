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
		<table class="teammem">
			@foreach($advisors as $adv)
			<tr>
				<td>{{$adv->prefix}}{{$adv->advisor_fname}} {{$adv->advisor_lname}}</td>
			</tr>
			@endforeach
				<th rowspan="2"><img height="50" src="/img/waitApprove.png"></th>
		</table>
		<div id="center">
		<a href="/student/myproject/create"><< back to edit project</a>
		</div>
	</div>
	</div>
@stop
