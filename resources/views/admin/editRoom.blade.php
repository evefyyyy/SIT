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
					@if(isset($project))
					@foreach($project as $key=>$data)
					@for($i=0;$i<sizeOf($arrayproject);$i++)
					@if(in_array($data->id, $arrayproject))
					<input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
					<tr>
						<td>{{$data->group_project_id}}</td>
						<td>{{session()->get('starttime')."-".session()->get('starttime')+session()->get('minute') }}</td>
						<td>
							@foreach($projectstudent as $projs)
							@if($projs->project_pkid == $data->id)
							@foreach($student as $std)
							@if($projs->student_pkid==$std->id)
							{{$std->student_id}}<br>
							@endif
							@endforeach
							@endif
						@endforeach
						</td>
						<td>
						@foreach($projectstudent as $projs)
							@if($projs->project_pkid == $data->id)
							@foreach($student as $std)
							@if($projs->student_pkid==$std->id)
							{{$std->student_name}}<br>
							@endif
							@endforeach
							@endif
						@endforeach
						</td>
						<td>{{$data->group_project_th_name}}</td>
						<td>
							@foreach($types as $type)
								@if($type->id == $data->type_id)
								{{$type->type_name}}
								@endif
							@endforeach
						</td>
						<td>
							@foreach($projectadv as $pjadv)
								@if($pjadv->project_pkid==$data->id)
									@foreach($advisors as $advisor)
										@if($advisor->id==$pjadv->advisor_id && $pjadv->advisor_position_id==1)
										{{$advisor->advisor_name}}
										@endif
									@endforeach
								@endif
							@endforeach
						</td>
						<td>
							@foreach($projectadv as $pjadv)
								@if($pjadv->project_pkid==$data->id)
									@foreach($advisors as $advisor)
										@if($advisor->id==$pjadv->advisor_id && $pjadv->advisor_position_id==2)
										{{$advisor->advisor_name}}
										@endif
									@endforeach
								@endif
							@endforeach
						</td>
						
						
						<td class="del-btn"><button class="btn btn-danger btn-circle btn-sm" data-toggle="confirmation" data-singleton="true"><i class="glyphicon glyphicon-remove"></i></button></td>
					</tr>
					@break
					@endif
					@endfor
					@endforeach
					@endif
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
					<?php $countrow = 0; ?>
					@if(isset($project))
					@if(sizeOf($arrayproject)!=0)
					@foreach($project as $data)
					@if(!in_array($data->id, $arrayproject))
					<input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
					<tr>
						<td>{{$data->group_project_id}}</td>
						<td>
							@foreach($projectstudent as $projs)
							@if($projs->project_pkid == $data->id)
							@foreach($student as $std)
							@if($projs->student_pkid==$std->id)
							{{$std->student_id}}<br>
							@endif
							@endforeach
							@endif
						@endforeach
						</td>
						<td>
						@foreach($projectstudent as $projs)
							@if($projs->project_pkid == $data->id)
							@foreach($student as $std)
							@if($projs->student_pkid==$std->id)
							{{$std->student_name}}<br>
							@endif
							@endforeach
							@endif
						@endforeach
						</td>
						<td>{{$data->group_project_th_name}}</td>
						<td>
							@foreach($types as $type)
								@if($type->id == $data->type_id)
								{{$type->type_name}}
								@endif
							@endforeach
						</td>
						<td>
							@foreach($projectadv as $pjadv)
								@if($pjadv->project_pkid==$data->id)
									@foreach($advisors as $advisor)
										@if($advisor->id==$pjadv->advisor_id && $pjadv->advisor_position_id==1)
										{{$advisor->advisor_name}}
										@endif
									@endforeach
								@endif
							@endforeach
						</td>
						<td>
							@foreach($projectadv as $pjadv)
								@if($pjadv->project_pkid==$data->id)
									@foreach($advisors as $advisor)
										@if($advisor->id==$pjadv->advisor_id && $pjadv->advisor_position_id==2)
										{{$advisor->advisor_name}}
										@endif
									@endforeach
								@endif
							@endforeach
						</td>
						
						
						<td class="del-btn"><a href="/exam/manageroom/addDatas/{{$data->id}}" class="btn btn-danger btn-circle btn-sm"><i class="glyphicon glyphicon-remove"></i></a></td>
					</tr>

					@endif
					@endforeach
					@else
					@foreach($project as $data)
											<input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
					<tr>
						<td>{{$data->group_project_id}}</td>
						<td>
							@foreach($projectstudent as $projs)
							@if($projs->project_pkid == $data->id)
							@foreach($student as $std)
							@if($projs->student_pkid==$std->id)
							{{$std->student_id}}<br>
							@endif
							@endforeach
							@endif
						@endforeach
						</td>
						<td>
						@foreach($projectstudent as $projs)
							@if($projs->project_pkid == $data->id)
							@foreach($student as $std)
							@if($projs->student_pkid==$std->id)
							{{$std->student_name}}<br>
							@endif
							@endforeach
							@endif
						@endforeach
						</td>
						<td>{{$data->group_project_th_name}}</td>
						<td>
							@foreach($types as $type)
								@if($type->id == $data->type_id)
								{{$type->type_name}}
								@endif
							@endforeach
						</td>
						<td>
							@foreach($projectadv as $pjadv)
								@if($pjadv->project_pkid==$data->id)
									@foreach($advisors as $advisor)
										@if($advisor->id==$pjadv->advisor_id && $pjadv->advisor_position_id==1)
										{{$advisor->advisor_name}}
										@endif
									@endforeach
								@endif
							@endforeach
						</td>
						<td>
							@foreach($projectadv as $pjadv)
								@if($pjadv->project_pkid==$data->id)
									@foreach($advisors as $advisor)
										@if($advisor->id==$pjadv->advisor_id && $pjadv->advisor_position_id==2)
										{{$advisor->advisor_name}}
										@endif
									@endforeach
								@endif
							@endforeach
						</td>
						
						
						<td class="del-btn"><a href="/exam/manageroom/addDatas/{{$data->id}}" class="btn btn-danger btn-circle btn-sm"><i class="glyphicon glyphicon-remove"></i></a></td>
					</tr>
					
				@endforeach
				@endif
				@endif
				<input type="hidden" name="countrowmax" value="{{$countrow-1}}">
				@for ($i =1; $i< $countrow-1; $i++)
					<input type="hidden" name="yumdata[$i]" value="{{$yumdata[$i]}}">
				@endfor

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
