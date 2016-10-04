@extends('adminTmp')
@section('content')
<div id="scoresheet">
  <h2><img height="45" src="/img/exam.png">manage score sheet</h2>
  <div class="row">
    <div class="col-xs-2 col-md-3 col-lg-3"></div>
    <div class="col-xs-8 col-md-6 col-lg-6" id="center">
     <h6>Year 2016</h6>
      <label>project type</label>
      <div class="btn-group" style="margin-right:50px">
        <select class="selecttype">
         <option value="business">business</option>
         <option value="research">research</option>
         <option value="social">social</option>
       </select>
     </div>
 </div>
 <div class="col-xs-2 col-md-3 col-lg-3"></div>
</div>
<div class="business social box">
  <div class="row">
    <div class="col-xs-1 col-md-3 col-lg-3"></div>
    <div class="col-xs-10 col-md-6 col-lg-6">
      <p><strong>round1</strong> การศึกษาความเป็นไปได้ (15%)</p>
      <table class="table table-bordered">
        <thead>
         <tr><th>criteria</th><th width="15%">score</th></tr>
       </thead>
       <tbody>
        <tr><td>ความสมบูรณ์ของงาน</td><td><input type="number" min="0" max="100" class="form-control"></td></tr>
        <tr><td>คุณภาพของงาน</td><td><input type="number" min="0" max="100" class="form-control"></td></tr>
        <tr><td>การตอบคำถาม</td><td><input type="number" min="0" max="100" class="form-control"></td></tr>
        <tr><td>การนำเสนองานและเอกสาร</td><td><input type="number" min="0" max="100" class="form-control"></td></tr>
      </tbody>
      <tfoot><tr><th><strong>TOTAL</strong></th><th class="total"></th></tr></tfoot>
    </table>
    <div class="alert alert-danger" role="alert">
     <a class="close" data-dismiss="alert">×</a>
     <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
     Total score must be 100
   </div>
 </div>
 <div class="col-xs-1 col-md-3 col-lg-3"></div>
</div>
<div class="row">
  <div class="col-xs-1 col-md-3 col-lg-3"></div>
  <div class="col-xs-10 col-md-6 col-lg-6">
    <p><strong>round2</strong> การวิเคราะห์และออกแบบ (25%)</p>
    <table class="table table-bordered">
      <thead>
       <tr><th>criteria</th><th width="15%">score</th></tr>
     </thead>
     <tbody>
      <tr><td>ความสมบูรณ์ของงาน</td><td><input type="number" min="0" max="100" class="form-control"></td></tr>
      <tr><td>คุณภาพของงาน</td><td><input type="number" min="0" max="100" class="form-control"></td></tr>
      <tr><td>การตอบคำถาม</td><td><input type="number" min="0" max="100" class="form-control"></td></tr>
      <tr><td>การนำเสนองานและเอกสาร</td><td><input type="number" min="0" max="100" class="form-control"></td></tr>
    </tbody>
    <tfoot><tr><th><strong>TOTAL</strong></th><th></th></tr></tfoot>
  </table>
</div>
<div class="col-xs-1 col-md-3 col-lg-3"></div>
</div>
<div class="row">
  <div class="col-xs-1 col-md-3 col-lg-3"></div>
  <div class="col-xs-10 col-md-6 col-lg-6">
    <p><strong>round3</strong> การทำงานของโปรแกรม (30%)</p>
    <table class="table table-bordered">
      <thead>
       <tr><th>criteria</th><th width="15%">score</th></tr>
     </thead>
     <tbody>
      <tr><td>ความสมบูรณ์ของงาน</td><td><input type="number" min="0" max="100" class="form-control"></td></tr>
      <tr><td>คุณภาพของงาน</td><td><input type="number" min="0" max="100" class="form-control"></td></tr>
      <tr><td>การตอบคำถาม</td><td><input type="number" min="0" max="100" class="form-control"></td></tr>
      <tr><td>การนำเสนองานและเอกสาร</td><td><input type="number" min="0" max="100" class="form-control"></td></tr>
    </tbody>
    <tfoot><tr><th><strong>TOTAL</strong></th><th></th></tr></tfoot>
  </table>
</div>
<div class="col-xs-1 col-md-3 col-lg-3"></div>
</div>
<div class="row">
  <div class="col-xs-1 col-md-3 col-lg-3"></div>
  <div class="col-xs-10 col-md-6 col-lg-6">
    <p><strong>round4</strong> การทำงานของโปรแกรมที่สมบูรณ์ (30%)</p>
    <table class="table table-bordered">
      <thead>
       <tr><th>criteria</th><th width="15%">score</th></tr>
     </thead>
     <tbody>
      <tr><td>ความสมบูรณ์ของงาน</td><td><input type="number" min="0" max="100" class="form-control"></td></tr>
      <tr><td>คุณภาพของงาน</td><td><input type="number" min="0" max="100" class="form-control"></td></tr>
      <tr><td>การตอบคำถาม</td><td><input type="number" min="0" max="100" class="form-control"></td></tr>
      <tr><td>การนำเสนองานและเอกสาร</td><td><input type="number" min="0" max="100" class="form-control"></td></tr>
    </tbody>
    <tfoot><tr><th><strong>TOTAL</strong></th><th></th></tr></tfoot>
  </table>
</div>
<div class="col-xs-1 col-md-3 col-lg-3"></div>
</div>
</div>
</div>
<div id="center">
  <a><button class="action-button" onclick="back()">back</button></a>
  <a href="#"><button type="submit" class="action-button">save</button></a>
</div>
<script src="{!! URL::asset('js/score.js') !!}"></script>
<script>
$(".box").not(".business").show();
$('.alert').hide();
</script>
@stop