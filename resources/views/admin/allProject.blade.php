@extends('adminTmp')
@section('content')
    <div id="pendlink">
         <a class="btn" href="/admin/project/pending">Pending Projects</a>
    </div>
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
					<!-- no project -->
					<!--<tr>
						<td colspan="5" class="no-project">no project</td>
					</tr>
					<!---->
					@foreach($project as $projects)
					<tr>
						<td>{{$projects->groupProject->group_project_id}}</td>
						<td id="name">
							<a href="#">{{$projects->groupProject->group_project_eng_name}}<br>
							{{$projects->groupProject->group_project_th_name}}
							</a>
						</td>
						<td>{{$projects->groupProject->type->type_name}}</td>
						<td>health</td>
						<td><a href="#"><img src="/img/pdf.png"></td></a>
					</tr>
					@endforeach
		    	</tbody>
			</table>
		</div>
@stop