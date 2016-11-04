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
       <form action="{{url('exam/managescore/year/mainscore')}}" method="post">
         <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
      <select class="selecttype" name="selectType" title="select" id="selectType">
        <option value="">{{$type}}</option>
      </select>
    </div>
    <label>score sheet</label>
    <div class="btn-group">
      <select class="selecttemp" id="selectTemp" title="select" onchange="selectTemp()">
       @foreach($template as $temp)
       <option class='selectTe' value="{{$temp->id}}">template {{$temp->temp_num}}</option>
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
          $(document).ready(function() {
              var sum = 0;
              $(".main{{$temp->count}}").each(function(){
                  sum += +$(this).val();
              });
               $("#maintotal{{$temp->count}}").html(sum);
          });
          $(document).on("change", ".main{{$temp->count}}", function() {
              var sum = 0;
              $(".main{{$temp->count}}").each(function(){
                  sum += +$(this).val();
              });
               $("#maintotal{{$temp->count}}").html(sum);
          });
          function countTotal() {
            if($("#maintotal{{$temp->count}}").html() != 100){
              $('#warning').html('<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> total must be 100%');
            } else {
              $('#warning').html( "" );
              window.location.href = 'create/subcriteria';
            }
          }
      </script>
    </div>
  </div>
 <div class="col-xs-1 col-md-3 col-lg-3"></div>
</div>
</div>
@endforeach
<div id="center">
  <a href="/exam/scoresheet"><button type="button" class="action-button">back</button></a>
  <button class="action-button" onclick="countTotal()">next</button>
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
  $('#selectType').on('change',function () {
        $.ajax({
          type:"get",
          dataType: "",
          url : "test/"+$(this).val(),
          success:function(data){
            if(data==0){

            }else{


       /*       $.each(data.data, function(k, v) {
                  $("input[name^='mainScore'").eq(k).val(v.score);
                  console.log(v.score);
                  sum += v.score ;
              });*/

            }


        }

  });
})
</script>
@stop
