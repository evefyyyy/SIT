@extends('adminTmp')
@section('content')
<h2><img height="45" src="/img/leaderboard.png">Popular vote</h2>
<div class="row">
	<div class="hidden-xs col-md-1 col-lg-1"></div>
	<div class="col-xs-12 col-md-10 col-lg-10">
		<div id="center">
			<div id="department" class="btn-group">
				<span class="btn btn-default" id="IT">IT</span>
				<span class="btn btn-default" id="CS">CS</span>
			</div>
		</div>
		<table id="ITproject" class="table table-bordered" style="width:100%">
			<thead>
				<tr>
					<th>project id</th>
					<th>project name</th>
					<th>score</th>
				</tr>
			</thead>
			<tbody>
				@foreach($group_project as $gp)
				<?php  
				$group_project_check_it = $gp->group_project_id;
				$count_score = App\DdayProject::where('project_pkid', $gp->id)->count();
				?>
				@if(substr($group_project_check_it, 0,2) == "IT")
				<tr>
					<td>{{$gp->group_project_id}}</td>
					<td>{{$gp->group_project_th_name}}</td>
					<td>{{$count_score}}</td>
				</tr>
				@endif
				@endforeach
			</tbody>
		</table>
		<table id="CSproject" class="table table-bordered" style="width:100%">
			<thead>
				<tr>
					<th>project id</th>
					<th>project name</th>
					<th>score</th>
				</tr>
			</thead>
			<tbody>
					@foreach($group_project as $gp)
					<?php  
					$group_project_check_it = $gp->group_project_id;
					$count_score = App\DdayProject::where('project_pkid', $gp->id)->count();
					?>
					@if(substr($group_project_check_it, 0,2) == "CS")
					<tr>
						<td>{{$gp->group_project_id}}</td>
						<td>{{$gp->group_project_th_name}}</td>
						<td>{{$count_score}}</td>
					</tr>
					@endif
					@endforeach
				
			</tbody>
		</table>
	</div>
	<div class="hidden-xs col-md-1 col-lg-1"></div>
</div>
<script>
	$(document).ready( function () {
		$('.table').dataTable( {
			"bPaginate": false,
			"order": [[ 2, "desc" ]]
		} );
		$('.dataTables_info').hide();
		$('#IT').addClass('active');
		$('#ITproject_wrapper').show();
		$('#CSproject_wrapper').hide();
	} );
	$('#IT').click( function(){
		$('#IT').addClass('active');
		$('#ITproject_wrapper').show();
		$('#CSproject_wrapper').hide();
		if ($('#CS').hasClass('active')){
			$('#CS').removeClass('active');
		}
	});
	$('#CS').click( function(){
		$('#CS').addClass('active');
		$('#CSproject_wrapper').show();
		$('#ITproject_wrapper').hide();
		if ($('#IT').hasClass('active')){
			$('#IT').removeClass('active');
		}
	});
</script>
@stop