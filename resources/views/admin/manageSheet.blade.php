@extends('adminTmp')
@section('content')
<div id="scoresheet">
    <h2><img height="45" src="/img/exam.png">manage template</h2>
     <div class="row">
        <div class="col-xs-1 col-md-2 col-lg-2"></div>
        <div class="col-xs-10 col-md-8 col-lg-8">
        <label>select template</label>
          <div class="btn-group">
            <select class="selecttemp">
             <option value="1">template 1</option>
             <option value="2">template 2</option>
             <option value="3">template 3</option>
           </select>
          </div>
          <a href="#" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span>edit</a>
          <span id="pendlink"><a href="template/create" class="btn">create template</a></span>
        </div>
     <div class="col-xs-1 col-md-2 col-lg-2"></div>
  </div>
  <div class="1 box">
  <div class="row">
        <div class="col-xs-1 col-md-3 col-lg-3"></div>
        <div class="col-xs-10 col-md-6 col-lg-6 cri">
          <label class="titlee">main criteria</label>
            <ul class="list-group">
              <li class="list-group-item">การศึกษาความเป็นไปได้</li>
              <li class="list-group-item">การวิเคราะห์และออกแบบ</li>
              <li class="list-group-item">การทำงานของโปรแกรม</li>
            </ul>
        </div>
     <div class="col-xs-1 col-md-3 col-lg-3"></div>
  </div>
  <div class="row">
        <div class="col-xs-1 col-md-3 col-lg-3"></div>
        <div class="col-xs-10 col-md-6 col-lg-6 cri">
          <label class="titlee">sub criteria</label>
            <ul class="list-group">
              <li class="list-group-item">ความสมบูรณ์ของงาน</li>
              <li class="list-group-item">คุณภาพของงาน</li>
              <li class="list-group-item">การตอบคำถาม</li>
              <li class="list-group-item">การนำเสนองานและเอกสาร</li>
            </ul>
        </div>
     <div class="col-xs-1 col-md-3 col-lg-3"></div>
  </div>
</div>
  <div id="center" style="margin-top:15px">
    <a><button class="action-button" onclick="back()">back</button></a>
  </div>
</div>
<script src="{!! URL::asset('js/jquery.multi-select.js') !!}"></script>
<script src="{!! URL::asset('js/score.js') !!}"></script>
<script>
$('#main-order').multiSelect({ keepOrder: true });
    $('#sub-order').multiSelect({ keepOrder: true });
    $('#select-all').click(function(){
      $('#main-order').multiSelect('select_all');
      return false;
    });
    $('#deselect-all').click(function(){
      $('#main-order').multiSelect('deselect_all');
      return false;
    });
    $('#select-all1').click(function(){
      $('#sub-order').multiSelect('select_all');
      return false;
    });
    $('#deselect-all1').click(function(){
      $('#sub-order').multiSelect('deselect_all');
      return false;
    });
</script>
@stop