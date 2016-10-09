@extends('adminTmp')
@section('content')
<div id="scoresheet">
  <h2><img height="45" src="/img/exam.png">manage score sheet</h2>
  <div class="row">
    <div class="col-xs-2 col-md-2 col-lg-2"></div>
    <div class="col-xs-8 col-md-8 col-lg-8" id="center">
     <h6>Year 2016</h6>
      <label>project type</label>
      <div class="btn-group" style="margin-right:30px">
        <select class="selecttype" name="selectType">
          @foreach($type as $ty)
         <option value="{{$ty->id}}">{{$ty->type_name}}</option>
         @endforeach
       </select>
     </div>
     <label>score sheet</label>
      <div class="btn-group">
        <select class="selecttemp" title="select">
         <option value="1">template 1</option>
         <option value="2">template 2</option>
         <option value="3">template 3</option>
       </select>
     </div>
    </div>
 <div class="col-xs-2 col-md-2 col-lg-2"></div>
</div>
<div class="1 box">
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
<div class="2 box">
  <div class="row">
    <div class="col-xs-1 col-md-3 col-lg-3"></div>
    <div class="col-xs-10 col-md-6 col-lg-6">
      template 2
</div>
<div class="col-xs-1 col-md-3 col-lg-3"></div>
</div>
</div>
<div class="3 box">
  <div class="row">
    <div class="col-xs-1 col-md-3 col-lg-3"></div>
    <div class="col-xs-10 col-md-6 col-lg-6">
      template 3
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
