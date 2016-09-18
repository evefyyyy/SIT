@extends('adminTmp')
@section('content')
<div class="row" id="editroom">
	<div class="col-xs-1 col-md-2 col-lg-2"></div>
	<div class="col-xs-10 col-md-8 col-lg-8">
	<h2 style="margin-bottom:0">exam room 3</h2>
	</div>
	<div class="col-xs-1 col-md-2 col-lg-2"></div>
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
					<th style="width:36%">project name</th>
					<th style="width:8%">main advisor</th>
					<th style="width:8%">co-advisor</th>
					<td style="width:2%" class="move-btn"></td>
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
						<td>9.00am - 9.30am</td>
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
						@foreach($data->advisor as $adv)
						<td><span>{{$adv->advisor_name}}</span></td>
						@endforeach
						<td class="move-btn"><button class="btn btn-danger btn-circle btn-sm" data-toggle="confirmation" data-singleton="true"><i class="glyphicon glyphicon-remove"></i></button></td>
					</tr>
					@endforeach
				@endif
			</tbody>
		</table>
	</div>
</div>
<p id="starttime1"></p>
	<div id="center">
			<a href="/exam/manageroom/create"><button class="action-button">back</button></a>
			<a href="preview"><button class="action-button">next</button></a>
		</div>

<script>
$('[data-toggle=confirmation]').confirmation({
				rootSelector: '[data-toggle=confirmation]',
				placement: 'top',
				onConfirm: function() {
					$(this).closest('tr').remove();
				}
			});
</script>


<script src="{!! URL::asset('js/room.js') !!}"></script>
@stop
