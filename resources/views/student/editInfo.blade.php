@extends('stdTmp')
@section('content')
		<div class="page-wrap">
            <!-- multistep form -->
		<form id="msform" action="{{$url}}" method="POST" enctype="multipart/form-data">
			{{method_field($method)}}
			<input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
			<!-- progressbar -->
			<ul id="progressbar">
				<li class="active">Edit project</li>
				<li>Team members</li>
				<li>Advisors</li>
		    	<li>Submit</li>
			</ul>
			<!-- fieldsets -->
			<fieldset>
				<h2 class="fs-title">Edit project</h2>
		    	<h3 class="fs-subtitle">Enter project name and select category</h3>
		    	<input class="projectName form-control" type="text" id="projectNameEN" placeholder="Project name (EN)" name="projectNameEN" value="{{$projectNameEN or ''}}" requried/>
				<input class="projectName form-control" type="text" id="projectNameTH" placeholder="Project name (TH)" name="projectNameTH" value="{{$projectNameTH or ''}}"requried/>
				<div class="row">
					<div class="col-xs-6 col-md-6"><label class="category">Project Type</label></div>
							<div class="col-xs-6 col-md-6">
								<div id="type" class="wrapper-dropdown-3" tabindex="1">
									<span>
										@if($projectType!=null)
										{{$projectType->type_name}}
										@else
										Select
										@endif
									</span>
								<ul class="dropdown" id="myid">
										@foreach($type as $ty)
											@if($ty->id===$projectType)
											<li active onclick="selectType({{$ty->id}})">{{$ty->type_name}}</li>
											@else
											<li onclick="selectType({{$ty->id}})">{{$ty->type_name}}</li>
											@endif
										@endforeach
									</ul>
								</div>
							</div>
					<div class="col-xs-6 col-md-6"><label class="category">Category</label></div>
							<div class="col-xs-6 col-md-6">
								<div id="category" class="wrapper-dropdown-3" tabindex="1">
									<span>
										@if($projectCategory!=null)
										{{$projectCategory->category_name}}
										@else
										Select
										@endif
									</span>
									<ul class="dropdown">
										@foreach($category as $cat)
										<li onclick="selectCat({{$cat->id}})">{{$cat->category_name}}</li>
										@endforeach
									</ul>
								</div>
							</div>
				</div>
				<input type="button" id="check1" name="next" class="next action-button" value="Next" />
			</fieldset>
			<fieldset id="stdno">
				<h2 class="fs-title">Team members</h2>
				<h3 class="fs-subtitle">Choose your team members</h3>
				<div class="row">
					<div class="col-xs-6 col-md-6">
						<input type="text" class="form-control" placeholder="Student ID" id="Student1No" value="{{Auth::user()->user_student->student->student_id}}" name="idStudent1" readonly/>
					</div>
					<div class="col-xs-6 col-md-6 stdname" id="std1Name">{{Auth::user()->user_student->student->student_name}}</div>
				</div>
				<div class="row">
					<div class="col-xs-6 col-md-6">
						<input type="type" class="form-control" placeholder="Student ID" id="stdId2" name="idStudent2" value="{{$stdId2 or ''}}" onchange="check_name2()">
					</div>
					<div class="col-xs-6 col-md-6 stdname" id="fname2">{{$stdName2 or ''}}</div>
				</div>
				<div class="row">
					<div class="col-xs-6 col-md-6">
						<input type="text" class="form-control" placeholder="Student ID" id="stdId3" name="idStudent3" value="{{$stdId3 or ''}}" onchange="check_name3()">
					</div>
					<div class="col-xs-6 col-md-6 stdname" id="fname3">{{$stdName3 or ''}}</div>
				</div>
				<input type="button" name="previous" class="previous action-button" value="Previous" />
				<input type="button" id="check2" name="next" class="next action-button" value="Next" />
			</fieldset>
			<fieldset>
				<h2 class="fs-title">Advisors</h2>
				<h3 class="fs-subtitle">Choose your project advisors</h3>
				<div class="row">
					<div class="col-xs-4 col-md-4 category">Main advisor</div>
					<div class="col-xs-8 col-md-5">
						  <select class="selectpicker1 advisor" multiple data-width="100%" data-max-options="1" id="mainAdvisor" name="mainAdv">
								@foreach($advisor as $ad)
								@if($advName1===$ad->advisor_name)
							    <option value="{{$ad->advisor_name}}" selected>{{$ad->advisor_name}}</option>
							    @else
							    <option value="{{$ad->advisor_name}}">{{$ad->advisor_name}}</option>
							    @endif
								@endforeach
						  </select>
					</div>
				</div>
		    	<div class="row">
					<div class="col-xs-4 col-md-4 category">Co-advisor</div>
					<div class="col-xs-8 col-md-5">
						  <select class="selectpicker1 advisor" multiple data-width="100%" data-max-options="1" id="coAdvisor" name="coAdv">
								@foreach($advisor as $ad)
						    @if($advName2===$ad->advisor_name)
							    <option value="{{$ad->advisor_name}}" selected>{{$ad->advisor_name}}</option>
							    @else
							    <option value="{{$ad->advisor_name}}">{{$ad->advisor_name}}</option>
							    @endif
								@endforeach
						  </select>
					</div>
				</div>
		    	<input type="button" name="previous" class="previous action-button" value="Previous" />
				<input type="button" id="check3" name="next" class="next action-button" value="Next" id="myBtn" onclick="getValue()" />
		    </fieldset>
			<fieldset>
				<h2 class="fs-title">Submit your project</h2>
		    	<h3 class="fs-subtitle">Ensure your information is correct before submission</h3>
		    	<div class="proname" id="projectNameEN1"></div>
		    	<div class="proname" id="projectNameTH1"></div>
		    	<div class="title">Project type :</div><div id="type1" class="info infoType"></div>
		    	<div class="title">Category :</div><div id="category1" class="info"></div>
		    	<div class="row">
					<div class="col-xs-1 col-sm-1 col-md-2 col-lg-2"></div>
					<div class="col-xs-10 col-sm-10 col-md-8 col-lg-8">
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
					  	<td width="25%">Main advisor</td>
					    <td id="mainAdvisor1"></td>
					  </tr>
					  <tr>
					  	<td>Co-advisor</td>
					  	<td id="coAdvisor1"></td>
					  </tr>
					</table>
					<div class="custom-file-upload">
				    <p>Upload your first draft proposal</p>
				    <input type="file" id="file" name="myfiles"/>
				    </div>
				    <div class="input_fields_wrap">
					    <div name="mytext[]">{{$filename}}<label class="remove_field"><span class="glyphicon glyphicon-remove"></span></label></div>
					</div>
					</div>
					<div class="col-xs-1 col-sm-1 col-md-2 col-lg-2"></div>
				</div>
				<input type="hidden" value="" id="selectType" name="selectType"/>
				<input type="hidden" value="" id="selectCat" name="selectCat"/>
				<input type="hidden" value="" id="selectAdv1" name="selectAdv1"/>
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
    	<script src="{!! URL::asset('js/create.js') !!}"></script>
    	<script src="{!! URL::asset('js/bootstrap-select.min.js') !!}"></script>

			<script type="text/javascript">
					function selectType(x){
						document.getElementById("selectType").value = x;
					}

					function selectCat(x){
						document.getElementById("selectCat").value = x;
					}

			    function check_name2(){
		         $.ajax({
		                type:"post",
		                dataType: "",
		                url :"stdId2",
		                data: {stdId2: $("#stdId2").val() , _token:$("#_token").val() },
		                    success:function(data){
													if(data=='0'){
														var _msg = null;
														var result = null;
														if(document.getElementById('stdId2').value === ''){
															result =''
														}else{
															_msg = "Data not found";
															result = _msg.fontcolor("red");
														}
		                        $('#fname2').html(result);
		                      }else if(data=='1'){
															var _msg = null;
															var result = null;
															if(document.getElementById('stdId2').value === ''){
																result =''
															}else{
																_msg = "This student already has group";
																result = _msg.fontcolor("red");
															}
			                        $('#fname2').html(result);
														}else{
															var _data = data.student_name
															$('#fname2').html(_data);
		                      	}
		                }
		             });
		    }

				function check_name3(){
					 $.ajax({
									type:"post",
									dataType: "",
									url :"stdId3",
									data: {stdId3: $("#stdId3").val() , _token:$("#_token").val() },
											success:function(data){
												if(data=='0'){
													var _msg = null;
													var result = null;
													if(document.getElementById('stdId3').value === ''){
														result =''
													}else{
														_msg = "Data not found";
														result = _msg.fontcolor("red");
													}
													$('#fname3').html(result);
												}else if(data=='1'){
														var _msg = null;
														var result = null;
														if(document.getElementById('stdId3').value === ''){
															result =''
														}else{
															_msg = "This student already has group";
															result = _msg.fontcolor("red");
														}
														$('#fname3').html(result);
													}else{
														var _data = data.student_name
														$('#fname3').html(_data);
													}
									}
							 });
			}
			</script>
<script type="text/javascript">
selectType({{$projectType->id}});
selectCat({{$projectCategory->id}});
</script>
@stop
