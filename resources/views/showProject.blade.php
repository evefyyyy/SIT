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
		<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
			<h3>SIT Portfolio</h3>
			<h4>เว็บไซต์แสดงผลงานนักศึกษา</h4>
		</div>
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
			<button style="float:right" class="btn btn-browse" onclick="window.location.href='/student/myproject/edit'">edit my project</button>
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
			<img src="/img/group-member.jpg" class="group-member">
			<div class="panel panel-info">
				<div class="panel-heading">tools & techniques</div>
				<div class="panel-body">
					<div class="col-lg-12">
						Mobile : Android JavaEE, SDK Emulator<br>Database : SQLite<br>Graphic : Adobe Photoshop, Illustratore
					</div>
				</div>
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
			<div class="col-xs-6 col-md-6 col-lg-6 mail"><img height="11" src="/img/email.png"> evefyjubpajub@gmail.com</div>
			<div class="col-xs-6 col-md-6 col-lg-6 text">อาทิมา จันทแสงสว่าง</div>
			<div class="col-xs-6 col-md-6 col-lg-6 text">รหัสนักศึกษา 56130500126</div>
			<div class="col-xs-6 col-md-6 col-lg-6"></div>
			<div class="col-xs-6 col-md-6 col-lg-6 mail"><img height="11" src="/img/email.png"> evefyjubpajub@gmail.com</div>
			<div class="col-xs-6 col-md-6 col-lg-6 text">อาทิมา จันทแสงสว่าง</div>
			<div class="col-xs-6 col-md-6 col-lg-6 text">รหัสนักศึกษา 56130500126</div>
			<div class="col-xs-6 col-md-6 col-lg-6"></div>
			<div class="col-xs-6 col-md-6 col-lg-6 mail"><img height="11" src="/img/email.png"> evefyjubpajub@gmail.com</div>
			</div>
		</div>
		<div class="panel panel-info">
			<div class="panel-heading">advisor</div>
			<div class="panel-body">
			<div class="col-lg-12 text">อ.พิเชฏฐ์ ลิ่นวชิรานันต์</div>
			<div class="col-lg-12 text">อ.มนตรี สุภัททธรรม</div>
			</div>
		</div>
		<div class="embed-responsive embed-responsive-16by9">
			<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/DE7vsFYj81c"></iframe>
		</div>
		</div>
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
	</div>

</div>
@stop