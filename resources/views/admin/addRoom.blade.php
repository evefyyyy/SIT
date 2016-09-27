@extends('adminTmp')
@section('content')
<div class="row" id="addroom">
	<div class="col-xs-1 col-md-2 col-lg-3"></div>
	<div class="col-xs-10 col-md-8 col-lg-6">
	<h2>exam room 3</h2>
	<form action="{{url('exam/manageroom/create/editroom')}}" method="post">
		<input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
				<div class="row">
			    <div class="col-xs-4 col-md-3 col-lg-3 titlee">room</div>
				<div class="col-xs-3 col-md-5 col-lg-5">
					<select class="selectroom" name="selectroom">
						@foreach($rooms as $room)
					  <option value="{{$room->id}}">{{$room->room_name}}</option>
						@endforeach
					</select>
				</div>
				</div>
				<div class="row">
				<div class="col-xs-4 col-md-3 col-lg-3 titlee">date</div>
				<div class="col-xs-3 col-md-3 col-lg-4">
					<div class='input-group date datepicker'>
						<input type='text' class="form-control" name="examdate"/>
						<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
						</span>
					</div>
				</div>
				</div>
				<div class="row">
				<div class="col-xs-4 col-md-3 col-lg-3 titlee">Time</div>
				<div class="col-xs-4 col-md-3 col-lg-4">
					<div class='input-group date' id='timepicker1'>
                    <input type='text' class="form-control" placeholder="start" id="starttime" name="startTime"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                	</div>
                </div>
                <div class="col-xs-2 col-md-2 col-lg-2">
                    <input type='number' min="0" class="form-control" id="minute" name="minute">
                </div>
                <div class="col-xs-3 col-md-3 col-lg-3 time">minutes per group</div>
            	</div>
   				<div class="row">
				<div class="col-xs-4 col-md-3 col-lg-3 titlee">exam commitee</div>
				<div class="col-xs-8 col-md-9 col-lg-9">
					<select class="selectpicker" multiple data-width="100%" name="selectAdv">
						@foreach($advisor as $adv)
					  <option value="{{$adv->id}}">{{$adv->advisor_name}}</option>
						@endforeach
					</select>
				</div>
				</div>
			<div id="center">
			<button class="action-button" onclick="back()">back</button>

			<!-- <button class="action-button">next</button>
		</div> -->

		<button class="action-button" onClick="divFunction()">next</button>
			</div>

	</div>
	<input type="hidden" id="selectAdv" name="selectAdv"/>
</form>
	<div class="col-xs-1 col-md-2 col-lg-3"></div>
</div>
<script src="{!! URL::asset('js/room.js') !!}"></script>


@stop
