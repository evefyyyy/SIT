@extends('adminTmp')
@section('content')
<div id="scoresheet">
    <h2><img height="45" src="/img/exam.png">create score sheet</h2>
     <div class="row">
        <div class="col-xs-1 col-md-3 col-lg-3"></div>
        <div class="col-xs-10 col-md-6 col-lg-6">
          <label>project type</label><span class="titlee">Business</span>
          <label class="amount">amount round<input type="number" class="form-control"></label>
          <button class="btn btn-primary">select</button>
     	</div>
     <div class="col-xs-1 col-md-3 col-lg-3"></div>
 	</div>
 	<div class="row">
        <div class="col-xs-1 col-md-3 col-lg-3"></div>
        <div class="col-xs-10 col-md-6 col-lg-6 round">
          choose main criteria
        <div class="row">
        <div class="col-xs-3 col-md-3 col-lg-3">
        	<label>round 1</label>
        </div>
        <div class="col-xs-5 col-md-5 col-lg-5">
          <select class="selectcri">
			  <option>การศึกษาความเป็นไปได้</option>
			  <option>การวิเคราะห์และออกแบบ</option>
			  <option>การทำงานของโปรแกรม</option>
			  <option>การทำงานของโปรแกรมที่สมบูรณ์</option>
		  </select>
		 </div>
		 <div class="col-xs-4 col-md-4 col-lg-4">
		  <input type="number" class="form-control"> %
		 </div>
		</div>
		<div class="row">
        <div class="col-xs-3 col-md-3 col-lg-3">
        	<label>round 2</label>
        </div>
        <div class="col-xs-5 col-md-5 col-lg-5">
          <select class="selectcri">
			  <option>การศึกษาความเป็นไปได้</option>
			  <option>การวิเคราะห์และออกแบบ</option>
			  <option>การทำงานของโปรแกรม</option>
			  <option>การทำงานของโปรแกรมที่สมบูรณ์</option>
		  </select>
		 </div>
		 <div class="col-xs-4 col-md-4 col-lg-4">
		  <input type="number" class="form-control"> %
		 </div>
		</div>
		<div class="row">
        <div class="col-xs-3 col-md-3 col-lg-3">
        	<label>round 3</label>
        </div>
        <div class="col-xs-5 col-md-5 col-lg-5">
          <select class="selectcri">
			  <option>การศึกษาความเป็นไปได้</option>
			  <option>การวิเคราะห์และออกแบบ</option>
			  <option>การทำงานของโปรแกรม</option>
			  <option>การทำงานของโปรแกรมที่สมบูรณ์</option>
		  </select>
		 </div>
		 <div class="col-xs-4 col-md-4 col-lg-4">
		  <input type="number" class="form-control"> %
		 </div>
		</div>
		<div class="row">
        <div class="col-xs-3 col-md-3 col-lg-3">
        	<label>round 4</label>
        </div>
        <div class="col-xs-5 col-md-5 col-lg-5">
          <select class="selectcri">
			  <option>การศึกษาความเป็นไปได้</option>
			  <option>การวิเคราะห์และออกแบบ</option>
			  <option>การทำงานของโปรแกรม</option>
			  <option>การทำงานของโปรแกรมที่สมบูรณ์</option>
		  </select>
		 </div>
		 <div class="col-xs-4 col-md-4 col-lg-4">
		  <input type="number" class="form-control"> %
		 </div>
		</div>
	</div>
     <div class="col-xs-1 col-md-3 col-lg-3"></div>
 	</div>
 </div>
<script src="{!! URL::asset('js/score.js') !!}"></script>
@stop