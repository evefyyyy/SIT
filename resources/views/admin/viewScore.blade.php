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
	    <p><b>round {{$main1->round}}</b> {{$main1->criteria_main_name}} ({{$main1->score}}%) </p>
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
				 @foreach($subRound1 as $keys => $sub1)
				 <tr>
					 <td>{{$sub1->criteria_sub_name}}</td>
					 @foreach($scoreRound1[$keys] as $score1)
					 	@if(empty($score1[0]))
						<td></td>
						@else
					 	<td>{{$score1[0]->score}}</td>
						@endif
					 @endforeach
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
						<td>100</td>
					</tr>
					<tr>
						<th>grade</th>
							@foreach($gradeRound1 as $grade1)
								@if(empty($grade1))
								<th></th>
								@else
								<th>{{$grade1[0]->grade}}</th>
								@endif
							@endforeach
						<th class="good" id="level1">{{$level1 or ''}}</th>
					</tr>
	      </tfoot>
	 	</table>

			<button class="btn btn-primary calgrade" id="cal1">calculate</button>

	  </div>
	  <div class="col-xs-1 col-md-1 col-lg-2"></div>
	</div>
	<div class="row" id="viewmark">
		<div class="col-xs-1 col-md-1 col-lg-2"></div>
		<div class="col-xs-10 col-md-10 col-lg-8">
			@foreach($mainRound2 as $main2)
			<p><b>round {{$main2->round}}</b> {{$main2->criteria_main_name}} ({{$main2->score}}%) </p>
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
				 @foreach($subRound2 as $keys => $sub2)
				 <tr>
					 <td>{{$sub2->criteria_sub_name}}</td>
					 @foreach($scoreRound2[$keys] as $score2)
						@if(empty($score2[0]))
						<td></td>
						@else
						<td>{{$score2[0]->score}}</td>
						@endif
					 @endforeach
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
						<td>100</td>
					</tr>
					<tr>
						<th>grade</th>
							@foreach($gradeRound2 as $grade2)
								@if(empty($grade2))
								<th></th>
								@else
								<th>{{$grade2[0]->grade}}</th>
								@endif
							@endforeach
						<th class="good" id="level2">{{$level2 or ''}}</th>
					</tr>
						<input type="hidden" name="level2" id="getLevel2">
				</tfoot>
		</table>
		<button class="btn btn-primary calgrade" id="cal2">calculate</button>
		</div>
		<div class="col-xs-1 col-md-1 col-lg-2"></div>
	</div>

	<div class="row" id="viewmark">
		<div class="col-xs-1 col-md-1 col-lg-2"></div>
		<div class="col-xs-10 col-md-10 col-lg-8">
			@foreach($mainRound3 as $main3)
			<p><b>round {{$main3->round}}</b> {{$main3->criteria_main_name}} ({{$main3->score}}%) </p>
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
			 @foreach($subRound3 as $keys => $sub3)
			 <tr>
				 <td>{{$sub3->criteria_sub_name}}</td>
				 @foreach($scoreRound3[$keys] as $score3)
					@if(empty($score3[0]))
					<td></td>
					@else
					<td>{{$score3[0]->score}}</td>
					@endif
				 @endforeach
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
					<td>100</td>
				</tr>
				<tr>
					<th>grade</th>
						@foreach($gradeRound3 as $grade3)
							@if(empty($grade3))
							<th></th>
							@else
							<th>{{$grade3[0]->grade}}</th>
							@endif
						@endforeach
					<th class="good" id="level3">{{$level3 or ''}}</th>
				</tr>
					<input type="hidden" name="level3" id="getLevel3">

			</tfoot>
	</table>
	<button class="btn btn-primary calgrade">calculate</button>
	</div>
	<div class="col-xs-1 col-md-1 col-lg-2"></div>
</div>

<div class="row" id="viewmark">
	<div class="col-xs-1 col-md-1 col-lg-2"></div>
	<div class="col-xs-10 col-md-10 col-lg-8">
		@foreach($mainRound4 as $main4)
		<p><b>round {{$main4->round}}</b> {{$main4->criteria_main_name}} ({{$main4->score}}%) </p>
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
			 @foreach($subRound4 as $keys => $sub4)
			 <tr>
				 <td>{{$sub4->criteria_sub_name}}</td>
				 @foreach($scoreRound4[$keys] as $score4)
					@if(empty($score4[0]))
					<td></td>
					@else
					<td>{{$score4[0]->score}}</td>
					@endif
				 @endforeach
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
					<td>100</td>
				</tr>
				<tr>
					<th>grade</th>
						@foreach($gradeRound4 as $grade4)
							@if(empty($grade4))
							<th></th>
							@else
							<th>{{$grade4[0]->grade}}</th>
							@endif
						@endforeach
					<th class="good" id="level4">{{$level4 or ''}}</th>
				</tr>
					<input type="hidden" name="level4" id="getLevel4">
			</tfoot>
	</table>
	<button class="btn btn-primary calgrade">calculate</button>
	</div>
	<div class="col-xs-1 col-md-1 col-lg-2"></div>
</div>

	<div id="center">
		<a href="/exam/scorerecord"><button class="no-print action-button">back</button></a>
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
	$.ajaxSetup({
	  headers: {
	    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	  }
	});
	$(document).ready(function(){
		$('#cal1').click(function(){
			$.get('/exam/scorerecord/viewscore/{{$id}}/cal1',function(data){
				$('#level1').html(data);
			});
		});
	});
	$(document).ready(function(){
		$('#cal2').click(function(){
			$.get('/exam/scorerecord/viewscore/{{$id}}/cal2',function(data){
				$('#level2').html(data);
			});
		});
	});
	$(document).ready(function(){
		$('#cal3').click(function(){
			$.get('/exam/scorerecord/viewscore/{{$id}}/cal3',function(data){
				$('#level3').html(data);
			});
		});
	});
	$(document).ready(function(){
		$('#cal4').click(function(){
			$.get('/exam/scorerecord/viewscore/{{$id}}/cal4',function(data){
				$('#level4').html(data);
			});
		});
	});


</script>
@stop
