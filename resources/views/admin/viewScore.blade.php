@extends('adminTmp')
@section('content')
<div class="row" id="editroom">
	<div class="col-xs-1 col-md-1 col-lg-2"></div>
	<div class="col-xs-10 col-md-10 col-lg-8">
	@foreach($project as $pj)
	<h2>{{$pj->group_project_id}}</h2>
	<div class="row head" id="center">
		<strong>{{$pj->group_project_eng_name}}</strong>{{$pj->group_project_th_name}}
	</div>
	<div class="row">
	</div>
	<div class="row">
		<div class="col-xs-2 col-md-3 col-lg-3 titlee">project type</div>
		<div class="col-xs-2 col-md-2 col-lg-2 type">{{$pj->type->type_name}}</div>
		<div class="col-xs-3 col-md-2 col-lg-2 titlee">main advisor</div>
		<div class="col-xs-5 col-md-5 col-lg-5">{{$pj->advisor[0]->advisor_name}}</div>
	</div>
	@if(count($pj->advisor)==2)
	<div class="row">
		<div class="col-xs-2 col-md-3 col-lg-3 titlee"></div>
		<div class="col-xs-2 col-md-2 col-lg-2 type"></div>
		<div class="col-xs-3 col-md-2 col-lg-2 titlee">co-advisor</div>
		<div class="col-xs-5 col-md-5 col-lg-5">{{$pj->advisor[1]->advisor_name}}</div>
	</div>
	@endif
	<div class="col-xs-1 col-md-1 col-lg-2"></div>
	@endforeach
	</div>
</div>

	<div class="row" id="viewmark">
	  <div class="col-xs-1 col-md-1 col-lg-2"></div>
	  <div class="col-xs-10 col-md-10 col-lg-8">
		@foreach($mainRound1 as $main1)
	    <p><strong>round {{$main1->round}}</strong> {{$main1->criteria_main_name}} ({{$main1->score}}%)</p>
		@endforeach
		<!-- <div class="row">
		   <div class="col-xs-3 col-md-2 col-lg-3"><strong>date</strong></div>
		   <div class="col-xs-9 col-md-10 col-lg-9">9 June 2016</div>
		</div> -->
		<div class="row">
		   <div class="col-xs-3 col-md-2 col-lg-3"><strong>exam commitee</strong></div>
		   <div class="col-xs-9 col-md-10 col-lg-9">
				 @foreach($commitee as $key => $com)
		   		<span class="titlee">c{{$key+1}}</span><span class="firstname">{{$com->advisor_name}}</span>&nbsp;
					@endforeach
		   	</div>
		</div>
	    <table class="table table-bordered" id="tb1">
	      <thead>
	       <tr>
	       		<th>criteria</th>
						@for($i=0; $i<$quantity; $i++)
	       		<th width="8%">c{{$i+1}}</th>
						@endfor
	       		<th width="15%">full marks</th>
	       </tr>
	     </thead>
	     <tbody>
				 @foreach($subRound1 as $sub1)
				 <tr>
					 <td>{{$sub1->criteria_sub_name}}</td>
					 @if($sub1->scoreRound1 != null)
					 	@if(count($commitee)==count($sub1->scoreRound1))
							@foreach($sub1->scoreRound1 as $score1)
							<td>{{$score1->score}}</td>
							@endforeach
						@else
							@foreach($sub1->scoreRound1 as $score1)
							<td>{{$score1->score}}</td>
							@endforeach
							<?php
								$start = count($sub1->scoreRound1);
								$end = count($commitee);
							 ?>
							@for($i=$start; $i<$end ;$i++)
								<td></td>
							@endfor
						@endif
					 @else
					 @foreach($commitee as $com)
					 <td></td>
					 @endforeach
					 @endif
					 <td>{{$sub1->score}}</td>
				 </tr>
				 @endforeach
	      </tbody>
	      <tfoot>
	      	<tr><th>total score</th>
						<?php $end = count($commitee); ?>
						@for($i=0; $i<$end ;$i++)
							<td></td>
						@endfor
						<td>100</td></tr>
					<tr><th>grade</th>
						@if($gradeRound1 != null)
							@if(count($gradeRound1) == count($commitee))
								@foreach($gradeRound1 as $grade1)
								<th>{{$grade1->grade}}</th>
								@endforeach
							@else
								@foreach($gradeRound1 as $grade1)
								<th>{{$grade1->grade}}</th>
								@endforeach
									<?php
										$start = count($gradeRound1);
										$end = count($commitee);
									 ?>
								@for($i=$start; $i<$end ;$i++)
									<th></th>
								@endfor
							@endif
						@else
							@foreach($commitee as $com)
							<th></th>
							@endforeach
						@endif
						<th class="good" id="level1">{{$level1 or ''}}</th></tr>
						<input type="hidden" name="level1" id="getLevel1">
	      </tfoot>
	 	</table>
	  </div>
	  <div class="col-xs-1 col-md-1 col-lg-2"></div>
	</div>

