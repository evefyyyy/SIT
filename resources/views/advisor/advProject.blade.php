@extends('advTmp')
@section('content')
<link href="{!! URL::asset('css/datatables.css') !!}" rel="stylesheet">
<script src="{!! URL::asset('js/datatables.min.js') !!}"></script>
<div class="row">
	<div class="col-xs-1 col-md-1 col-lg-1"></div>
	<div class="col-xs-10 col-md-10 col-lg-10">
		YEAR
		<div class="dropdown" id="year">
			<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">All
				<span class="caret"></span></button>
				<ul class="dropdown-menu" role="menu" aria-labelledby="year">
					<li><a href="#">All</a></li>
					<li><a href="#">2016</a></li>
				</ul>
			</div>
	</div>
	<div class="col-xs-1 col-md-1 col-lg-1"></div>
	</div>
	<div class="row">
		<div class="hidden-xs col-md-1 col-lg-1"></div>
        <div class="col-xs-12 col-md-10 col-lg-10" id="projectTB" style="margin-top:30px">
			<table id="pjtable" class="table table-bordered results">
				<thead>
					<tr>
						<th>Project ID</th>
						<th>Project name</th>
						<th>Type</th>
						<th>Main advisor</th>
						<th>co-advisor</th>
						<th>proposal</th>
						<th>score</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$proCount = 0;
						$scoreCount = 0;
					 ?>
					@if($project === 0)
					@else
					@foreach($project as $pj)
					<tr>
						<td>{{$pj->group_project_id}}</td>
						<td id="name">
							<a class="tblink" href="/showproject/{{$pj->group_project_id}}" target="_blank">{{$pj->group_project_eng_name}}<br>{{$pj->group_project_th_name}}</a>
						</td>
						<td>{{$pj->type->type_name}}</td>
						@if($pj->countAdv == 2)
							@foreach($pj->advisor as $adv)
							<td class="firstname">{{$adv->advisor_name}}</td>
							@endforeach
						@else
							@foreach($pj->advisor as $adv)
							<td class="firstname">{{$adv->advisor_name}}</td>
							@endforeach
							<td class="firstname"></td>
						@endif
						<td id="center"><a class="tblink" data-toggle="modal" data-target="#propModal{{$proCount++}}"><span class="glyphicon glyphicon-folder-open gi-2x"></span></a></td>
						<td id="center"><a class="tblink" data-toggle="modal" data-target="#scoreModal{{$scoreCount++}}"><span class="glyphicon glyphicon-list-alt gi-3x"></span></a></td>
					</tr>
					@endforeach
					@endif
				</tbody>
			</table>
		</div>
	</div>
	<div class="hidden-xs col-md-1 col-lg-1"></div>
