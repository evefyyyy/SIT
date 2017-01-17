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
				 @foreach($subRound1 as $sub1)
				 <tr>
					 <td>{{$sub1->criteria_sub_name}}</td>
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

							@foreach($commitee as $com)
							<th></th>
							@endforeach

						<th class="good" id="level1">{{$level1 or ''}}</th></tr>
						<input type="hidden" name="level1" id="getLevel1">
	      </tfoot>
	 	</table>
	 	<button class="btn btn-primary calgrade">calculate</button>
	  </div>
	  <div class="col-xs-1 col-md-1 col-lg-2"></div>
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
	var level1 = document.getElementById("level1").innerHTML;
	document.getElementById("getLevel1").value = level1;
	var level2 = document.getElementById("level2").innerHTML;
	document.getElementById("getLevel2").value = level2;
	var level3 = document.getElementById("level3").innerHTML;
	document.getElementById("getLevel3").value = level3;
	var level4 = document.getElementById("level4").innerHTML;
	document.getElementById("getLevel4").value = level4;
	console.log(level1);
</script>
@stop
