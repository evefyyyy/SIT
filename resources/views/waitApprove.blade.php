@extends('stdTmp')
@section('content')
	<div id="waitApp">
	<div class="proname">{{$projectNameEN}}</div>
	<div class="proname">{{$projectNameTH}}</div>
	<div id="center"><div class="title">Category :</div><div class="info">{{$categories}}</div>
	<div class="title">Additional Category :</div><div class="info">{{$types}}</div></div>
	<div class="title" id="head">Team members</div>
		<table class="teammem">
			<tr>
				<td>Student no. {{$stdId1}}</td>
				<td>{{$stdName1}}</td>
			</tr>
			<tr>
				<td>Student no. {{$stdId2}}</td>
				<td>{{$stdName2}}</td>
			</tr>
			<tr>
				<td>Student no. {{$stdId3}}</td>
				<td>{{$stdName3}}</td>
			</tr>
		</table>
	<div class="title" id="head">Advisor</div>
		<table class="teammem">
			<tr>
				<td>อ.พิเชฎฐ์ ลิ้มวชิรานันต์</td>
				<th rowspan="2"><img height="50" src="/img/waitApprove.png"></th>
			</tr>
			<tr>
				<td>อ.เอกพงษ์ จึงเจริญสุขยิ่ง</td>
			</tr>
		</table>
		<div id="center">
		<a href="/student/myproject/create"><< back to edit project</a>
		</div>
	</div>
	</div>
@stop
