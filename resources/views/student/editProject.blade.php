@extends('stdTmp')
@section('content')
	<div id="detail">
	<div class="row">
		<div class="hidden-xs col-md-1 col-lg-1"></div>
		<div class="col-xs-12 col-md-10 col-lg-10">
			<h3>Driving simulation</h3>
			<h4>เกมจำลองสถานการณ์การสอบใบอนุญาติขับขี่รถยนต์</h4>
		</div>
		<div class="hidden-xs col-md-1 col-lg-1"></div>
	</div>
	<div class="row">
		<div class="hidden-xs col-md-1 col-lg-1"></div>
		<div class="col-xs-12 col-md-10 col-lg-10">
			<div class="panel panel-info">
			  <div class="panel-heading">details</div>
			  <div class="panel-body">
			  	<form class="form-inline editableform">
			    	<a href="#" id="desc" data-type="textarea">details</a>
				</form>
			  </div>
			</div>
		</div>
		<div class="hidden-xs col-md-1 col-lg-1"></div>
	</div>
	<div class="row">
		<div class="hidden-xs col-md-1 col-lg-1"></div>
		<div class="col-xs-12 col-md-4 col-lg-4"></div>
		<div class="col-xs-12 col-md-6 col-lg-6">
		<div class="panel panel-info">
			<div class="panel-heading">author</div>
			<div class="panel-body">
			<div class="col-xs-6 col-md-6 col-lg-6 text">นายสุรพงษ์ เนตรประไพ</div>
			<div class="col-xs-6 col-md-6 col-lg-6 text">รหัสนักศึกษา 56130500078</div>
			<div class="hidden-xs col-md-6 col-lg-6"></div>
			<div class="col-xs-12 col-md-6 col-lg-6 mail"><img height="11" src="/img/email.png"> <a href="#" id="email1">email</a></div>
			<div class="col-xs-6 col-md-6 col-lg-6 text">นางสาวอาทิมา จันทแสงสว่าง</div>
			<div class="col-xs-6 col-md-6 col-lg-6 text">รหัสนักศึกษา 56130500078</div>
			<div class="hidden-xs col-md-6 col-lg-6"></div>
			<div class="col-xs-12 col-md-6 col-lg-6 mail"><img height="11" src="/img/email.png"> <a href="#" id="email2">email</a></div>
			<div class="col-xs-6 col-md-6 col-lg-6 text">นายสุรพงษ์ เนตรประไพ</div>
			<div class="col-xs-6 col-md-6 col-lg-6 text">รหัสนักศึกษา 56130500078</div>
			<div class="hidden-xs col-md-6 col-lg-6"></div>
			<div class="col-xs-12 col-md-6 col-lg-6 mail"><img height="11" src="/img/email.png"> <a href="#" id="email3">email</a></div>
			</div>
		</div>
		<div class="panel panel-info">
			<div class="panel-heading">advisor</div>
			<div class="panel-body">
			<div class="col-lg-12 text">อ.พิเชฏฐ์ ลิ่มวชิรานันต์</div>
			<div class="col-lg-12 text">อ.พิเชฏฐ์ ลิ่มวชิรานันต์</div>
			</div>
		</div>
		</div>
	</div>
	<div class="row">
		<div class="hidden-xs col-md-1 col-lg-1"></div>
		<div class="col-xs-12 col-md-10 col-lg-10">
		<div class="panel panel-info">
			<div class="panel-heading">tools & techniques</div>
			<div class="panel-body">
			<form class="form-inline editableform text">
			    <a href="#" id="tools" data-type="textarea">• Mobile : Android JavaEE , Eclipse , SDK Emulator<br>• Database : SQLite<br>• Graphic : Adobe Photoshop , Illustratore</a>
			</form>
			</div>
		</div>
		</div>
	</div>
	</div>
	<script src="{!! URL::asset('js/edit.js') !!}"></script>
@stop