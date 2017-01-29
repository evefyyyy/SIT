@extends('adminTmp')
@section('content')
<div id="scoresheet">
    <h2><img height="45" src="/img/exam.png">create template</h2>
     <div class="row">
        <div class="col-xs-1 col-md-3 col-lg-3"></div>
        <div class="col-xs-10 col-md-6 col-lg-6 titlee" id="center">
			Template {{$countTemp}}
     	</div>
     <div class="col-xs-1 col-md-3 col-lg-3"></div>
 	</div>
  <form action="{{url('exam/managescore/template')}}" method="post">
    	<input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
 	<div class="row">
      <div class="col-xs-1 col-md-2 col-lg-2"></div>
      <div class="col-xs-10 col-md-8 col-lg-8 cri" id='_main'>
        <label>choose main criteria</label><a href='#' id='deselect-all'>deselect all</a><i class="lol">/</i><a href='#' id='select-all'>select all</a>
        <select id='main-order' multiple='multiple' name="mainCriteria[]" >/</span>
        @foreach($mainCriteria as $main)
			     <option value="{{$main->id}}">{{$main->criteria_main_name}}</option>
        @endforeach
		  </select>
      <input type="hidden" name="_selected_main" id="_selected_main" defaultValue=null>
	    </div>
      <div class="col-xs-1 col-md-2 col-lg-2"></div>
 	</div>
 	<div class="row">
        <div class="col-xs-1 col-md-2 col-lg-2"></div>
        <div class="col-xs-10 col-md-8 col-lg-8 cri" id='_sub'>
          <label>choose sub criteria</label><a href='#' id='deselect-all1'>deselect all</a><i class="lol">/</i><a href='#' id='select-all1'>select all</a>
          <select id='sub-order' multiple='multiple' name="subCriteria[]">
        @foreach($subCriteria as $sub)
			  <option value="{{$sub->id}}">{{$sub->criteria_sub_name}}</option>
        @endforeach
		  </select>
      <input type="hidden" name="_selected_sub" id="_selected_sub" defaultValue=null>
		</div>
     <div class="col-xs-1 col-md-2 col-lg-2"></div>
 	</div>
 	<div id="center" style="margin-top:15px">
  <a href="{{url('/exam/managescore/template')}}"><button type="button" class="action-button" >back</button></a>
  <button type="submit" class="action-button">save</button>
</div>
<!-- <input type="hidden" name="mainCriteria" id="mainCriteria">
<input type="hidden" name="subCriteria" id="subCriteria"> -->
</form>
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



</script>
@stop
