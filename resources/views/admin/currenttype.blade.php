@extends('setting')
@section('content')
<h2><img height="45" src="/img/setting.png">type</h2>
<div id="scoresheet">
      <div class="row">
          <div class="col-xs-1 col-md-2 col-lg-2"></div>
          <div class="col-xs-10 col-md-8 col-lg-8 ctype">
            <label>choose main criteria</label><a href='#' id='deselect-all'>deselect all</a><i class="lol">/</i><a href='#' id='select-all'>select all</a>
            <select id='main-order' multiple='multiple'>/</span>
                <option value="bus">business</option>
                <option value="re">research</option>
                <option value="so">social</option>
    		 </select>
    	    </div>
          <div class="col-xs-1 col-md-2 col-lg-2"></div>
     </div>
</div>

	<div id="center" style="margin-top:20px">
	  <button class="action-button cancel">cancel</button>
	  <button type="submit" class="action-button save">save</button>
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