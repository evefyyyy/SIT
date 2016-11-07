@extends('adminTmp')
@section('content')
<div class="row">
	<div class="hidden-xs col-md-1 col-lg-1"></div>
	<div class="col-xs-12 col-md-10 col-lg-10">
		YEAR
		<div class="dropdown" id="year">
			<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">All
				<span class="caret"></span></button>
				<ul class="dropdown-menu" role="menu" aria-labelledby="year">
					<li><a href="#">All</a></li>
					<li><a href="#">2016</a></li>
				</ul>
			</div>
			<span id="pendlink">
				@if($projectNoApprove != 0)
				<a class="btn" href="/project/pending">Pending Projects<span class="notification-counter">{{$projectNoApprove}}</span></a>
				@else
				<a class="btn" href="/project/pending">Pending Projects</a>
				@endif
			</span>
		</div>
		<div class="hidden-xs col-md-1 col-lg-1"></div>
	</div>
	<div class="row">
		<div class="hidden-xs col-md-1 col-lg-1"></div>
		<div class="col-xs-12 col-md-10 col-lg-10" id="projectTB" style="margin-top:30px">
			<table id="pjtable" class="table table-bordered">
				<thead>
					<tr>
						<th>Project ID</th>
						<th>Project name</th>
						<th>Type</th>
						<th>Category</th>
						<th>main advisor</th>
						<th>co-advisor</th>
						<th>Proposal</th>
						<th>score</th>
					</tr>
				</thead>
				<tbody>
					@if($countProject===0)

					<tr>
						<td colspan="8" class="no-project">no project found</td>
					</tr>
					@else
					<?php
					$proCount = 0;
					$scoreCount = 0;
					?>
					@foreach($group_project as $gp)
					@if($gp->group_project_approve===1)


					<tr>
						<td>{{$gp->group_project_id}}</td>
						<td id="name">
							<a class="tblink" href="showproject/{{$gp->group_project_id}}" target="_blank">{{$gp->group_project_eng_name}}<br>
								{{$gp->group_project_th_name}}
							</a>
						</td>
						<td>{{$gp->type->type_name}}</td>
						<td>{{$gp->category->category_name}}</td>
						<?php $advisors = App\ProjectAdvisor::where('project_pkid', $gp->id)->get();
						$advisorsNo1 = $advisors[0]->advisor->advisor_name;
						if(isset($advisors[1])){
							$advisorsNo2 = $advisors[1]->advisor->advisor_name;
						}
						?>
						<td class="firstname">{{ $advisorsNo1 }}</td>
						@if(isset($advisors[1]))
						<td class="firstname">{{$advisorsNo2}}</td>
						@else
						<td class="firstname"></td>
						@endif
						<td id="center"><a class="tblink" data-toggle="modal" data-target="#propModal{{$proCount++}}"><span class="glyphicon glyphicon-folder-open gi-2x"></span></a></td>
						<td id="center"><a class="tblink" data-toggle="modal" data-target="#scoreModal{{$scoreCount++}}"><span class="glyphicon glyphicon-list-alt gi-3x"></span></a></td>
					</tr>

					@endif
					@endforeach
					@endif
				</tbody>
			</table>
		</div>
		<div class="hidden-xs col-md-1 col-lg-1"></div>
	</div>
	<?php
	$proCount = 0;
	$scoreCount = 0;
	?>
	@foreach($group_project as $gp)
	<?php  
	$get_score_round1 = App\ScoreTest::where([
		['project_pkid', $gp->projectStudents->first()->project_pkid],['score_test_round', 1]
		])->first();
	$get_score_round2 = App\ScoreTest::where([
		['project_pkid', $gp->projectStudents->first()->project_pkid],['score_test_round', 2]
		])->first();
	$get_score_round3 = App\ScoreTest::where([
		['project_pkid', $gp->projectStudents->first()->project_pkid],['score_test_round', 3]
		])->first();
	$get_score_round4 = App\ScoreTest::where([
		['project_pkid', $gp->projectStudents->first()->project_pkid],['score_test_round', 4]
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
					<h4 class="modal-title">{{$gp->group_project_id}}</h4>
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
								<td>exam round 2</td><td>{{$result_grade_round2}} <span class="$score_level2">{{$result_score_level_round2}}</span></td>
							</tr>
							<tr>
							@if(isset($result_grade_round1) && isset($result_grade_round3))
								<td>exam round 3</td><td>{{$result_grade_round3}} <span class="$score_level3">{{$result_score_level_round3}}</span></td>
								@else
							<td width="50%">exam round 1</td><td width="50%"> <span class="$score_level3"></span></td>
							@endif
							</tr>
							<tr>
								<td>exam round 4</td><td></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	@endforeach
	
	@if($countProject>0)
	<?php
	$proCount = 0;
	$scoreCount = 0;
	?>
	@foreach($group_project as $gp)
	<div class="modal fade" id="propModal{{$proCount++}}" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content" id="center">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">{{$gp->group_project_id}}</h4>
				</div>
				<div class="modal-body">
					<table class="table table-bordered myprop">
						<tbody>
							<?php  
							$first_draft_proposal = App\Proposal::where([
								['project_pkid', $gp->id],
								['proposal_type_id', 1]
								])->first();
							$first_proposal = App\Proposal::where([
								['project_pkid', $gp->id],
								['proposal_type_id', 2]
								])->first();
							$second_proposal = App\Proposal::where([
								['project_pkid', $gp->id],
								['proposal_type_id', 3]
								])->first();
							$third_proposal = App\Proposal::where([
								['project_pkid', $gp->id],
								['proposal_type_id', 4]
								])->first();
							$final_proposal = App\Proposal::where([
								['project_pkid', $gp->id],
								['proposal_type_id', 5]
								])->first();
							?>
							@if($first_draft_proposal != null)
							<tr>
								<td width="60%">first draft proposal</td><td width="40%"><a class="tblink" href="/proposalFile/{{$first_draft_proposal->proposal_path_name}}" download><span class="flaticon-pdf-file-format-symbol"></span></a></td>
							</tr>
							@endif
							@if($first_proposal != null)
							<tr>
								<td>first proposal</td><td><a class="tblink" href="/proposalFile/{{$second_draft_proposal->proposal_path_name}}" download><span class="flaticon-pdf-file-format-symbol"></span></a></td>
							</tr>
							@endif
							@if($second_proposal != null)
							<tr>
								<td>second proposal</td><td><a class="tblink" href="/proposalFile/{{$third_draft_proposal->proposal_path_name}}" download><span class="flaticon-pdf-file-format-symbol"></span></a></td>
							</tr>
							@endif
							@if($third_proposal != null)
							<tr>
								<td>third proposal</td><td><a class="tblink" href="/proposalFile/{{$final_draft_proposal->proposal_path_name}}" download><span class="flaticon-pdf-file-format-symbol"></span></a></td>
							</tr>
							@endif
							@if($final_proposal != null)
							<tr>
								<td>final proposal</td><td><a class="tblink" href="#" download><span class="flaticon-pdf-file-format-symbol"></span></a></td>
							</tr>
							@endif
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
					<input type="checkbox" class="incheck" checked/>&nbsp;Project ID
				</a>
			</li>
			<li>
				<a class="small toggle-vis" data-value="option2" tabIndex="-1" data-column="1">
					<input type="checkbox" class="incheck" checked/>&nbsp;Project name
				</a>
			</li>
			<li>
				<a class="small toggle-vis" data-value="option3" tabIndex="-1" data-column="2">
					<input type="checkbox" class="incheck" checked/>&nbsp;Type
				</a>
			</li>
			<li>
				<a class="small toggle-vis" data-value="option4" tabIndex="-1" data-column="3">
					<input type="checkbox" class="incheck" checked/>&nbsp;Category
				</a>
			</li>
			<li>
				<a class="small toggle-vis" data-value="option5" tabIndex="-1" data-column="4">
					<input type="checkbox" class="incheck" checked/>&nbsp;Main advisor
				</a>
			</li>
			<li>
				<a class="small toggle-vis" data-value="option6" tabIndex="-1" data-column="5">
					<input type="checkbox" class="incheck" checked/>&nbsp;Co-advisor
				</a>
			</li>
			<li>
				<a class="small toggle-vis" data-value="option7" tabIndex="-1" data-column="6">
					<input type="checkbox" class="incheck" checked/>&nbsp;Proposal
				</a>
			</li>
			<li>
				<a class="small toggle-vis" data-value="option8" tabIndex="-1" data-column="7">
					<input type="checkbox" class="incheck" checked/>&nbsp;score
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