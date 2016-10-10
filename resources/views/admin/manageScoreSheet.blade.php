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
      <a data-toggle="modal" data-target="#editmain"><p><strong>round1</strong> การศึกษาความเป็นไปได้ (15%)</p></a>
      <table class="table table-bordered">
        <thead>
         <tr><th>criteria</th><th width="15%">score</th></tr>
       </thead>
       <tbody>
        <tr><td>ความสมบูรณ์ของงาน</td><td><input type="number" min="0" max="100" class="form-control score1"></td></tr>
        <tr><td>คุณภาพของงาน</td><td><input type="number" min="0" max="100" class="form-control score1"></td></tr>
        <tr><td>การตอบคำถาม</td><td><input type="number" min="0" max="100" class="form-control score1"></td></tr>
        <tr><td>การนำเสนองานและเอกสาร</td><td><input type="number" min="0" max="100" class="form-control score1"></td></tr>
      </tbody>
      <tfoot><tr><th><strong>TOTAL</strong></th><th><font id="subtotal1"></font> %</th></tr></tfoot>
    </table>
 </div>
 <div class="col-xs-1 col-md-3 col-lg-3"></div>
</div>
<div class="row">
  <div class="col-xs-1 col-md-3 col-lg-3"></div>
  <div class="col-xs-10 col-md-6 col-lg-6">
    <a data-toggle="modal" data-target="#editmain"><p><strong>round2</strong> การวิเคราะห์และออกแบบ (25%)</p></a>
    <table class="table table-bordered">
      <thead>
       <tr><th>criteria</th><th width="15%">score</th></tr>
     </thead>
     <tbody>
        <tr><td>ความสมบูรณ์ของงาน</td><td><input type="number" min="0" max="100" class="form-control score2"></td></tr>
        <tr><td>คุณภาพของงาน</td><td><input type="number" min="0" max="100" class="form-control score2"></td></tr>
        <tr><td>การตอบคำถาม</td><td><input type="number" min="0" max="100" class="form-control score2"></td></tr>
        <tr><td>การนำเสนองานและเอกสาร</td><td><input type="number" min="0" max="100" class="form-control score2"></td></tr>
      </tbody>
      <tfoot><tr><th><strong>TOTAL</strong></th><th><font id="subtotal2"></font> %</th></tr></tfoot>
  </table>
</div>
<div class="col-xs-1 col-md-3 col-lg-3"></div>
</div>
<div class="row">
  <div class="col-xs-1 col-md-3 col-lg-3"></div>
  <div class="col-xs-10 col-md-6 col-lg-6">
    <a data-toggle="modal" data-target="#editmain"><p><strong>round3</strong> การทำงานของโปรแกรม (30%)</p></a>
    <table class="table table-bordered">
      <thead>
       <tr><th>criteria</th><th width="15%">score</th></tr>
     </thead>
     <tbody>
        <tr><td>ความสมบูรณ์ของงาน</td><td><input type="number" min="0" max="100" class="form-control score3"></td></tr>
        <tr><td>คุณภาพของงาน</td><td><input type="number" min="0" max="100" class="form-control score3"></td></tr>
        <tr><td>การตอบคำถาม</td><td><input type="number" min="0" max="100" class="form-control score3"></td></tr>
        <tr><td>การนำเสนองานและเอกสาร</td><td><input type="number" min="0" max="100" class="form-control score3"></td></tr>
      </tbody>
      <tfoot><tr><th><strong>TOTAL</strong></th><th><font id="subtotal3"></font> %</th></tr></tfoot>
  </table>
</div>
<div class="col-xs-1 col-md-3 col-lg-3"></div>
</div>
<div class="row">
  <div class="col-xs-1 col-md-3 col-lg-3"></div>
  <div class="col-xs-10 col-md-6 col-lg-6">
    <a data-toggle="modal" data-target="#editmain"><p><strong>round4</strong> การทำงานของโปรแกรมที่สมบูรณ์ (30%)</p></a>
    <table class="table table-bordered">
      <thead>
       <tr><th>criteria</th><th width="15%">score</th></tr>
     </thead>
     <tbody>
        <tr><td>ความสมบูรณ์ของงาน</td><td><input type="number" min="0" max="100" class="form-control score4"></td></tr>
        <tr><td>คุณภาพของงาน</td><td><input type="number" min="0" max="100" class="form-control score4"></td></tr>
        <tr><td>การตอบคำถาม</td><td><input type="number" min="0" max="100" class="form-control score4"></td></tr>
        <tr><td>การนำเสนองานและเอกสาร</td><td><input type="number" min="0" max="100" class="form-control score4"></td></tr>
      </tbody>
      <tfoot><tr><th><strong>TOTAL</strong></th><th><font id="subtotal4"></font> %</th></tr></tfoot>
  </table>
</div>
<div class="col-xs-1 col-md-3 col-lg-3"></div>
</div>

<!-- edit main criteria -->
  <div class="modal fade" id="editmain" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
          <h4 class="modal-title">main criteria</h4>
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
             <tbody>
              <tr><td width="10%"><strong>round1</strong></td><td>ความสมบูรณ์ของงาน</td><td width="20%"><input type="number" min="0" max="100" class="form-control main1"><span>%</spam></td></tr>
              <tr><td><strong>round2</strong></td><td>คุณภาพของงาน</td><td><input type="number" min="0" max="100" class="form-control main1"><span>%</spam></td></tr>
              <tr><td><strong>round3</strong></td><td>การตอบคำถาม</td><td><input type="number" min="0" max="100" class="form-control main1"><span>%</spam></td></tr>
              <tr><td><strong>round4</strong></td><td>การนำเสนองานและเอกสาร</td><td><input type="number" min="0" max="100" class="form-control main1"><span>%</spam></td></tr>
            </tbody>
            <tfoot><tr><th></th><th><font id="warning"></font><strong>TOTAL</strong></th><th><font id="maintotal1"></font><span>%</span></th></tr></tfoot>
          </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">cancel</button>
            <button type="submit" class="btn btn-primary">save</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

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
