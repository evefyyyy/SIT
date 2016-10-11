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
            @foreach($template as $temp)
             <option value="{{$temp->template_number}}">template {{$temp->template_number}}</option>
             @endforeach
           </select>
          </div>
          <a href="/exam/managescore/template/edit" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span>edit</a>
          <span id="pendlink"><a href="template/create" class="btn"><span class="glyphicon glyphicon-plus"></span> new template</a></span>
        </div>
     <div class="col-xs-1 col-md-2 col-lg-2"></div>
  </div>

  @for($i=0 ; $i<$count;$i++)
  <div class="{{$i}} box">

  <div class="row">
        <div class="col-xs-1 col-md-3 col-lg-3"></div>
        <div class="col-xs-10 col-md-6 col-lg-6 cri">
          <label class="titlee">main criteria</label>
            <ul class="list-group">
              @foreach($mainCriteria as $main)
              <li class="list-group-item">{{$main->criteria_main_name}}</li>
              @endforeach
            </ul>
        </div>
     <div class="col-xs-1 col-md-3 col-lg-3"></div>
  </div>
  <div class="row">
        <div class="col-xs-1 col-md-3 col-lg-3"></div>
        <div class="col-xs-10 col-md-6 col-lg-6 cri">
          <label class="titlee">sub criteria</label>
            <ul class="list-group">
              @foreach($subCriteria as $sub)
              <li class="list-group-item">{{$sub->criteria_sub_name}}</li>
              @endforeach
            </ul>
        </div>
     <div class="col-xs-1 col-md-3 col-lg-3"></div>
  </div>
</div>
@endfor
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
