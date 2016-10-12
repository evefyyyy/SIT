@extends('adminTmp')
@section('content')
<div id="allowtest">
<h2><img height="45" src="/img/checklist.png">allow test</h2>
	<div class="row">
		<div class="hidden-xs col-md-1 col-lg-1"></div>
		<div class="col-xs-12 col-md-10 col-lg-10" id="projectTB" style="margin-top:30px">
			<p><a class="tblink" id="check">Check all</a> / <a class="tblink" id="uncheck">Uncheck all</a></p>
			<table id="pjtable" class="table table-bordered">
				<thead>
					<tr>
						<th></th>
						<th>Project ID</th>
						<th>Project name</th>
						<th>main advisor</th>
						<th>co-advisor</th>
						<th>Proposal</th>
					</tr>
				</thead>
				<tbody>
					@if($countProject===0)

					<tr>
					<td colspan="7" class="no-project">no project found</td>
					</tr>
					@else
					@foreach($group_project as $gp)
					@if($gp->group_project_approve===1)


					<tr>
						<td><input type="checkbox"></td>
						<td>{{$gp->group_project_id}}</td>
						<td id="name">
							<a class="tblink" href="showproject/{{$gp->id}}" target="_blank">{{$gp->group_project_eng_name}}<br>
								{{$gp->group_project_th_name}}
							</a>
						</td>
						<?php $advisors = App\ProjectAdvisor::where('project_pkid', $gp->id)->get();
						$advisorsNo1 = $advisors[0]->advisor->advisor_name;
						$advisorsNo2 = $advisors[1]->advisor->advisor_name;
						?>
						<td class="firstname">{{ $advisorsNo1 }}</td>
						<td class="firstname">{{ $advisorsNo2 }}</td>
						<td id="center"><a class="tblink" data-toggle="modal" data-target="#propModal"><span class="glyphicon glyphicon-folder-open gi-2x"></span></a></td>
					</tr>

					@endif
					@endforeach
					@endif
				</tbody>
			</table>
		</div>
		<div class="hidden-xs col-md-1 col-lg-1"></div>
	</div>
</div>
@if($countProject>0)
<div class="modal fade" id="propModal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content" id="center">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">IT56-BU05</h4>
			</div>
			<div class="modal-body">
				<table class="table table-bordered myprop">
					<tbody>
						<tr>
							<td width="60%">first draft proposal</td><td width="40%"><a class="tblink" href="/proposalFile/{{$gp->proposal[0]->proposal_path_name}}" download><span class="flaticon-pdf-file-format-symbol"></span></a></td>
						</tr>
						<tr>
							<td>first proposal</td><td><a class="tblink" href="#" download><span class="flaticon-pdf-file-format-symbol"></span></a></td>
						</tr>
						<tr>
							<td>second proposal</td><td><a class="tblink" href="#" download><span class="flaticon-pdf-file-format-symbol"></span></a></td>
						</tr>
						<tr>
							<td>third proposal</td><td><a class="tblink" href="#" download><span class="flaticon-pdf-file-format-symbol"></span></a></td>
						</tr>
						<tr>
							<td>final proposal</td><td><a class="tblink" href="#" download><span class="flaticon-pdf-file-format-symbol"></span></a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endif
</div>
<script>
	$(document).ready(function() {
		$('#pjtable').DataTable( {
		} );
	} );
	 $("#check").click(function () {
     $('input:checkbox').prop("checked", true); 
 	});
	 $("#uncheck").click(function () {
     $('input:checkbox').prop("checked", false); 
 	});
</script>
@stop
