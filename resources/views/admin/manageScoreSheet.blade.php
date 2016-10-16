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
       <form action="{{url('exam/managescore/year')}}" method="post">
         <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
      <select class="selecttype" name="selectType">
        @foreach($type as $ty)
        <option value="{{$ty->id}}">{{$ty->type_name}}</option>
        @endforeach
      </select>
    </div>
    <label>score sheet</label>
    <div class="btn-group">
      <select class="selecttemp" id="selectTemp" title="select" onchange="selectTemp()">
        @foreach($template as $temp)
       <option value="{{$temp->id}}">template {{$temp->temp_num}}</option>
       @endforeach
     </select>
     <input type="hidden" name="temp" id="temp">
   </div>
 </div>
 <div class="col-xs-2 col-md-2 col-lg-2"></div>
</div>
@foreach($template as $temp)
<div class="{{$temp->id}} box">
  <div class="row">
    <div class="col-xs-1 col-md-3 col-lg-3"></div>
    <div class="col-xs-10 col-md-6 col-lg-6">
        @foreach($temp->main as $main)
        <p><strong>round {{$main->round}}</strong> {{$main->criteria_main_name}}</p>
      </a>
      <table class="counttable table table-bordered">
        <thead>
         <tr><th>criteria</th><th width="15%">score</th></tr>
       </thead>
       <tbody>
         @foreach($temp->sub as $sub)
        <tr><td>{{$sub->criteria_sub_name}}</td><td><input type="number" min="0" max="100" class="form-control score1" name="subScore[]"></td></tr>
        @endforeach
      </tbody>
      <tfoot><tr><th><strong>TOTAL</strong></th><th id="subtotal1"></th></tr></tfoot>
    </table>
    <div class="alert alert-danger" role="alert" id="alert1">
     <a class="close" data-dismiss="alert">×</a>
     <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
     Total score must be 100
   </div>
   @endforeach
 </div>
 <div class="col-xs-1 col-md-3 col-lg-3"></div>
</div>


</div>
@endforeach
<div id="center">
  <a href="/exam/scoresheet"><button type="button" class="action-button">back</button></a>
  <button type="submit" class="action-button">save</button>
</div>
</form>
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
