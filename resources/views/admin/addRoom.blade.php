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
					<select class="selectroom">
						@foreach($rooms as $room)
					  <option>{{$room->room_name}}</option>
						@endforeach
					</select>
				</div>
				</div>
				<div class="row">
				<div class="col-xs-4 col-md-3 col-lg-3 titlee">date</div>
				<div class="col-xs-3 col-md-3 col-lg-4">
					<div class='input-group date datepicker'>
						<input type='text' class="form-control"/>
						<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
						</span>
					</div>
				</div>
				</div>
   				<div class="row">
				<div class="col-xs-4 col-md-3 col-lg-3 titlee">exam commitee</div>
				<div class="col-xs-8 col-md-9 col-lg-9">
					<select class="selectpicker" multiple data-width="100%" data-max-options="5">
						@foreach($advisor as $adv)
					  <option onchange="selectAdv{{$adv->id}}">{{$adv->advisor_name}}</option>
						@endforeach
					</select>
				</div>
				</div>
			<div id="center">
			<a href="/exam/manageroom"><button class="action-button">back</button></a>
			<button class="action-button">next</button>
		</div>
	</div>
	<input type="hidden" id="selectAdv" name="selectAdv"/>
</form>
	<div class="col-xs-1 col-md-2 col-lg-3"></div>
</div>
<script src="{!! URL::asset('js/bootstrap-select.min.js') !!}"></script>
<script type="text/javascript">

	function selectAdv(x){
		document.getElementById("selectAdv").value = x;
		console.log(x);
	}

	$(function () {
		$('.selectroom').selectpicker({
		});
	});
	$(function () {
		$('.datepicker').datetimepicker({
			format: 'DD/MM/YYYY'
		});
	});
	$(function () {
        $('#timepicker1').datetimepicker({
            format: 'LT'
        });
    });
	$(function () {
		$('.selectpicker').selectpicker({
			liveSearch: true,
			maxOptionsText: 'limit reach (5 commitees max)',
			noneSelectedText: 'no commitee selected',
		});
	});
</script>
@stop
