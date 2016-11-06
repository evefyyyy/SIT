@extends('advTmp')
@section('content')
<div class="row" id="editroom">
	<div class="col-xs-1 col-md-1 col-lg-2"></div>
	<form action="{{$url}}" method="post">
    {{method_field($method)}}
		<input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
	<div class="col-xs-10 col-md-10 col-lg-8">
	<h2>{{$groupId}}</h2>
	<div class="row head" id="center">
		<strong>{{$project[0]->group_project_eng_name}}</strong>{{$project[0]->group_project_th_name}}
	</div>
	<div class="row">
	</div>
	<div class="row">
		<div class="col-xs-2 col-md-3 col-lg-3 titlee">project type</div>
		<div class="col-xs-2 col-md-2 col-lg-2 type">{{$project[0]->type->type_name}}</div>
		<div class="col-xs-3 col-md-2 col-lg-2 titlee">main advisor</div>
		<div class="col-xs-5 col-md-5 col-lg-5">{{$advisor[0]->advisor_name}}</div>
	</div>
	<div class="row">
		<div class="col-xs-2 col-md-3 col-lg-3 titlee"></div>
		<div class="col-xs-2 col-md-2 col-lg-2 type"></div>
		<div class="col-xs-3 col-md-2 col-lg-2 titlee">co-advisor</div>
		@if(count($advisor) == 2)
		<div class="col-xs-5 col-md-5 col-lg-5">{{$advisor[1]->advisor_name}}</div>
		@endif
	</div>
	<div class="col-xs-1 col-md-1 col-lg-2"></div>
	</div>
</div>
<div class="row" id="givemark">
  <div class="col-xs-1 col-md-3 col-lg-3"></div>
  <div class="col-xs-10 col-md-6 col-lg-6">
    <p>{{$main[0]->criteria_main_name}} ({{$main[0]->score}}%)</p>
    <table class="table table-bordered">
      <thead>
       <tr>
       		<th>criteria</th>
       		<th width="15%">marks</th>
       		<th width="20%">full marks</th>
       </tr>
     </thead>
     <tbody>
			 @foreach($sub as $s)
        <tr><td>{{$s->criteria_sub_name}}</td><td><input type="number" min="0" max="100" class="form-control score" name = "giveScore[]" value="{{$s->getScore or ''}}"></td><td>{{$s->score}}</td></tr>
				@endforeach
      </tbody>
      <tfoot>
      	<tr><th>total score</th><th id="subtotal"></th><th id="tsubtotal"></th></tr>
      	<tr>
      		<th>grade</th>
      		<th colspan="2">
						<?php
							$gradeData = ['A','B+','B','C+','C','D+','D'];
						 ?>
      			<select class="selectgrade" title="-" id="selectGrade" onchange="selectGrade()" name="selectGrade">
					@foreach($gradeData as $gd)
						@if($grade == $gd)
					  <option value={{$gd}} selected>{{$gd}}</option>
						@else
						<option value={{$gd}}>{{$gd}}</option>
						@endif
					@endforeach
				</select>
				<input type="hidden" name="grade" id="grade">
			<label class="required-sign"></label>
			</th>
		</tr>
      </tfoot>
 	</table>
  </div>
  <div class="col-xs-1 col-md-3 col-lg-3"></div>
</div>
	<div id="center">
			<a href="/exam/round/{{$round}}"><button class="no-print action-button" type="button">back</button></a>
			<button class="action-button">save</button>
	</div>
	</form>
<script src="{!! URL::asset('js/bootstrap-select.min.js') !!}"></script>
<script src="{!! URL::asset('js/marks.js') !!}"></script>
<script type="text/javascript">
	function selectGrade(){
		var grade = document.getElementById("selectGrade").value
		document.getElementById("grade").value = grade;
		console.log(grade);
	}
</script>
@stop
