@extends('generalTmp')
@section('content')
<div id="detail">
	<div class="row">
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
			<img src="/img/test-cover.jpg" class="cover">
		</div>
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
	</div>
	<div class="row">
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
			<h3>SIT Portfolio</h3>
			<h4>เว็บไซต์แสดงผลงานนักศึกษา</h4>
		</div>
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
	</div>
	<div class="row">
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
			<div class="panel panel-info">
			  <div class="panel-heading">details</div>
			  <div class="panel-body">
			  	<div class="col-lg-12 text">
			    	แอพพลิเคชั่นการจัดการด้านเงินออมสำหรับคนรุ่นใหม่ โดยมีคาแร็คเตอร์ “คุณถุงเงิน” ทำหน้าที่ดูแลบัญชีรายรับ รายจ่าย รวมถึงบัญชีเงินออม พร้อมฟังก์ชั่นสรุปภาพรวมของบัญชีในรูปแบบแผนภูมิวงกลมที่ชัดเจน แอพพลิเคชั่นนี้จะคำนวณจำนวนเงินที่ต้องออมในแต่ละวัน จึงเหมาะสำหรับคนที่มีความฝันหรือมีเป้าหมายในการใช้เงินสะสม เช่น ซื้อบ้าน ซื้อรถ เรียนต่อ
				</div>
			  </div>
			</div>
		</div>
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
	</div>
	<div class="row">
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
		<div class="col-xs-10 col-sm-10 col-md-5 col-lg-5">
			<div id="image-cropper">
				<div class="cropit-preview group-pic"></div>
				<input type="file" name="file" id="file1" class="cropit-image-input" />
				<label for="file1" class="btn btn-default">Select new image</label>
				<button class="btn btn-primary">save</button>
				<span class="zoom-image">
					<span class="glyphicon glyphicon-picture gi-1x"></span>
					<input type="range" class="cropit-image-zoom-input" />
					<span class="glyphicon glyphicon-picture gi-2x"></span>
				</span>
				<p class="pic-size">4:3 aspect ratio</p>
			</div>
		</div>
		<div class="col-xs-1 col-sm-1 hidden-md hidden-lg"></div>
		<div class="col-xs-12 col-sm-12 hidden-md hidden-lg"></div>
		<div class="col-xs-1 col-sm-1 hidden-md hidden-lg"></div>
		<div class="col-xs-10 col-sm-10 col-md-5 col-lg-5">
		<div class="panel panel-info">
			<div class="panel-heading">author</div>
			<div class="panel-body">
			<div class="col-xs-6 col-md-6 col-lg-6 text">อาทิมา จันทแสงสว่าง</div>
			<div class="col-xs-6 col-md-6 col-lg-6 text">รหัสนักศึกษา 56130500126</div>
			<div class="col-xs-6 col-md-6 col-lg-6"></div>
			<div class="col-xs-6 col-md-6 col-lg-6 mail"><img height="11" src="/img/email.png"> <a href="#" id="email1">email</a></div>
			<div class="col-xs-6 col-md-6 col-lg-6 text">อาทิมา จันทแสงสว่าง</div>
			<div class="col-xs-6 col-md-6 col-lg-6 text">รหัสนักศึกษา 56130500126</div>
			<div class="col-xs-6 col-md-6 col-lg-6"></div>
			<div class="col-xs-6 col-md-6 col-lg-6 mail"><img height="11" src="/img/email.png"> <a href="#" id="email2">email</a></div>
			<div class="col-xs-6 col-md-6 col-lg-6 text">อาทิมา จันทแสงสว่าง</div>
			<div class="col-xs-6 col-md-6 col-lg-6 text">รหัสนักศึกษา 56130500126</div>
			<div class="col-xs-6 col-md-6 col-lg-6"></div>
			<div class="col-xs-6 col-md-6 col-lg-6 mail"><img height="11" src="/img/email.png"> <a href="#" id="email3">email</a></div>
			</div>
		</div>
		<div class="panel panel-info">
			<div class="panel-heading">advisor</div>
			<div class="panel-body">
			<div class="col-lg-12 text">อ.พิเชฏฐ์ ลิ่นวชิรานันต์</div>
			<div class="col-lg-12 text">อ.มนตรี สุภัททธรรม</div>
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
		<div class="col-xs-10 col-sm-10 col-md-5 col-lg-5"></div>
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
	</div>
	<div class="row">
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
		<div class="col-xs-10 col-sm-10 col-md-5 col-lg-5"></div>
		<div class="col-xs-1 col-sm-1 hidden-md hidden-lg"></div>
		<div class="col-xs-12 col-sm-12 hidden-md hidden-lg"></div>
		<div class="col-xs-1 col-sm-1 hidden-md hidden-lg"></div>
		<div class="col-xs-10 col-sm-10 col-md-5 col-lg-5">
			<div class="embed-responsive embed-responsive-16by9">
				<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/DE7vsFYj81c"></iframe>
			</div>
			<div class="input-group">
				<input type="text" class="form-control" value="" placeholder="Paste a youtube embed link">
				<span class="input-group-btn">
					<button class="btn btn-primary" onclick="" type="button">Embed</button>
				</span>
			</div><!-- /input-group -->				
		<div class="col-xs-10 col-sm-10 col-md-5 col-lg-5"></div>
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
	</div>
</div>
@stop