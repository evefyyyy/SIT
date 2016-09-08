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
									<span>Select</span>
								<ul class="dropdown" id="myid">
										@foreach($type as $ty)
										<li onclick="selectType({{$ty->id}})">{{$ty->type_name}}</li>
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
										<li onclick="selectCat({{$cat->id}})">{{$cat->category_name}}</li>
										@endforeach
									</ul>
								</div>
							</div>
				</div>
				<input type="button" name="next" class="next action-button" value="Next" />
			</fieldset>
			<fieldset id="stdno">
				<h2 class="fs-title">Team members</h2>
				<h3 class="fs-subtitle">Choose your team members</h3>
				<div class="row">
					@foreach($students as $std)
					<div class="col-xs-6 col-md-6">
						<input type="text" class="form-control" placeholder="Student ID" id="Student1No" value="{{$std->student_id}}" name="idStudent1" readonly/>
					</div>
					<div class="col-xs-6 col-md-6 stdname" id="std1Name">{{$std->student_prefix}}{{$std->student_fname}} {{$std->student_lname}}</div>
					@endforeach
				</div>
				<div class="row">
					<div class="col-xs-6 col-md-6">
						<input type="type" class="form-control" placeholder="Student ID" id="stdId2" name="idStudent2" value="{{$stdId2 or ''}}" onchange="check_name2()">
					</div>
					<div class="col-xs-6 col-md-6 stdname" id="fname2">{{$stdPre2 or ''}}{{$stdFname2 or ''}} {{$stdLname2 or ''}}</div>
				</div>
				<div class="row">
					<div class="col-xs-6 col-md-6">
						<input type="text" class="form-control" placeholder="Student ID" id="stdId3" name="idStudent3" value="{{$stdId3 or ''}}" onchange="check_name3()">
					</div>
					<div class="col-xs-6 col-md-6 stdname" id="fname3">{{$stdPre3 or ''}}{{$stdFname3 or ''}} {{$stdLname3 or ''}}</div>
				</div>
				<input type="button" name="previous" class="previous action-button" value="Previous" />
				<input type="button" name="next" class="next action-button" value="Next" />
			</fieldset>
			<fieldset>
				<h2 class="fs-title">Advisors</h2>
				<h3 class="fs-subtitle">Choose your project advisors</h3>
				<div class="row">
					<div class="col-xs-4 col-md-4 category">Main advisor</div>
					<div class="col-xs-8 col-md-8">
						<div class="data" action="demo_form.asp" method="get">
						  <input class="advisor form-control" list="browsers" name="browser1" id="mainAdvisor" placeholder="Search or select" />
						  <datalist class="data" id="browsers">
								@foreach($advisor as $ad)
							    <option>{{$ad->prefix}} {{$ad->advisor_fname}} {{$ad->advisor_lname}}</option>
								@endforeach
						  </datalist>

						</div>
					</div>
				</div>
		    	<div class="row">
					<div class="col-xs-4 col-md-4 category">Co-advisor</div>
					<div class="col-xs-8 col-md-8">
						<div class="data" action="demo_form.asp" method="get">
						  <input class="advisor form-control" list="browsers" name="browser2" id="coAdvisor" placeholder="Search or select"/>
						  <datalist class="data" id="browsers">
								@foreach($advisor as $ad)
						    <option>{{$ad->prefix}} {{$ad->advisor_fname}} {{$ad->advisor_lname}}</option>
								@endforeach
						  </datalist>
						</div>
					</div>
				</div>
		    	<input type="button" name="previous" class="previous action-button" value="Previous" />
				<input type="button" name="next" class="next action-button" value="Next" id="myBtn" onclick="getValue()" />
		    </fieldset>
			<fieldset>
				<h2 class="fs-title">Submit your project</h2>
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
				<div class="row">
				<div class="hidden-sm col-md-3"></div>
				<div class="col-sm-12 col-md-9">
					<div class="custom-file-upload">
				    <p>Upload your first draft proposal</p>
						<!-- <p>Your old file name is : {{$filename}}</p> -->
				    <input type="file" id="file" name="myfiles"/>
					</div>
				</div>
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

			<script type="text/javascript">
					function selectType(x){
						document.getElementById("selectType").value = x;
					}

					function selectCat(x){
						document.getElementById("selectCat").value = x;
					}

					function selectAdv1(x){
						document.getElementById("selectAdv1").value = x;
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
		                      }else{
														var _data = data.student_prefix+' '+data.student_fname+' '+data.student_lname
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
												}else{
													var _data = data.student_prefix+' '+data.student_fname+' '+data.student_lname
													$('#fname3').html(_data);
												}
									}
							 });
			}
			</script>

@stop