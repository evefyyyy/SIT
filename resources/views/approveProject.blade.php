@extends('adminTmp')
@section('content')
		<table class="table" id="pendingTable">
		<thead>
			<tr>
				<th>
					{{$countProject}} Pending Projects
				</th>
			</tr>
		</thead>
		<tbody>
		@foreach($project as $pj)
		 <tr>
	        <table class="table table-responsive pending">
	          <tr>
			    <th rowspan="2" style="width:15%">Project name<span>:</span></th>
			    <td colspan="4" rowspan="2" style="width:60%" id="name">{{$pj->groupProject->group_project_eng_name}}<br>{{$pj->groupProject->group_project_th_name}}</td>
			    <td rowspan="3" style="width:35%">
			    	<button class="delete approvebt">approve</button>

					<button class="rejectbt cd-popup-trigger">reject</button>

			    	<input type="text" class="form-control" />
			    </td>
			  </tr>
			  <tr>
			  </tr>
			  <tr>
			    <th>Type<span>:</span></th>
			    <td style="width:15%">{{$pj->groupProject->type->type_name}}</td>
			    <th style="width:15%">Category<span>:</span></th>
			    <td style="width:15%">{{$pj->groupProject->category->category_name}}</td>
			    <th>Project id<span>:</span></th>
			  </tr>
			  <tr>
			    <th rowspan="3">Team member<span>:</span></th>
			    <?php $teams = App\ProjectStudent::where('project_pkid', $pj->project_pkid)->get(); ?>
			    <td>
			    @foreach($teams as $team)
			    	{{$team->student->student_id}}<br>
			    @endforeach
			    </td>
			    <td colspan="2">
			    
			    @foreach($teams as $team)
			    	{{ $team->student->student_fname." ".$team->student->student_lname }}<br>
			    @endforeach
			    </td>
			    <<?php $advisors = App\ProjectAdvisor::where('project_pkid', $pj->project_pkid)->get(); ?>
			    <th>Advisor<span>:</span></th>
			    <td>
			     @foreach($advisors as $key => $advisor)
			    	{{ $advisor->advisor->advisor_fname." ".$advisor->advisor->advisor_lname }}@if($key < 1)<label id="main">Main</label>@endif<br>
			    @endforeach
			    </td>
			  </tr>
	        </table>
	      </tr>
	      @endforeach
	       <!-- no pending project -->
	      	<!--<tr>
		 		<td colspan="4" class="no-project">no pending project</td>
		 	</tr> -->
		    </tbody>
			</table>
		<div class="cd-popup" role="alert">
			<div class="cd-popup-container">
				<p>Are you sure you want to reject this project?</p>
				<ul class="cd-buttons">
					<li><a class="cd-delete">Yes</a></li>
					<li><a class="cd-close">No</a></li>
				</ul>
				<a class="cd-popup-close cd-close img-replace"></a>
			</div> <!-- cd-popup-container -->
		</div> <!-- cd-popup -->
    	<script src="{!! URL::asset('js/approve.js') !!}"></script>
@stop
