@extends('stdTmp')
@section('content')
<div class="row" id="center">
	<div class="col-xs-2 col-md-3 col-lg-3"></div>
	<div class="col-xs-8 col-md-6 col-lg-6">
	<?php  
		$get_project = App\ProjectStudent::where('student_pkid', Auth::User()->user_student->student_pkid)->first();
		$get_groupproject = App\GroupProject::where('id', $get_project->project_pkid)->first();
	?>
		<h4 class="center">project id : {{$get_groupproject->group_project_id}}</h4>
		<table class="table table-bordered myscore">
		<?php  
	$get_score_round1 = App\ScoreTest::where([
		['project_pkid', $get_project->project_pkid],['score_test_round', 1]
		])->first();
	$get_score_round2 = App\ScoreTest::where([
		['project_pkid', $get_project->project_pkid],['score_test_round', 2]
		])->first();
	$get_score_round3 = App\ScoreTest::where([
		['project_pkid', $get_project->project_pkid],['score_test_round', 3]
		])->first();
	$get_score_round4 = App\ScoreTest::where([
		['project_pkid', $get_project->project_pkid],['score_test_round', 4]
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
			<tbody>
				<tr>
					<td>exam round 1</td><td>{{$result_score_level_round1}}</td>
				</tr>
				<tr>
					<td>exam round 2</td><td>{{$result_score_level_round2}}</td>
				</tr>
				<tr>
					<td>exam round 3</td>
					@if(isset($result_grade_round1) && isset($result_grade_round3))
					<td>
					{{$result_score_level_round3}}
					</td>
					@else
					<td></td>
					@endif
				</tr>
				<tr>
					<td>exam round 4</td><td></td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="col-xs-2 col-md-3 col-lg-3"></div>
</div>
@stop