</div>
	<?php
		$proCount = 0;
		$scoreCount = 0;
	 ?>
	 @if($project === 0)
	 @else
	 @foreach($project as $pj)
	 <?php
	$get_score_round1 = App\ScoreTest::where([
		['project_pkid', $pj->id],['score_test_round', 1]
		])->first();
	$get_score_round2 = App\ScoreTest::where([
		['project_pkid', $pj->id],['score_test_round', 2]
		])->first();
	$get_score_round3 = App\ScoreTest::where([
		['project_pkid', $pj->id],['score_test_round', 3]
		])->first();
	$get_score_round4 = App\ScoreTest::where([
		['project_pkid', $pj->id],['score_test_round', 4]
		])->first();
	$get_score_level1 = App\ScoreLevel::where('id', 1)->first();
	$get_score_level2 = App\ScoreLevel::where('id', 2)->first();
	$get_score_level3 = App\ScoreLevel::where('id', 3)->first();
	$get_score_level4 = App\ScoreLevel::where('id', 4)->first();

	if(isset($get_score_round1)){
		if($get_score_round1->score_test_sum >= $get_score_level1->score){
			$score_level1 = 'verygood';
			$result_grade_round1 = 'A';
			$result_score_level_round1 = $get_score_level1->score_level_name;
		} else if($get_score_round1->score_test_sum >= $get_score_level2->score){
			$score_level1 = 'good';
			$result_grade_round1 = 'B';
			$result_score_level_round1 = $get_score_level2->score_level_name;
		} else if($get_score_round1->score_test_sum >= $get_score_level3->score){
			$score_level1 = 'fair';
			$result_grade_round1 = 'C';
			$result_score_level_round1 = $get_score_level3->score_level_name;
		} else if($get_score_round1->score_test_sum < $get_score_level4->score){
			$score_level1 = 'poor';
			$result_grade_round1 = 'D';
			$result_score_level_round1 = $get_score_level4->score_level_name;
		}
	}

	if(isset($get_score_round2)){
		if($get_score_round2->score_test_sum >= $get_score_level1->score){
			$score_level2 = 'verygood';
			$result_grade_round2 = 'A';
			$result_score_level_round2 = $get_score_level1->score_level_name;
		} else if($get_score_round2->score_test_sum >= $get_score_level2->score){
			$score_level2 = 'good';
			$result_grade_round2 = 'B';
			$result_score_level_round2 = $get_score_level2->score_level_name;
		} else if($get_score_round2->score_test_sum >= $get_score_level3->score){
			$score_level2 = 'fair';
			$result_grade_round2 = 'C';
			$result_score_level_round2 = $get_score_level3->score_level_name;
		} else if($get_score_round2->score_test_sum < $get_score_level4->score){
			$score_level2 = 'poor';
			$result_grade_round2 = 'D';
			$result_score_level_round2 = $get_score_level4->score_level_name;
		}
	}

	if(isset($get_score_round3)){
		if($get_score_round3->score_test_sum >= $get_score_level1->score){
			$score_level3 = 'verygood';
			$result_grade_round3 = 'A';
			$result_score_level_round3 = $get_score_level1->score_level_name;
		} else if($get_score_round3->score_test_sum >= $get_score_level2->score){
			$score_level3 = 'good';
			$result_grade_round3 = 'B';
			$result_score_level_round3 = $get_score_level2->score_level_name;
		} else if($get_score_round3->score_test_sum >= $get_score_level3->score){
			$score_level3 = 'fair';
			$result_grade_round3 = 'C';
			$result_score_level_round3 = $get_score_level3->score_level_name;
		} else if($get_score_round3->score_test_sum < $get_score_level4->score){
			$score_level3 = 'poor';
			$result_grade_round3 = 'D';
			$result_score_level_round3 = $get_score_level4->score_level_name;
		}
	}

	if(isset($get_score_round4)){
		if($get_score_round4->score_test_sum >= $get_score_level1->score){
			$score_level4 = 'verygood';
			$result_grade_round4 = 'A';
			$result_score_level_round4 = $get_score_level1->score_level_name;
		} else if($get_score_round4->score_test_sum >= $get_score_level2->score){
			$score_level4 = 'good';
			$result_grade_round4 = 'B';
			$result_score_level_round4 = $get_score_level2->score_level_name;
		} else if($get_score_round4->score_test_sum >= $get_score_level3->score){
			$score_level4 = 'fair';
			$result_grade_round4 = 'C';
			$result_score_level_round4 = $get_score_level3->score_level_name;
		} else if($get_score_round4->score_test_sum < $get_score_level4->score){
			$score_level4 = 'poor';
			$result_grade_round4 = 'D';
			$result_score_level_round4 = $get_score_level4->score_level_name;
		}
	}
	?>
	<div class="modal fade" id="scoreModal{{$scoreCount++}}" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content" id="center">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">{{$pj->group_project_id}}</h4>
				</div>
				<div class="modal-body">
					<table class="table table-bordered myscore">
						<tbody>
							<tr>
							@if(isset($result_grade_round1))
								<td width="50%">exam round 1</td><td width="50%">{{$result_grade_round1}} <span class="$score_level1">{{$result_score_level_round1}}</span></td>
							@else
							<td width="50%">exam round 1</td><td width="50%"> <span class="$score_level1"></span></td>
							@endif
							</tr>
							<tr>
							@if(isset($result_grade_round2))
								<td width="50%">exam round 2</td><td width="50%">{{$result_grade_round2}} <span class="$score_level2">{{$result_score_level_round2}}</span></td>
							@else
							<td width="50%">exam round 2</td><td width="50%"> <span class="$score_level2"></span></td>
							@endif
							<tr>
							@if(isset($result_grade_round3))
								<td width="50%">exam round 3</td><td width="50%">{{$result_grade_round3}} <span class="$score_level3">{{$result_score_level_round3}}</span></td>
							@else
							<td width="50%">exam round 3</td><td width="50%"> <span class="$score_level3"></span></td>
							@endif
							</tr>
							<tr>
							@if(isset($result_grade_round4))
								<td width="50%">exam round 4</td><td width="50%">{{$result_grade_round4}} <span class="$score_level4">{{$result_score_level_round4}}</span></td>
							@else
							<td width="50%">exam round 4</td><td width="50%"> <span class="$score_level4"></span></td>
							@endif
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	@endforeach
	@endif
	<?php
		$proCount = 0;
		$scoreCount = 0;
	 ?>
	 @if($project === 0)
	 @else
	@foreach($project as $pj)
	<div class="modal fade" id="propModal{{$proCount++}}" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content" id="center">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">{{$pj->group_project_id}}</h4>
				</div>
				<div class="modal-body">
					<table class="table table-bordered myprop">
						<tbody>
							<tr>
								@if($pj->firstDraftProposal === null)
								@else
								<td width="60%">first draft proposal</td><td width="40%"><a class="tblink" href="/proposalFile/{{$pj->firstDraftProposal}}" download><span class="flaticon-pdf-file-format-symbol"></span></a></td>
								@endif
							</tr>
							<tr>
								@if($pj->firstProposal === null)
								@else
								<td>first proposal</td><td><a class="tblink" href="/proposalFile/{{$pj->firstProposal}}" download><span class="flaticon-pdf-file-format-symbol"></span></a></td>
								@endif
							</tr>
							<tr>
								@if($pj->secondProposal === null)
								@else
								<td>second proposal</td><td><a class="tblink" href="/proposalFile/{{$pj->secondProposal}}" download><span class="flaticon-pdf-file-format-symbol"></span></a></td>
								@endif
							</tr>
							<tr>
								@if($pj->thirdProposal === null)
								@else
								<td>third proposal</td><td><a class="tblink" href="/proposalFile/{{$pj->thirdProposal}}" download><span class="flaticon-pdf-file-format-symbol"></span></a></td>
								@endif
							</tr>
							<tr>
								@if($pj->finalProposal === null)
								@else
								<td>final proposal</td><td><a class="tblink" href="/proposalFile/{{$pj->finalProposal}}" download><span class="flaticon-pdf-file-format-symbol"></span></a></td>
								@endif
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	@endforeach
	@endif
	<div id="dt-filter">
	<button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span> <span class="caret"></span></button>
			<ul class="dropdown-menu dropdown-menu-right">
				  <li>
				    <a class="small toggle-vis" data-value="option1" tabIndex="-1" data-column="0">
				      <input type="checkbox" checked/>&nbsp;Project ID
				    </a>
				  </li>
				  <li>
				    <a class="small toggle-vis" data-value="option2" tabIndex="-1" data-column="1">
				      <input type="checkbox" checked/>&nbsp;Project name
				    </a>
				  </li>
				  <li>
				    <a class="small toggle-vis" data-value="option3" tabIndex="-1" data-column="2">
				      <input type="checkbox" checked/>&nbsp;Type
				    </a>
				  </li>
				  <li>
				     <a class="small toggle-vis" data-value="option4" tabIndex="-1" data-column="3">
				       <input type="checkbox" checked/>&nbsp;Main advisor
				     </a>
				  </li>
				  <li>
				     <a class="small toggle-vis" data-value="option5" tabIndex="-1" data-column="4">
				       <input type="checkbox" checked/>&nbsp;Co-advisor
				     </a>
				  </li>
				  <li>
				     <a class="small toggle-vis" data-value="option6" tabIndex="-1" data-column="5">
				       <input type="checkbox" checked/>&nbsp;Proposal
				     </a>
				  </li>
				  <li>
				     <a class="small toggle-vis" data-value="option7" tabIndex="-1" data-column="6">
				       <input type="checkbox" checked/>&nbsp;Score
				     </a>
				  </li>
			</ul>
	</div>

<script>
	$(document).ready(function() {
		var table = $('#pjtable').DataTable( {
		} );
$tmp = $("#dt-filter").html();
$("#dt-filter").empty();
$("#pjtable_filter").append($tmp );
		$('a.toggle-vis').on( 'click', function (e) {
			if($(this).children().prop('checked')){
				$(this).children().prop('checked',false);
			}else{
				$(this).children().prop('checked',true);
			}
        // Get the column API object
        var column = table.column( $(this).attr('data-column') );

        // Toggle the visibility
        column.visible( ! column.visible() );
    } );
	} );
</script>
	@stop