<div class="row" id="viewmark">
  <div class="col-xs-1 col-md-1 col-lg-2"></div>
  <div class="col-xs-10 col-md-10 col-lg-8">
	@foreach($mainRound2 as $main2)
    <p><strong>round {{$main2->round}}</strong> {{$main2->criteria_main_name}} ({{$main2->score}}%)</p>
	@endforeach
	<!-- <div class="row">
	   <div class="col-xs-3 col-md-2 col-lg-3"><strong>date</strong></div>
	   <div class="col-xs-9 col-md-10 col-lg-9">9 June 2016</div>
	</div> -->
	<div class="row">
	   <div class="col-xs-3 col-md-2 col-lg-3"><strong>exam commitee</strong></div>
	   <div class="col-xs-9 col-md-10 col-lg-9">
			 @foreach($commitee as $key => $com)
	   		<span class="titlee">c{{$key+1}}</span><span class="firstname">{{$com->advisor_name}}</span>&nbsp;
				@endforeach
	   	</div>
	</div>
    <table class="table table-bordered" id="tb2">
      <thead>
       <tr>
       		<th>criteria</th>
					@for($i=0; $i<$quantity; $i++)
       		<th width="8%">c{{$i+1}}</th>
					@endfor
       		<th width="15%">full marks</th>
       </tr>
     </thead>
     <tbody>
			 @foreach($subRound2 as $sub2)
			 <tr>
				 <td>{{$sub2->criteria_sub_name}}</td>
				 @if($sub2->scoreRound2 != null)
					@if(count($commitee)==count($sub2->scoreRound2))
						@foreach($sub2->scoreRound2 as $score2)
						<td>{{$score2->score}}</td>
						@endforeach
					@else
						@foreach($sub2->scoreRound2 as $score2)
						<td>{{$score2->score}}</td>
						@endforeach
						<?php
							$start = count($sub2->scoreRound2);
							$end = count($commitee);
						 ?>
						@for($i=$start; $i<$end ;$i++)
							<td></td>
						@endfor
					@endif
				 @else
				 @foreach($commitee as $com)
				 <td></td>
				 @endforeach
				 @endif
				 <td>{{$sub2->score}}</td>
			 </tr>
			 @endforeach
      </tbody>
      <tfoot>
      	<tr><th>total score</th>
					<?php $end = count($commitee); ?>
					@for($i=0; $i<$end ;$i++)
						<td></td>
					@endfor
					<td>100</td></tr>
      	<tr><th>grade</th>
					@if($gradeRound2 != null)
						@if(count($gradeRound2) == count($commitee))
							@foreach($gradeRound2 as $grade2)
							<th>{{$grade2->grade}}</th>
							@endforeach
						@else
							@foreach($gradeRound2 as $grade2)
							<th>{{$grade2->grade}}</th>
							@endforeach
								<?php
									$start = count($gradeRound2);
									$end = count($commitee);
								 ?>
							@for($i=$start; $i<$end ;$i++)
								<th></th>
							@endfor
						@endif
					@else
						@foreach($commitee as $com)
						<th></th>
						@endforeach
					@endif
					<th class="good">{{$level2 or ''}}</th></tr>
      </tfoot>
 	</table>
  </div>
  <div class="col-xs-1 col-md-1 col-lg-2"></div>
</div>

