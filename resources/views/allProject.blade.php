@extends('adminTmp')
@section('content')
    <div id="pendlink">
         <a href="/admin/project/pending">Pending Projects</a>
    </div>
	<table id="projectTB" class="table table-bordered">
		<thead>
			<tr>
				<th style="width:12%">Project ID</th>
				<th style="width:66%">Project name</th>
				<th style="width:12%">Type</th>
				<th style="width:10%">Proposal</th>
			</tr>
		</thead>
		<tbody>
			@foreach($project as $projects)
			<tr>
				<td>{{$projects->groupProject->group_project_id}}</td>
				<td id="name">
					<a href="#">{{$projects->groupProject->group_project_eng_name}}<br>
					{{$projects->groupProject->group_project_th_name}}
					</a>
				</td>
				<td>{{$projects->groupProject->type->type_name}}</td>
				<td><a href="#"><img src="/img/pdf.png"></td></a>
			</tr>
			@endforeach
    	</tbody>
	</table>
@stop