@extends('stdTmp')
@section('content')
<div id="waitApp">
	<div class="row">
		<div class="col-xs-1 col-sm-1 col-md-2 col-lg-2"></div>
		<div class="col-xs-10 col-sm-10 col-md-8 col-lg-8">
			<div class="proname">{{$projectNameEN}}<br>{{$projectNameTH}}</div>
		</div>
		<div class="col-xs-1 col-sm-1 col-md-2 col-lg-2"></div>
	</div>
	<div class="row">
		<div class="col-xs-1 col-sm-1 col-md-3 col-lg-3"></div>
		<div class="col-xs-10 col-sm-10 col-md-6 col-lg-6">
			<div id="center"><div class="title">Type :</div><div class="info infoType">{{$types}}</div>
			<div class="title">Category :</div><div class="info">{{$categories}}</div></div>
	<div class="title" id="head">Team members</div>
	<table class="teammem">
		@foreach($std as $s)
		<tr>
			<td>Student no. {{$s->student_id}}</td>
			<td>{{$s->student_name}}</td>
		</tr>
		@endforeach
	</table>
	<div class="title" id="head">Advisor</div>
		<table class="teammem">
			<tbody>
				<?php
					$count = count($advisors);
				 ?>
			@if($count == 1)
			<tr><td width="25%"><strong>Main advisor</strong>{{$advisors[0]->advisor_name}}</td></tr>
			@else
			<tr><td width="25%"><strong>Main advisor</strong>{{$advisors[0]->advisor_name}}</td></tr>
			<tr><td><strong>Co-advisor</strong>{{$advisors[1]->advisor_name}}</td></tr>
			@endif
			</tbody>
		</table>
	</div>
	<div class="col-xs-1 col-sm-1 col-md-3 col-lg-3"></div>
</div>
<div class="row" style="padding-top:20px">
		<div class="col-xs-1 col-sm-1 col-md-3 col-lg-3"></div>
		<div class="col-xs-10 col-sm-10 col-md-6 col-lg-6">
		<div class="title">
			Already uploaded first draft proposal <span class="glyphicon glyphicon-ok"></span>
		</div>
		<img height="50" src="/img/waitApprove.png"></td>
		<div class="col-lg-12" id="center">
			<a href="{{url('student/myproject/create/'.$obj.'/edit')}}"><< back to edit project</a>
		</div>
	</div>
	<div class="col-xs-1 col-sm-1 col-md-3 col-lg-3"></div>
	</div>
</div>
@stop
