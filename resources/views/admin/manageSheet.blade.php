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
          <span id="pendlink"><a href="template/create" class="btn">create template</a></span>
        </div>
     <div class="col-xs-1 col-md-2 col-lg-2"></div>
  </div>
  <div class="1 box">
  <div class="row">
        <div class="col-xs-1 col-md-2 col-lg-2"></div>
        <div class="col-xs-10 col-md-8 col-lg-8 cri">
          <label>choose main criteria</label><a href='#' id='deselect-all'>deselect all</a><i class="lol">/</i><a href='#' id='select-all'>select all</a>
          <select id='main-order' multiple='multiple'>/</span>
        <option value='1'>การศึกษาความเป็นไปได้</option>
        <option value='2'>การวิเคราะห์และออกแบบ</option>
        <option value='3'>การทำงานของโปรแกรม</option>
        <option value='4'>การทำงานของโปรแกรมที่สมบูรณ์</option>
      </select>
    </div>
     <div class="col-xs-1 col-md-2 col-lg-2"></div>
  </div>
  <div class="row">
        <div class="col-xs-1 col-md-2 col-lg-2"></div>
        <div class="col-xs-10 col-md-8 col-lg-8 cri">
          <label>choose sub criteria</label><a href='#' id='deselect-all1'>deselect all</a><i class="lol">/</i><a href='#' id='select-all1'>select all</a>
          <select id='sub-order' multiple='multiple'>
        <option value='1'>ความสมบูรณ์ของงาน</option>
        <option value='2'>คุณภาพของงาน</option>
        <option value='3'>การตอบคำถาม</option>
        <option value='4'>การนำเสนองานและเอกสาร</option>
      </select>
    </div>
     <div class="col-xs-1 col-md-2 col-lg-2"></div>
  </div>
</div>
  <div id="center" style="margin-top:15px">
    <a><button class="action-button" onclick="back()">back</button></a>
    <a href="#"><button type="submit" class="action-button">save</button></a>
  </div>
</div>
<script src="{!! URL::asset('js/jquery.multi-select.js') !!}"></script>
<script src="{!! URL::asset('js/score.js') !!}"></script>
@stop