@extends('adminTmp')
@section('content')
<div id="scoresheet">
    <h2><img height="45" src="/img/exam.png">create template</h2>
     <div class="row">
        <div class="col-xs-1 col-md-3 col-lg-3"></div>
        <div class="col-xs-10 col-md-6 col-lg-6 titlee" id="center">
			Template 1
     	</div>
     <div class="col-xs-1 col-md-3 col-lg-3"></div>
 	</div>
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
 	<div id="center" style="margin-top:15px">
  <a><button class="action-button" onclick="back()">back</button></a>
  <a href="#"><button type="submit" class="action-button">save</button></a>
</div>
 </div>
<script src="{!! URL::asset('js/jquery.multi-select.js') !!}"></script>
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
    function back() {
    window.history.back()
}
</script>
@stop