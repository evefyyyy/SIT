@extends('adminTmp')
@section('content')
<div class="row" id="editroom">
	<div class="hidden-xs col-md-1 col-lg-2"></div>
	<div class="col-xs-12 col-md-10 col-lg-8">
		<h2>{{$room->room_name}}</h2>
		<div class="row">
			<div class="col-xs-2 col-md-3 col-lg-3 titlee">room</div>
			<div class="col-xs-3 col-md-3 col-lg-3">{{$room->room_name}}</div>
			<div class="col-xs-2 col-md-2 col-lg-2 titlee">date</div>
			<?php 
			$getexamroom = App\RoomExam::where('room_id', $room->id)->get();
			$firstexamroom = App\RoomExam::where('room_id', $room->id)->first();
			foreach($getexamroom as $ger){
				$examdate = new DateTime($ger->exam_datetime);
				$examtime_start = new DateTime($firstexamroom->exam_starttime);
				$examtime_end = new DateTime($ger->exam_endtime);
			}
			$advisor_room = App\RoomAdvisor::where('room_exam_id', $firstexamroom->id)->get();
			
			?>
			<div class="col-xs-5 col-md-4 col-lg-4">{{$examdate->format('d M Y')}} ({{$examtime_start->format('H:i')}}-{{$examtime_end->format('H:i')}})</div>
		</div>
		<div class="row">
			<div class="col-xs-3 col-md-3 col-lg-3 titlee">exam commitee</div>
			<div class="col-xs-9 col-md-8 col-lg-8">
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
	<div class="hidden-xs col-md-1 col-lg-2"></div>
</div>
<div class="row">
	<div id="roomTB">
		<table class="table table-bordered" style="width:90%">
			<thead>
				<tr>
					<th style="width:8%">project id</th>
					<th style="width:8%">exam time</th>
					<th style="width:10%">student id</th>
					<th style="width:18%">student name</th>
					<th style="width:34%">project name</th>
					<th style="width:6%">type</th>
					<th style="width:8%">main advisor</th>
					<th style="width:8%">co-advisor</th>
				</tr>
			</thead>
			<tbody>
				@foreach($getexamroom as $ger)
				<?php  
				$starttime = new Datetime($ger->exam_starttime);
				$endtime = new Datetime($ger->exam_endtime);
				$get_projectstudent = App\ProjectStudent::where('project_pkid', $ger->project_pkid)->get();
				$get_groupproject = App\GroupProject::where('id', $ger->project_pkid)->first();
				$get_type = App\Type::where('id', $get_groupproject->type_id)->first();
				$get_advisor = App\ProjectAdvisor::where('project_pkid', $ger->project_pkid)->get();
				?>
				<tr>
					<td>{{$get_groupproject->group_project_id}}</td>
					<td>{{$starttime->format('H:i')}} - {{$endtime->format('H:i')}}</td>
					<td>
					@foreach($get_projectstudent as $key => $pstd)
						<?php  
							$student = App\Student::where('id', $pstd->student_pkid)->first();
						?>
						<span>
							@if($key != 0)
							<br>
							@endif
							{{$student->student_id}}
						</span>
						@endforeach
					</td>
					<td>
						@foreach($get_projectstudent as $key => $pstd)
						<?php  
							$student = App\Student::where('id', $pstd->student_pkid)->first();
						?>
						<span>
							@if($key != 0)
							<br>
							@endif
							{{$student->student_name}}
						</span>
						@endforeach
					</td>
					<td>{{$get_groupproject->group_project_th_name}}</td>
					<td class="pjtype">{{$get_type->type_name}}</td>
					<?php  
						$advisorsNo1 = $get_advisor[0]->advisor->advisor_name;
						if(isset($get_advisor[1])){
							$advisorsNo2 = $get_advisor[1]->advisor->advisor_name;
						}
					?>
					<td class="firstname">{{$advisorsNo1}}</td>
					@if(isset($get_advisor[1]))
						<td class="firstname">{{$advisorsNo2}}</td>
						@else
						<td class="firstname"></td>
						@endif
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
<div class="row" id="center">
	<div class="col-xs-1 col-md-1 col-lg-1"></div>
	<div class="col-xs-10 col-md-10 col-lg-10">
		<button class="no-print action-button" onclick="back()">back</button>
		<button class="no-print action-button">submit</button>
	</div>
	<div class="col-xs-1 col-md-1 col-lg-1"></div>
</div>
@stop
