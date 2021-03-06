@extends('adminTmp')
@section('content')
<div id="scoresheet">
  <form action="{{$url}}" method="post">
    {{method_field($method)}}
    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
  <h2><img height="45" src="/img/exam.png">edit score sheet</h2>
  <div class="row">
    <div class="col-xs-2 col-md-2 col-lg-2"></div>
    <div class="col-xs-8 col-md-8 col-lg-8" id="center">
     <h6>Year {{$year}}</h6>
     <label>project type <strong>{{$type}}</strong></label>
    <label>score sheet</label>
    <div class="btn-group">
      <select class="selecttemp" id="selectTemp" title="select" name="selectTemp">
        @foreach($template as $temp)
       <option value="{{$temp->id}}">template {{$temp->temp_num}}</option>
       @endforeach
     </select>
     <!-- <input type="hidden" name="temp" id="temp"> -->
   </div>
 </div>
 <div class="col-xs-2 col-md-2 col-lg-2"></div>
</div>
@foreach($template as $temp)
<div class="{{$temp->id}} box">
  <div class="row">
    <div class="col-xs-1 col-md-3 col-lg-3"></div>
    <div class="col-xs-10 col-md-6 col-lg-6">
      <div class="editmaincri">
        <table class="table table-bordered">
         <tbody>
           @foreach($temp->main as $main)
          <tr><td width="10%"><strong>round{{$main->round}}</strong></td><td> {{$main->criteria_main_name}}</td><td width="20%">
            <input type="number" min="0" max="100" class="form-control main{{$temp->count}}" name="mainScore[]"><span>%</spam>
            </td></tr>
          @endforeach
        </tbody>
        <tfoot><tr><th></th><th><font id="warning"></font><strong>TOTAL</strong></th><th><font id="maintotal{{$temp->count}}"></font> <span>%</span></th></tr></tfoot>
      </table>
      <script>
       $(document).on("load", ".main{{$temp->count}}", function() {
              var sum = 0;
              $(".main{{$temp->count}}").each(function(){
                  sum += +$(this).val();
              });
               $("#maintotal{{$temp->count}}").html(sum);
          });
          $(document).on("keyup", ".main{{$temp->count}}", function() {
              var sum = 0;
              $(".main{{$temp->count}}").each(function(){
                  sum += +$(this).val();
              });
               $("#maintotal{{$temp->count}}").html(sum);
          });
          // function countTotal() {
          //   if($("#maintotal{{$temp->count}}").html() != 100){
          //     $('#warning').html('<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> total must be 100%');
          //   } else {
          //     $('#warning').html( "" );
          //     window.location.href = 'create/subcriteria';
          //   }
          // }
      </script>
    </div>
  </div>
 <div class="col-xs-1 col-md-3 col-lg-3"></div>
</div>
</div>
@endforeach
<div id="center">
  <a href="/exam/managescore/{{$year}}"><button type="button" class="action-button">back</button></a>
  <button class="action-button" onclick="countTotal()">next</button>
</div>
</form>
</div>
<script src="{!! URL::asset('js/score.js') !!}"></script>
<script>
$('.alert').hide();

  // function selectTemp(){
  //   var temp = document.getElementById("selectTemp").value
  //   document.getElementById("temp").value = temp
  //   console.log(document.getElementsById("selectTemp"));
  // }
</script>
@stop
