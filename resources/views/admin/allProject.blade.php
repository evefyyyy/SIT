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
						<td id="center"><a href="#" download><i class="flaticon-pdf-file-format-symbol"></td></a>
					</tr>
					@endforeach
		    	</tbody>
			</table>
		</div>
	</div>
@stop