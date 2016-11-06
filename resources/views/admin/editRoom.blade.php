@extends('adminTmp')
@section('content')
<style>
	.disfix{
		display: none;
	}
</style>
<div class="row" id="editroom">
	<div class="col-xs-1 col-md-1 col-lg-1"></div>
	<div class="col-xs-10 col-md-10 col-lg-10">

		
		<h2 id="exam_room_name" style="margin-bottom:0">{{$room_names->room_name}}</h2>
		<a data-toggle="modal" data-target="#addproject"><i class="glyphicon glyphicon-plus"></i>add project</a>
	</div>
	<div class="col-xs-1 col-md-1 col-lg-1"></div>
</div>
<div class="row">
	<div id="roomTB">
		<table id="tableroom" class="table table-bordered table-hover">
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
				<?php $countrow = 0; ?>
					@if($project == 0)
					@else
					@foreach($project as $data)
					
					<input type="hidden" name="starttime" value="{{$data->starttime}}"> 
					<input type="hidden" name="endtime" value="{{$data->endtime}}">
					<input type="hidden" name="group_project_id" value="{{$data->id}}">
					<input type="hidden" name="roomid" value="{{$data-> roomexamid}}">
					<input type="hidden" name="countrow" value="{{$countrow++}}">
					<?php 
						$yumdata[$countrow] = [$data->starttime, $data->endtime, $data->id, $data->roomexamid, $countrow];
					 ?>
					<input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
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
				
				<input type="hidden" name="countrowmax" value="{{$countrow-1}}">
				@for ($i =1; $i< $countrow-1; $i++)
					<input type="hidden" name="yumdata[$i]" value="{{$yumdata[$i]}}">
				@endfor

		</tbody>
	</table>
</div>
</div>
<div id="center">
	<a href="/exam/manageroom/create"><button class="action-button">back</button></a>
	<button type="submit" class="action-button">next</button>
	
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
								<tr>
									<td style="width:2%" class="move-btn disfix"></td>
									<th>project id</th>
									<th>exam time</th>
									<th>student id</th>
									<th>student name</th>
									<th>project name</th>
									<th>type</th>
									<th>main advisor</th>
									<th>co-advisor</th>
									<td style="width:2%" class="del-btn"></td>
								</tr>
								</thead>
								<tbody>
									@if($project == 0)
									@foreach($addProject as $pj)

									<tr>
										<td class="move-btn disfix"><button class="btn btn-info btn-xs move-up"><i class="glyphicon glyphicon-triangle-top"></i></button>
											<button class="btn btn-info btn-xs move-down"><i class="glyphicon glyphicon-triangle-bottom"></i></button>
										</td>
										<td>{{$pj->group_project_id}}
										<input name="pjid" value="{{$pj->id}}" hidden>
										</td>
										<td>{{$data->starttime}} - {{$data->endtime}}</td>
										<td>
										@foreach($pj->student as $std)
											{{$std->student_id}}<br>
										@endforeach
										</td>
										<td class="fullname">
										@foreach($pj->student as $std)
												{{$std->student_name}}<br>
										@endforeach
										</td>
										<td>{{$pj->group_project_th_name}}</td>
										<td class="pjtype">{{$pj->type->type_name}}</td>
										@foreach($pj->advisor as $adv)
										<td><span class="firstname">{{$adv->advisor_name}}</span></td>
										@endforeach
										<td class="del-btn"><button class="btn btn-danger btn-circle btn-sm" data-toggle="confirmation" data-singleton="true"><i class="glyphicon glyphicon-remove"></i></button></td>
									</tr>
									@endforeach
									@else
									@foreach($addProject as $pj)
									<tr>
										<td class="move-btn disfix"><button class="btn btn-info btn-xs move-up"><i class="glyphicon glyphicon-triangle-top"></i></button>
											<button class="btn btn-info btn-xs move-down"><i class="glyphicon glyphicon-triangle-bottom"></i></button>
										</td>
										<td>{{$pj->group_project_id}}
										<input name="pjid" value="{{$pj->id}}" hidden>
										</td>
										<td>{{$data->starttime}} - {{$data->endtime}}</td>
										<td>
										@foreach($pj->student as $std)
											{{$std->student_id}}<br>
										@endforeach
										</td>
										<td>
										@foreach($pj->student as $std)
												{{$std->student_name}}<br>
										@endforeach
										</td>
										<td>{{$pj->group_project_th_name}}</td>
										<td class="pjtype">{{$pj->type->type_name}}</td>
										@foreach($pj->advisor as $adv)
										<td><span class="firstname">{{$adv->advisor_name}}</span></td>
										@endforeach
										<td class="del-btn"><button class="btn btn-danger btn-circle btn-sm" data-toggle="confirmation" data-singleton="true"><i class="glyphicon glyphicon-remove"></i></button></td>
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
	@stop
