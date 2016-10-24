@extends('adminTmp')
@section('content')
<div id="scoresheet">
  <h2><img height="45" src="/img/exam.png">manage score sheet</h2>
  <div class="row">
    <div class="col-xs-2 col-md-2 col-lg-2"></div>
    <div class="col-xs-8 col-md-8 col-lg-8" id="center">
     <h6>Year 2016</h6>
     <label>project type</label>
     <div class="btn-group">
      <select class="selecttype" title="select" name="selectType">
          <option value="business">Business</option>
          <option value="research">Research</option>
          <option value="social">Social</option>
      </select>
    </div>
  <a href="/exam/managescore/year/mainscore/create" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span>edit</a>
 </div>
 <div class="col-xs-2 col-md-2 col-lg-2"></div>
</div>
<div class="business box">
  <div class="row">
    <div class="col-xs-1 col-md-3 col-lg-3"></div>
    <div class="col-xs-10 col-md-6 col-lg-6">
        <p><strong>round 1</strong> การศึกษาความเป็นไปได้</p>
      </a>
      <table class="viewsheet table table-bordered">
        <thead>
         <tr><th>criteria</th><th width="15%">score</th></tr>
       </thead>
       <tbody>
        <tr><td>ความสมบูรณ์ของงาน</td><td class="sub1">40</td></tr>
        <tr><td>คุณภาพของงาน</td><td class="sub1">40</td></tr>
        <tr><td>การตอบคำถาม</td><td class="sub1">10</td></tr>
        <tr><td>การนำเสนองานและเอกสาร</td><td class="sub1">10</td></tr>
      </tbody>
      <tfoot><tr><th><strong>TOTAL</strong></th><th id="subtotal1"></th></tr></tfoot>
    </table>
    <script>
          $(document).ready(function() {
              var sum = 0;
              $(".sub1").each(function(){
                  sum += +$(this).html();
              });
               $("#subtotal1").html(sum);
          });
    </script>
    </div>
 <div class="col-xs-1 col-md-3 col-lg-3"></div>
</div>
</div>
<div id="center">
  <a href="/exam/scoresheet"><button type="button" class="action-button">back</button></a>
  </form>
</div>
</div>
<script src="{!! URL::asset('js/score.js') !!}"></script>
@stop