<div class="row" id="viewmark">
  <div class="col-xs-1 col-md-1 col-lg-2"></div>
  <div class="col-xs-10 col-md-10 col-lg-8">
	@foreach($mainRound3 as $main3)
    <p><strong>round {{$main3->round}}</strong> {{$main3->criteria_main_name}} ({{$main3->score}}%)</p>
	@endforeach
	<!-- <div class="row">
	   <div class="col-xs-3 col-md-2 col-lg-3"><strong>date</strong></div>
	   <div class="col-xs-9 col-md-10 col-lg-9">9 June 2016</div>
	</div> -->
	<div class="row">
	   <div class="col-xs-3 col-md-2 col-lg-3"><strong>exam commitee</strong></div>
	   <div class="col-xs-9 col-md-10 col-lg-9">
			 @foreach($commitee as $key => $com)
	   		<span class="titlee">c{{$key+1}}</span><span class="firstname">{{$com->advisor_name}}</span>&nbsp;
				@endforeach
	   	</div>
	</div>
    <table class="table table-bordered" id="tb3">
      <thead>
       <tr>
       		<th>criteria</th>
					@for($i=0; $i<$quantity; $i++)
       		<th width="8%">c{{$i+1}}</th>
					@endfor
       		<th width="15%">full marks</th>
       </tr>
     </thead>
     <tbody>
			 @foreach($subRound3 as $sub3)
			 <tr>
				 <td>{{$sub3->criteria_sub_name}}</td>
				 @if($sub3->scoreRound3 != null)
					@if(count($commitee)==count($sub3->scoreRound3))
						@foreach($sub3->scoreRound3 as $score3)
						<td>{{$score3->score}}</td>
						@endforeach
					@else
						@foreach($sub3->scoreRound3 as $score3)
						<td>{{$score3->score}}</td>
						@endforeach
						<?php
							$start = count($sub3->scoreRound3);
							$end = count($commitee);
						 ?>
						@for($i=$start; $i<$end ;$i++)
							<td></td>
						@endfor
					@endif
				 @else
				 @foreach($commitee as $com)
				 <td></td>
				 @endforeach
				 @endif
				 <td>{{$sub3->score}}</td>
			 </tr>
			 @endforeach
      </tbody>
      <tfoot>
      	<tr><th>total score</th>
					<?php $end = count($commitee); ?>
					@for($i=0; $i<$end ;$i++)
						<td></td>
					@endfor
					<td>100</td></tr>
      	<tr><th>grade</th>
					@if($gradeRound3 != null)
						@if(count($gradeRound3) == count($commitee))
							@foreach($gradeRound3 as $grade3)
							<th>{{$grade3->grade}}</th>
							@endforeach
						@else
							@foreach($gradeRound3 as $grade3)
							<th>{{$grade3->grade}}</th>
							@endforeach
								<?php
									$start = count($gradeRound3);
									$end = count($commitee);
								 ?>
							@for($i=$start; $i<$end ;$i++)
								<th></th>
							@endfor
						@endif
					@else
						@foreach($commitee as $com)
						<th></th>
						@endforeach
					@endif
					<th class="good">{{$level3 or ''}}</th></tr>
      </tfoot>
 	</table>
  </div>
  <div class="col-xs-1 col-md-1 col-lg-2"></div>
</div>

