@extends('stdTmp')
@section('content')
		<div class="page-wrap">
            <!-- multistep form -->
		<form id="msform" action="{{url('student/myproject/create')}}" method="post">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<!-- progressbar -->
			<ul id="progressbar">
				<li class="active">Create project</li>
				<li>Team members</li>
				<li>Advisors</li>
		    	<li>Submit</li>
			</ul>
			<!-- fieldsets -->
			<fieldset>
				<h2 class="fs-title">Create project</h2>
		    	<h3 class="fs-subtitle">Enter project name and select category</h3>
		    	<input class="projectName" type="text" id="projectNameEN" placeholder="Project name (EN)" name="Engname" />
				<input class="projectName" type="text" id="projectNameTH" placeholder="Project name (TH)" name="THname"/>
				<div class="row">
					<div class="col-xs-6 col-md-6"><label class="category">Project Type</label></div>
							<div class="col-xs-6 col-md-6">
								<div id="type" class="wrapper-dropdown-3" tabindex="1">
									<span>Select</span>
									<ul class="dropdown">
										@foreach($type as $ty)
										<li>{{$ty->type_name}}</li>
										@endforeach
									</ul>
								</div>
							</div>
					<div class="col-xs-6 col-md-6"><label class="category">Category</label></div>
							<div class="col-xs-6 col-md-6">
								<div id="category" class="wrapper-dropdown-3" tabindex="1">
									<span>Select</span>
									<ul class="dropdown">
										@foreach($category as $cat)
										<li>{{$cat->category_name}}</li>
										@endforeach
									</ul>
								</div>
							</div>
				</div>
				<input type="button" name="next" class="next action-button" value="Next" />
			</fieldset>
			<fieldset>
				<h2 class="fs-title">Team members</h2>
				<h3 class="fs-subtitle">Choose your team members</h3>
				<div class="row">
					@foreach($students as $st)
					<div class="col-xs-6 col-md-6"><input class="stdno" type="text" id="Student1No" placeholder="Student no." value="{{$st->student_id}}"/></div>
					<div class="col-xs-6 col-md-6 stdname" id="std1Name">{{$st->student_fname}} {{$st->student_lname}}</div>
					@endforeach
				</div>
				<div class="row">
					<div class="col-xs-6 col-md-6"><input class="stdno" type="text" id="Student2No" placeholder="Student no." name="idStudent2"/></div>
					<div class="col-xs-6 col-md-6 stdname" id="std2Name"></div>
				</div>
				<div class="row">
					<div class="col-xs-6 col-md-6"><input class="stdno" type="text" id="Student3No" placeholder="Student no." name="idStudent3"/></div>
					<div class="col-xs-6 col-md-6 stdname" id="std3Name"></div>
				</div>
				<input type="button" name="previous" class="previous action-button" value="Previous" />
				<input type="button" name="next" class="next action-button" value="Next" />
			</fieldset>
			<fieldset>
				<h2 class="fs-title">Advisors</h2>
				<h3 class="fs-subtitle">Choose your project advisors</h3>
				<div class="row">
					<div class="col-xs-4 col-md-4 category">Main advisor</div>
					<div class="col-xs-8 col-md-8"><input class="advisor" type="text" id="mainAdvisor" placeholder="Search or select" /></div>
				</div>
		    	<div class="row">
					<div class="col-xs-4 col-md-4 category">Co-advisor</div>
					<div class="col-xs-8 col-md-8"><input class="advisor" type="text" id="coAdvisor" placeholder="Search or select" /></div>
				</div>
		    	<input type="button" name="previous" class="previous action-button" value="Previous" />
				<input type="button" name="next" class="next action-button" value="Next" id="myBtn" onclick="getValue()" />
		    </fieldset>
			<fieldset>
		    	<h2 class="fs-title">Submit</h2>
		    	<h3 class="fs-subtitle">Ensure your information is correct before submission</h3>
		    	<div class="proname" id="projectNameEN1"></div>
		    	<div class="proname" id="projectNameTH1"></div>
		    	<div class="title">Project type :</div><div id="type1" class="info infoType"></div>
		    	<div class="title">Category :</div><div id="category1" class="info"></div>
				<div class="title" id="head">Team members</div>
					<table class="teammem">
					  <tr>
					    <td>Student no. <label id="Student1No1"></label></td>
					    <td id="std1Name1"></td>
					  </tr>
					  <tr>
					    <td>Student no. <label id="Student2No1"></label></td>
					    <td id="std2Name1"></td>
					  </tr>
					  <tr>
					    <td>Student no. <label id="Student3No1"></label></td>
					    <td id="std3Name1"></td>
					  </tr>
					</table>
				<div class="title" id="head">Advisor</div>
					<table class="teammem">
					  <tr>
					  	<td>Main advisor</td>
					    <td id="mainAdvisor1"></td>
					  </tr>
					  <tr>
					  	<td>Co-advisor</td>
					  	<td id="coAdvisor1"></td>
					  </tr>
					</table>
				<input type="button" name="previous" class="previous action-button" value="Previous" />
				<button type="submit" name="submit" class="submit action-button" value="submit" /> SUBMIT </button>
			</fieldset>
		</form>
	</div>
		<style type="text/css">
			#footer {
    			display: none;
    		}
		</style>
		<script src="{!! URL::asset('//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js') !!}"></script>
		<script src="{!! URL::asset('//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js') !!}"></script>
    	<script src="{!! URL::asset('js/create.js') !!}"></script>
@stop
