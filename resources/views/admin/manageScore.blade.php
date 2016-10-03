@extends('adminTmp')
@section('content')
<div id="scoresheet">
    <h2><img height="45" src="/img/exam.png">manage score sheet</h2>
    <div class="row">
        <div class="col-xs-1 col-md-3 col-lg-3"></div>
        <div class="col-xs-5 col-md-3 col-lg-3">
          <label>project type</label>
          <select class="selecttype">
             <option value="business">business</option>
             <option value="research">research</option>
             <option value="social">social</option>
         </select>
        </div>
        <div class="col-xs-5 col-md-3 col-lg-3">
         <label>template</label>
          <select class="selecttype">
             <option>score sheet 1</option>
             <option>score sheet 2</option>
             <option>score sheet 3</option>
         </select>
        </div>
     <div class="col-xs-1 col-md-3 col-lg-3"></div>
 </div>
 <div class="business research box">
    <div class="row" id="createlink">
        <div class="col-xs-1 col-md-3 col-lg-3"></div>
        <div class="col-xs-10 col-md-6 col-lg-6">
            <a href="managescore/create" class="btn">create score sheet</a>
        </div>
        <div class="col-xs-1 col-md-3 col-lg-3"></div>
    </div>
</div>
 <div class="social box">
    <div class="row">
        <div class="col-xs-1 col-md-3 col-lg-3"></div>
        <div class="col-xs-10 col-md-6 col-lg-6">
          <p><strong>round1</strong> การศึกษาความเป็นไปได้ (15%)</p><button type="submit" class="btn btn-primary save">save</button>
          <table id="table1" class="table table-bordered">
            <thead>
               <tr><th>criteria</th><th>score</th></tr>
           </thead>
           <tbody>
           	<tr><td>ความสมบูรณ์ของงาน</td><td>40</td></tr>
            <tr><td>คุณภาพของงาน</td><td>40</td></tr>
            <tr><td>การตอบคำถาม</td><td>10</td></tr>
            <tr><td>การนำเสนองานและเอกสาร</td><td>10</td></tr>
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
      <p><strong>round2</strong> การวิเคราะห์และออกแบบ (25%)</p><button class="btn btn-primary">save</button>
      <table id="table2" class="table table-bordered">
        <thead>
           <tr><th>criteria</th><th>score</th></tr>
       </thead>
       <tbody>
        <tr><td>ความสมบูรณ์ของงาน</td><td>40</td></tr>
        <tr><td>คุณภาพของงาน</td><td>40</td></tr>
        <tr><td>การตอบคำถาม</td><td>10</td></tr>
        <tr><td>การนำเสนองานและเอกสาร</td><td>10</td></tr>
    </tbody>
    <tfoot><tr><th><strong>TOTAL</strong></th><th></th></tr></tfoot>
</table>
</div>
<div class="col-xs-1 col-md-3 col-lg-3"></div>
</div>
<div class="row">
    <div class="col-xs-1 col-md-3 col-lg-3"></div>
    <div class="col-xs-10 col-md-6 col-lg-6">
      <p><strong>round3</strong> การทำงานของโปรแกรม (30%)</p><button class="btn btn-primary">save</button>
      <table id="table3" class="table table-bordered">
        <thead>
           <tr><th>criteria</th><th>score</th></tr>
       </thead>
       <tbody>
        <tr><td>ความสมบูรณ์ของงาน</td><td>40</td></tr>
        <tr><td>คุณภาพของงาน</td><td>40</td></tr>
        <tr><td>การตอบคำถาม</td><td>10</td></tr>
        <tr><td>การนำเสนองานและเอกสาร</td><td>10</td></tr>
    </tbody>
    <tfoot><tr><th><strong>TOTAL</strong></th><th></th></tr></tfoot>
</table>
</div>
<div class="col-xs-1 col-md-3 col-lg-3"></div>
</div>
<div class="row">
    <div class="col-xs-1 col-md-3 col-lg-3"></div>
    <div class="col-xs-10 col-md-6 col-lg-6">
      <p><strong>round4</strong> การทำงานของโปรแกรมที่สมบูรณ์ (30%)</p><button class="btn btn-primary">save</button>
      <table id="table4" class="table table-bordered">
        <thead>
           <tr><th>criteria</th><th>score</th></tr>
       </thead>
       <tbody>
        <tr><td>ความสมบูรณ์ของงาน</td><td>40</td></tr>
        <tr><td>คุณภาพของงาน</td><td>40</td></tr>
        <tr><td>การตอบคำถาม</td><td>10</td></tr>
        <tr><td>การนำเสนองานและเอกสาร</td><td>10</td></tr>
    </tbody>
    <tfoot><tr><th><strong>TOTAL</strong></th><th></th></tr></tfoot>
</table>
</div>
<div class="col-xs-1 col-md-3 col-lg-3"></div>
</div>
</div>
</div>
<script src="{!! URL::asset('js/score.js') !!}"></script>
<script>
$('.alert').hide();
$('#table1').editableTableWidget().numericInputExample();
$('#table1').editableTableWidget({
    cloneProperties: ['background', 'border', 'outline']
});
$('.alert .close').on("click", function(e) {
    e.stopPropagation();
    e.preventDefault();
    $(this).parent().hide();
});
</script>
@stop