<div class="row" id="viewmark">
  <div class="col-xs-1 col-md-1 col-lg-2"></div>
  <div class="col-xs-10 col-md-10 col-lg-8">
	@foreach($mainRound4 as $main4)
    <p><strong>round {{$main4->round}}</strong> {{$main4->criteria_main_name}} ({{$main4->score}}%)</p>
	@endforeach
	<!-- <div class="row">
	   <div class="col-xs-3 col-md-2 col-lg-3"><strong>date</strong></div>
	   <div class="col-xs-9 col-md-10 col-lg-9">9 June 2016</div>
	</div> -->
	<div class="row">
	   <div class="col-xs-3 col-md-2 col-lg-3"><strong>exam commitee</strong></div>
	   <div class="col-xs-9 col-md-10 col-lg-9">
			 @foreach($commitee as $key => $com)
	   		<span class="titlee">c{{$key+1}}</span><span class="firstname">{{$com->advisor_name}}</span>&nbsp;
				@endforeach
	   	</div>
	</div>
    <table class="table table-bordered" id="tb4">
      <thead>
       <tr>
       		<th>criteria</th>
					@for($i=0; $i<$quantity; $i++)
       		<th width="8%">c{{$i+1}}</th>
					@endfor
       		<th width="15%">full marks</th>
       </tr>
     </thead>
     <tbody>
			 @foreach($subRound4 as $sub4)
			 <tr>
				 <td>{{$sub4->criteria_sub_name}}</td>
				 @if($sub4->scoreRound4 != null)
					@if(count($commitee)==count($sub4->scoreRound4))
						@foreach($sub4->scoreRound4 as $score4)
						<td>{{$score4->score}}</td>
						@endforeach
					@else
						@foreach($sub4->scoreRound4 as $score4)
						<td>{{$score4->score}}</td>
						@endforeach
						<?php
							$start = count($sub4->scoreRound4);
							$end = count($commitee);
						 ?>
						@for($i=$start; $i<$end ;$i++)
							<td></td>
						@endfor
					@endif
				 @else
				 @foreach($commitee as $com)
				 <td></td>
				 @endforeach
				 @endif
				 <td>{{$sub4->score}}</td>
			 </tr>
			 @endforeach
      </tbody>
      <tfoot>
      	<tr><th>total score</th>
					<?php $end = count($commitee); ?>
					@for($i=0; $i<$end ;$i++)
						<td></td>
					@endfor
					<td>100</td></tr>
      	<tr><th>grade</th>
					@if($gradeRound4 != null)
						@if(count($gradeRound4) == count($commitee))
							@foreach($gradeRound4 as $grade4)
							<th>{{$grade4->grade}}</th>
							@endforeach
						@else
							@foreach($gradeRound4 as $grade4)
							<th>{{$grade4->grade}}</th>
							@endforeach
								<?php
									$start = count($gradeRound4);
									$end = count($commitee);
								 ?>
							@for($i=$start; $i<$end ;$i++)
								<th></th>
							@endfor
						@endif
					@else
						@foreach($commitee as $com)
						<th></th>
						@endforeach
					@endif
					<th class="good">{{$level4 or ''}}</th></tr>
      </tfoot>
 	</table>
  </div>
  <div class="col-xs-1 col-md-1 col-lg-2"></div>
</div>
	<div id="center">
		<a href="/exam/scorerecord"><button class="no-print action-button">back</button></a>
		<button class="action-button">save</button>
	</div>
<script src="{!! URL::asset('js/bootstrap-select.min.js') !!}"></script>
<script src="{!! URL::asset('js/marks.js') !!}"></script>
@foreach($commitee as $key => $com)
<?php
	$keys = $key+2;
 ?>
<script type="text/javascript">
				$("table").ready(function(){
        	var total1{{$keys}} = 0;
		        $("#tb1 tbody tr td:nth-child({{$keys}})").each(function () {
		            total1{{$keys}} += parseInt($(this).html());
		        });
						$("#tb1 tfoot tr td:nth-child({{$keys}})").html(total1{{$keys}});
		    });
				$("table").ready(function(){
        	var total2{{$keys}} = 0;
		        $("#tb2 tbody tr td:nth-child({{$keys}})").each(function () {
		            total2{{$keys}} += parseInt($(this).html());
		        });
						$("#tb2 tfoot tr td:nth-child({{$keys}})").html(total2{{$keys}});

		    });
				$("table").ready(function(){
        	var total3{{$keys}} = 0;
		        $("#tb3 tbody tr td:nth-child({{$keys}})").each(function () {
		            total3{{$keys}} += parseInt($(this).html());
		        });
						$("#tb3 tfoot tr td:nth-child({{$keys}})").html(total3{{$keys}});

		    });
				$("table").ready(function(){
        	var total4{{$keys}} = 0;
		        $("#tb4 tbody tr td:nth-child({{$keys}})").each(function () {
		            total4{{$keys}} += parseInt($(this).html());
		        });
						$("#tb4 tfoot tr td:nth-child({{$keys}})").html(total4{{$keys}});
		    });
</script>
@endforeach
<script type="text/javascript">
	var level1 = document.getElementById("level1").innerHTML;
	document.getElementById("getLevel1").value = level1;
	var level2 = document.getElementById("level2").innerHTML;
	document.getElementById("getLevel2").value = level2;
	var level3 = document.getElementById("level3").innerHTML;
	document.getElementById("getLevel3").value = level3;
	var level4 = document.getElementById("level4").innerHTML;
	document.getElementById("getLevel4").value = level4;
</script>
@stop
