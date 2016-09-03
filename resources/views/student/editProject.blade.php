@extends('stdTmp')
@section('content')
	<div id="detail">
	<div class="row">
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
			<div id="image-cropper">
			  <div class="cropit-preview"></div>
			  <span class="glyphicon glyphicon-picture gi-1x"></span>
			  <input type="range" class="cropit-image-zoom-input" />
			  <span class="glyphicon glyphicon-picture gi-2x"></span>
			  <input type="file" class="cropit-image-input" />
			  <div class="select-image-btn">Select new image</div>
			</div>
		</div>
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
	</div>
	<div class="row">
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
			<h3>Driving simulation</h3>
			<h4>เกมจำลองสถานการณ์การสอบใบอนุญาติขับขี่รถยนต์</h4>
		</div>
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
	</div>
	<div class="row">
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
			<div class="panel panel-info">
			  <div class="panel-heading">details</div>
			  <div class="panel-body">
			  	<form class="form-inline editableform">
			    	<a href="#" id="desc" data-type="textarea" data-title="Enter username">Enter a short description of your project.</a>
				</form>
			  </div>
			</div>
		</div>
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
	</div>
	<div class="row">
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
		<div class="col-xs-10 col-sm-10 col-md-5 col-lg-5"></div>
		<div class="col-xs-1 col-sm-1 hidden-md hidden-lg"></div>
		<div class="col-xs-12 col-sm-12 hidden-md hidden-lg"></div>
		<div class="col-xs-1 col-sm-1 hidden-md hidden-lg"></div>
		<div class="col-xs-10 col-sm-10 col-md-5 col-lg-5">
		<div class="panel panel-info">
			<div class="panel-heading">author</div>
			<div class="panel-body">
			<div class="col-xs-6 col-md-6 col-lg-6 text">สุรพงษ์ เนตรประไพ</div>
			<div class="col-xs-6 col-md-6 col-lg-6 text">รหัสนักศึกษา 56130500126</div>
			<div class="col-xs-6 col-md-6 col-lg-6"></div>
			<div class="col-xs-6 col-md-6 col-lg-6 mail"><img height="11" src="/img/email.png"> <a href="#" id="email1">email</a></div>
			<div class="col-xs-6 col-md-6 col-lg-6 text">สุรพงษ์ เนตรประไพ</div>
			<div class="col-xs-6 col-md-6 col-lg-6 text">รหัสนักศึกษา 56130500126</div>
			<div class="col-xs-6 col-md-6 col-lg-6"></div>
			<div class="col-xs-6 col-md-6 col-lg-6 mail"><img height="11" src="/img/email.png"> <a href="#" id="email2">email</a></div>
			<div class="col-xs-6 col-md-6 col-lg-6 text">สุรพงษ์ เนตรประไพ</div>
			<div class="col-xs-6 col-md-6 col-lg-6 text">รหัสนักศึกษา 56130500126</div>
			<div class="col-xs-6 col-md-6 col-lg-6"></div>
			<div class="col-xs-6 col-md-6 col-lg-6 mail"><img height="11" src="/img/email.png"> <a href="#" id="email3">email</a></div>
			</div>
		</div>
		</div>
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
	</div>
	<div class="row">
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
		<div class="col-xs-10 col-sm-10 col-md-5 col-lg-5">
		<div class="panel panel-info">
			<div class="panel-heading">tools & techniques</div>
			<div class="panel-body">
			<div class="col-lg-12">
			<form class="form-inline editableform text">
			    <a href="#" id="tools" data-type="textarea">click here for an example</a>
			</form>
			</div>
			</div>
		</div>
		</div>
		<div class="col-xs-1 col-sm-1 hidden-md hidden-lg"></div>
		<div class="col-xs-12 col-sm-12 hidden-md hidden-lg"></div>
		<div class="col-xs-1 col-sm-1 hidden-md hidden-lg"></div>
		<div class="col-xs-10 col-sm-10 col-md-5 col-lg-5">
		<div class="panel panel-info">
			<div class="panel-heading">advisor</div>
			<div class="panel-body">
			<div class="col-lg-12 text">อ.อุมาพร</div>
			</div>
		</div>
		</div>
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
	</div>
	</div>
	<script src="{!! URL::asset('js/edit.js') !!}"></script>
	<script src="{!! URL::asset('js/jquery.cropit.js') !!}"></script>
	<script>
      $('#image-cropper').cropit({ imageBackground: true });
    </script>
@stop
