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
      <select class="selecttype" title="select" name="selectType">
        @foreach($type as $t)
              <option value="{{$t->id}}">{{$t->type_name}}</option>
        @endforeach
      </select>

    </div>
    <label>score sheet</label>
    <div class="btn-group">
      <select class="selecttemp" id="selectTemp" title="select" onchange="selectTemp()">
        @foreach($template as $temp)
       <option value="{{$temp->id}}">{{$temp->temp_num}}</option>
       @endforeach
     </select>
     <input type="hidden" name="temp" id="temp">
   </div>
 </div>
 <div class="col-xs-2 col-md-2 col-lg-2"></div>
</div>
<div class="temp1 box">
  <div class="row">
    <div class="col-xs-1 col-md-3 col-lg-3"></div>
    <div class="col-xs-10 col-md-6 col-lg-6">
        <p><strong>round 1</strong> การศึกษาความเป็นไปได้</p>
      </a>
      <table class="counttable table table-bordered">
        <thead>
         <tr><th>criteria</th><th width="15%">score</th></tr>
       </thead>
       <tbody>
        <tr><td>ความสมบูรณ์ของงาน</td><td><input type="number" min="0" max="100" class="form-control score1"></td></tr>
        <tr><td>คุณภาพของงาน</td><td><input type="number" min="0" max="100" class="form-control score1"></td></tr>
        <tr><td>การตอบคำถาม</td><td><input type="number" min="0" max="100" class="form-control score1"></td></tr>
        <tr><td>การนำเสนองานและเอกสาร</td><td><input type="number" min="0" max="100" class="form-control score1"></td></tr>
      </tbody>
      <tfoot><tr><th><strong>TOTAL</strong></th><th id="subtotal1"></th></tr></tfoot>
    </table>
    <div class="alert alert-danger" role="alert" id="alert1">
     <a class="close" data-dismiss="alert">×</a>
     <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
     Total score must be 100
   </div>
   <script>
    $(document).on("change", ".score1", function() {
    var sum = 0;
    $(".score1").each(function(){
        sum += +$(this).val();
    });
     $("#subtotal1").html(sum);
    });
   </script>
 </div>
 <div class="col-xs-1 col-md-3 col-lg-3"></div>
</div>
</div>
<div id="center">
  <a href="/exam/managescore/year/mainscore/create"><button type="button" class="action-button">back</button></a>
  <button class="action-button checkvalue">save</button>
</div>
</div>
<script src="{!! URL::asset('js/score.js') !!}"></script>
<script>
$('.alert').hide();
  function selectTemp(){
    var temp = document.getElementById("selectTemp").value
    document.getElementById("temp").value = temp
  }
</script>
@stop
