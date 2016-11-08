@extends('adminTmp')
@section('content')
<div id="scoresheet">
  <h2><img height="45" src="/img/exam.png">manage score sheet</h2>
  <div class="row">
    <div class="col-xs-2 col-md-2 col-lg-2"></div>
    <div class="col-xs-8 col-md-8 col-lg-8" id="center">
     <h6>Year {{$year}}</h6>
     <label>project type</label>
     <div class="btn-group">
      <select class="selecttype" title="select" name="selectType" id="selectType" onchange="selectType()">
          @foreach($typeName as $type)
          <option value="{{$type->id}}">{{$type->type_name}}</option>
          @endforeach
      </select>
    </div>
  <a href="#" class="display-none" id="typeEdit">
    <span class="glyphicon glyphicon-plus" id="typeSpan"></span>
    <span id="spanName">create</span>
  </a>
 </div>
 <div class="col-xs-2 col-md-2 col-lg-2"></div>
</div>
@foreach($types as $ty)
@if($ty != null)
<div class="{{$ty[0]->type_id}} box">
  @foreach($ty as $round)
  <div class="row">
    <div class="col-xs-1 col-md-3 col-lg-3"></div>
    <div class="col-xs-10 col-md-6 col-lg-6">
        <p><strong>round {{$round->round}}</strong> {{$round->criteria_main_name}} ({{$round->score}}%)</p>
      </a>
      <table class="viewsheet table table-bordered">
        <thead>
         <tr><th>criteria</th><th width="15%">score</th></tr>
       </thead>
       <tbody>
         @foreach($round->subScore as $sub)
        <tr><td>{{$sub->criteria_sub_name}}</td><td class="sub1">{{$sub->score}}</td></tr>
        @endforeach
      </tbody>
<?php
  $_score = array_map(function($s){
  return $s->score;
  },$round->subScore);
  $sumscore = array_sum($_score);
 ?>
      <tfoot><tr><th><strong>TOTAL</strong></th><th id="subtotal1">{{$sumscore}}</th></tr></tfoot>
    </table>
    </div>
 <div class="col-xs-1 col-md-3 col-lg-3"></div>
</div>
@endforeach
</div>
@endif
@endforeach
<div id="center">
  <a href="/exam/scoresheet"><button type="button" class="action-button">back</button></a>
  </form>
</div>
</div>
<script src="{!! URL::asset('js/score.js') !!}"></script>
<script type="text/javascript">
function selectType(){
  document.getElementById("typeEdit").className = 'btn btn-default'
  var e = document.getElementById("selectType").value;
  var selectType = parseInt(e);
  document.getElementById("typeEdit").href = "/exam/managescore/{{$year}}/mainscore/"+e
  var typeDatas = {!! json_encode($button) !!}
    if(typeDatas.indexOf(selectType) !=  -1){
      document.getElementById("typeSpan").className = 'glyphicon glyphicon-plus'
      document.getElementById("spanName").innerHTML = 'create'
    }else{
      document.getElementById("typeSpan").className = 'glyphicon glyphicon-pencil'
      document.getElementById("spanName").innerHTML = 'edit'
    }
}
</script>
@stop
