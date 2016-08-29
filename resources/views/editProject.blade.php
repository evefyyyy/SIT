@extends('stdTmp')
@section('content')
	<div id="detail">
	<div class="row">
		<div class="hidden-sm col-md-1"></div>
		<div class="col-sm-12 col-md-10">
			<h3>Driving simulation</h3>
			<h4>เกมจำลองสถานการณ์การสอบใบอนุญาติขับขี่รถยนต์</h4>
		</div>
		<div class="hidden-sm col-md-1"></div>
	</div>
	<div class="row">
		<div class="hidden-sm col-md-1"></div>
		<div class="col-sm-12 col-md-10">
			<h6>details</h6>
			<form class="form-inline editableform">
			    <a href="#" id="username">enter project details <img src="/img/pencil.png"></a> 
			</form>
		</div>
		<div class="hidden-sm col-md-1"></div>
	</div>
	</div>
	<script src="{!! URL::asset('js/edit.js') !!}"></script>
@stop