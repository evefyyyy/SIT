@extends('adminTmp')
@section('content')
<div class="row">
	<div class="hidden-xs col-md-1 col-lg-1"></div>
	<div class="col-xs-12 col-md-10 col-lg-10">
		<div id="pendlink" style="margin-top:30px">
			<a class="btn" href="/project/pending">Pending Projects</a>
		</div>
	</div>
	<div class="hidden-xs col-md-1 col-lg-1"></div>
</div>
<div class="row">
	<div id="projectTB">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th style="width:12%">Project ID</th>
					<th style="width:54%">Project name</th>
					<th style="width:12%">Type</th>
					<th style="width:12%">category</th>
					<th style="width:10%">Proposal</th>
				</tr>
			</thead>
			<tbody>
				@if($countProject===0)

				<tr>
					<td colspan="5" class="no-project">no project</td>
				</tr>
				@else
				@foreach($project as $pj)
				@if($pj->groupProject->group_project_approve===1)

				<tr>
					<td>{{$pj->groupProject->group_project_id}}</td>
					<td id="name">
						<a href="#">{{$pj->groupProject->group_project_eng_name}}<br>
							{{$pj->groupProject->group_project_th_name}}
						</a>
					</td>
					<td>{{$pj->groupProject->type->type_name}}</td>
					<td>{{$pj->groupProject->category->category_name}}</td>
					<td id="center"><a href="/proposalFile/{{$pj->groupProject->proposal[0]->proposal_path_name}}" download><span class="flaticon-pdf-file-format-symbol"></span></td></a>
				</tr>

				@endif
				@endforeach
				@endif
			</tbody>
		</table>
	</div>
</div>
@stop
