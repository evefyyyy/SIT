@extends('adminTmp')
@section('content')
<div id="scoresheet">
  <form action="{{$url}}" method="post">
    {{method_field($method)}}
  <h2><img height="45" src="/img/exam.png">edit score sheet</h2>
  <div class="row">
    <div class="col-xs-2 col-md-2 col-lg-2"></div>
    <div class="col-xs-8 col-md-8 col-lg-8" id="center">
      <form action="{{url('exam/managescore/$year/subscore/$type')}}" method="post">
        <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
     <h6>Year {{$year}}</h6>
     <label>project type <strong>business</strong></label>
    <label>score sheet</label><strong>Template {{$tempNum}}</strong>
 </div>
 <div class="col-xs-2 col-md-2 col-lg-2"></div>
</div>

@foreach($selectTemp as $temp)
  <div class="row">
    <div class="col-xs-1 col-md-3 col-lg-3"></div>
    <div class="col-xs-10 col-md-6 col-lg-6">
        @foreach($temp->main as $main)
        <p><strong>round {{$main->round}}</strong> {{$main->criteria_main_name}} ({{$temp->score}}%)</p>
        @endforeach
      <table class="counttable table table-bordered">
        <thead>
         <tr><th>criteria</th><th width="15%">score</th></tr>
       </thead>
       <tbody>
         @foreach($temp->sub as $sub)
        <tr><td>{{$sub->criteria_sub_name}}</td><td><input type="number" min="0" max="100" class="form-control score{{$temp->count}}" name="subScore[]"></td></tr>
        @endforeach
      </tbody>
      <tfoot><tr><th><strong>TOTAL</strong></th><th id="subtotal{{$temp->count}}"></th></tr></tfoot>
    </table>
    <div class="alert alert-danger" role="alert" id="alert1">
     <a class="close" data-dismiss="alert">×</a>
     <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
     Total score must be 100
   </div>
   <script>
    $(document).on("change", ".score{{$temp->count}}", function() {
    var sum = 0;
    $(".score{{$temp->count}}").each(function(){
        sum += +$(this).val();
    });
     $("#subtotal{{$temp->count}}").html(sum);
    });
   </script>
 </div>
 <div class="col-xs-1 col-md-3 col-lg-3"></div>
</div>

@endforeach
<div id="center">
  <a href="/exam/managescore/{{$year}}/mainscore/{{$type}}"><button type="button" class="action-button">back</button></a>
  <button type="submit" class="action-button checkvalue">save</button>
  </form>
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
