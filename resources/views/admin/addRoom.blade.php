@extends('adminTmp')
@section('content')
<div class="row" id="addroom">
	<div class="col-xs-1 col-md-2 col-lg-3"></div>
	<div class="col-xs-10 col-md-8 col-lg-6">
	<h2>exam room 3</h2>
				<div class="row">
			    <div class="col-xs-4 col-md-3 col-lg-3 titlee">room</div>
				<div class="col-xs-3 col-md-5 col-lg-5">
					<select class="selectroom">
					  <option>Training 1</option>
					  <option>Training 2</option>
					  <option>Training 3</option>
					  <option>Training 5</option>
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
				<div class="col-xs-4 col-md-3 col-lg-3 titlee">Time</div>
				<div class="col-xs-4 col-md-3 col-lg-4">
					<div class='input-group date' id='timepicker1'>
                    <input type='text' class="form-control" placeholder="start"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                	</div>
                </div>
                <div class="col-xs-2 col-md-2 col-lg-2">
                    <input type='number' min="0" class="form-control">
                </div>
                <div class="col-xs-3 col-md-3 col-lg-3 time">minutes per group</div>
            	</div>
   				<div class="row">
				<div class="col-xs-4 col-md-3 col-lg-3 titlee">exam commitee</div>
				<div class="col-xs-8 col-md-9 col-lg-9">
					<select class="selectpicker" multiple data-width="100%" data-max-options="5">
					  <option>Ekapong</option>
					  <option>Kittiphan</option>
					  <option>Olarn</option>
					  <option>Pichai</option>
					  <option>Sumet</option>
					  <option>Umaporn</option>
					  <option>Wichai</option>
					</select>
				</div>
				</div>
			<div id="center">
			<a href="/exam/manageroom"><button class="action-button">back</button></a>
			<button class="action-button">next</button>
		</div>
	</div>
	<div class="col-xs-1 col-md-2 col-lg-3"></div>
</div>
<script src="{!! URL::asset('js/bootstrap-select.min.js') !!}"></script>
<script>
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