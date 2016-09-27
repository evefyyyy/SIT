@extends('adminTmp')
@section('content')
<div class="row" id="editroom">
	<div class="col-xs-1 col-md-1 col-lg-1"></div>
	<div class="col-xs-10 col-md-10 col-lg-10">

			<input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
	<h2 style="margin-bottom:0">exam room 3</h2>
		<a data-toggle="modal" data-target="#addproject"><i class="glyphicon glyphicon-plus"></i>add project</a>
	</div>
	<div class="col-xs-1 col-md-1 col-lg-1"></div>
</div>
<div class="row">
	<div id="roomTB">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<td style="width:2%" class="move-btn"></td>
					<th style="width:8%">project id</th>
					<th style="width:8%">exam time</th>
					<th style="width:10%">student id</th>
					<th style="width:18%">student name</th>
					<th style="width:32%">project name</th>
					<th style="width:6%">type</th>
					<th style="width:7%">main advisor</th>
					<th style="width:7%">co-advisor</th>
					<td style="width:2%" class="del-btn"></td>
				</tr>
			</thead>
			<tbody>
				@if($project == 0)
				@else
					@foreach($project as $data)
					<tr>
						<td class="move-btn"><button class="btn btn-info btn-xs move-up"><i class="glyphicon glyphicon-triangle-top"></i></button>
							<button class="btn btn-info btn-xs move-down"><i class="glyphicon glyphicon-triangle-bottom"></i></button>
						</td>
						<td>{{$data->group_project_id}}</td>
						<td>{{$data->starttime}} - {{$data->endtime}}</td>
						<td>
							@foreach($data->student as $std)
							{{$std->student_id}}<br>
							@endforeach
						</td>
						<td>
							@foreach($data->student as $std)
							{{$std->student_name}}<br>
							@endforeach
						</td>
						<td>{{$data->group_project_th_name}}</td>
						<td class="pjtype">{{$data->type->type_name}}</td>
						@foreach($data->advisor as $adv)
						<td><span class="firstname">{{$adv->advisor_name}}</span></td>
						@endforeach
						<td class="del-btn"><button class="btn btn-danger btn-circle btn-sm" data-toggle="confirmation" data-singleton="true"><i class="glyphicon glyphicon-remove"></i></button></td>
					</tr>
					@endforeach
				@endif
			</tbody>
		</table>
	</div>
</div>
	<div id="center">
			<a href="/exam/manageroom/create"><button class="action-button">back</button></a>
			<a href="/exam/manageroom/create/preview"><button class="action-button">next</button></a>
		</div>


	<!-- add project -->
		<div class="modal fade" id="addproject" role="dialog" aria-labelledby="exampleModalLabel">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title">Add Project</h4>
				      </div>
				      	<div class="modal-body">
							<div id="addroomTB">
								<table class="table table-bordered">
									<thead>
										<th>project id</th>
										<th>project name</th>
										<th>type</th>
									</thead>
									<tbody>
										@if($project == 0)
										@foreach($addProject as $pj)
										<tr>
											<td>{{$pj->group_project_id}}</td>
											<td>{{$pj->group_project_th_name}}</td>
											<td class="pjtype">{{$pj->type->type_name}}</td>
										</tr>
										@endforeach
										@else
										@foreach($addProject as $pj)
										<tr>
											<td>{{$pj->group_project_id}}</td>
											<td>{{$pj->group_project_th_name}}</td>
											<td class="pjtype">{{$pj->type->type_name}}</td>
										</tr>
										@endforeach
										@endif
									</tdoby>
								</table>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary" data-dismiss="modal" onclick="pjselect()">add</button>
						</div>
					</div>
				</div>
			</div>
		</div>

<script src="{!! URL::asset('js/room.js') !!}"></script>
<script>
$('.firstname').each(function(index) {
	document.getElementsByClassName('firstname')[index].innerHTML = $(this).text().split(' ')[0]
});
</script>
@stop
