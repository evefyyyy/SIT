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
					</tr>

					@endif
					@endforeach
					@endif
				</tbody>
			</table>
		</div>
		<div class="hidden-xs col-md-1 col-lg-1"></div>
	</div>
	
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