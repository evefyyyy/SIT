@extends('advTmp')
@section('content')
<div class="row" id="editroom">
	<div class="col-xs-1 col-md-1 col-lg-2"></div>
	<div class="col-xs-10 col-md-10 col-lg-8">
	<h2>IT56-RE02</h2>
	<div class="row head" id="center">
		<strong>Future Learn</strong>เว็บไซต์หลักสูตรเรียนฟรี จากมหาวิทยาลัยชั้นนำประเทศอังกฤษ
	</div>
	<div class="row">
	</div>
	<div class="row">
		<div class="col-xs-2 col-md-3 col-lg-3 titlee">project type</div>
		<div class="col-xs-2 col-md-2 col-lg-2 type">research</div>
		<div class="col-xs-3 col-md-2 col-lg-2 titlee">main advisor</div>
		<div class="col-xs-5 col-md-5 col-lg-5">Ekapong Jungcharoensukying</div>
	</div>
	<div class="row">
		<div class="col-xs-2 col-md-3 col-lg-3 titlee"></div>
		<div class="col-xs-2 col-md-2 col-lg-2 type"></div>
		<div class="col-xs-3 col-md-2 col-lg-2 titlee">co-advisor</div>
		<div class="col-xs-5 col-md-5 col-lg-5">Olarn Rojanapornpun</div>
	</div>
	<div class="col-xs-1 col-md-1 col-lg-2"></div>
	</div>
</div>
<div class="row" id="givemark">
  <div class="col-xs-1 col-md-3 col-lg-3"></div>
  <div class="col-xs-10 col-md-6 col-lg-6">
    <p>การวิเคราะห์และออกแบบ (25%)</p>
    <table class="counttable table table-bordered">
      <thead>
       <tr>
       		<th>criteria</th>
       		<th width="15%">marks</th>
       		<th width="10%">total</th>
       </tr>
     </thead>
     <tbody>
        <tr><td>ความสมบูรณ์ของงาน</td><td><input type="number" min="0" max="100" class="form-control score"></td><td>20</td></tr>
        <tr><td>คุณภาพของงาน</td><td><input type="number" min="0" max="100" class="form-control score"></td><td>20</td></tr>
        <tr><td>การตอบคำถาม</td><td><input type="number" min="0" max="100" class="form-control score"></td><td>30</td></tr>
        <tr><td>การนำเสนองานและเอกสาร</td><td><input type="number" min="0" max="100" class="form-control score"></td><td>30</td></tr>
      </tbody>
      <tfoot><tr><th><strong>TOTAL SCORE</strong></th><th id="subtotal"></th><th></th></tr></tfoot>
 	</table>
  </div>
  <div class="col-xs-1 col-md-3 col-lg-3"></div>
</div>
	<div id="center">
			<button class="no-print action-button" onclick="back()">back</button>
			<button class="no-print action-button">next</button>
	</div>
<script src="{!! URL::asset('js/marks.js') !!}"></script>
@stop