@extends('adminTmp')
@section('content')
<div id="scoresheet">
    <h2><img height="45" src="/img/exam.png">edit template</h2>
     <div class="row">
        <div class="col-xs-1 col-md-3 col-lg-3"></div>
        <div class="col-xs-10 col-md-6 col-lg-6 titlee" id="center">
			Template {{$tempNum}}
     	</div>
     <div class="col-xs-1 col-md-3 col-lg-3"></div>
 	</div>
  <form action="{{$url}}" method="post">
    {{method_field($method)}}
    	<input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
 	<div class="row">
        <div class="col-xs-1 col-md-2 col-lg-2"></div>
        <div class="col-xs-10 col-md-8 col-lg-8 cri">
          <label>choose main criteria</label><a href='#' id='deselect-all'>deselect all</a><i class="lol">/</i><a href='#' id='select-all'>select all</a>
          <select id='main-order' multiple='multiple' name="mainCriteria[]">/</span>
        @foreach($mainCriteria as $main)
          @if(1===$main->id)
  			  <option value="{{$main->id}}" selected>{{$main->criteria_main_name}}</option>
          @else
          <option value="{{$main->id}}">{{$main->criteria_main_name}}</option>
          @endif
        @endforeach
		  </select>
		</div>
     <div class="col-xs-1 col-md-2 col-lg-2"></div>
 	</div>
 	<div class="row">
        <div class="col-xs-1 col-md-2 col-lg-2"></div>
        <div class="col-xs-10 col-md-8 col-lg-8 cri">
          <label>choose sub criteria</label><a href='#' id='deselect-all1'>deselect all</a><i class="lol">/</i><a href='#' id='select-all1'>select all</a>
          <select id='sub-order' multiple='multiple' name="subCriteria[]">
        @foreach($subCriteria as $sub)
			  <option value="{{$sub->id}}">{{$sub->criteria_sub_name}}</option>
        @endforeach
		  </select>
		</div>
     <div class="col-xs-1 col-md-2 col-lg-2"></div>
 	</div>
 	<div id="center" style="margin-top:15px">
  <a href="{{url('/exam/managescore/template')}}"><button type="button" class="action-button">back</button></a>
  <button type="submit" class="action-button">save</button>
</div>
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
