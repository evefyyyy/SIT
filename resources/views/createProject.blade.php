@extends('tmp')
@section('content')
		<div class="page-wrap">
            <!-- multistep form -->
		<form id="msform">
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
				<input class="projectName" type="text" name="projectNameTH" placeholder="Project name (TH)" />
				<input class="projectName" type="text" name="projectNameEN" placeholder="Project name (EN)" />
				<div class="row">
					<div class="col-xs-6 col-md-6"><label class="category">Project Type</label></div>
							<div class="col-xs-6 col-md-6">
								<div id="dd" class="wrapper-dropdown-3" tabindex="1">
									<span>Select</span>
									<ul class="dropdown">
										<li><a href="#">Business</a></li>
										<li><a href="#">Research</a></li>
										<li><a href="#">Social</a></li>
									</ul>
								</div>
							</div>
					<div class="col-xs-6 col-md-6"><label class="category">Category</label></div>
							<div class="col-xs-6 col-md-6">
								<div id="ee" class="wrapper-dropdown-3" tabindex="1">
									<span>Select</span>
									<ul class="dropdown">
										<li><a href="#">Education</a></li>
										<li><a href="#">Games</a></li>
										<li><a href="#">Health</a></li>
										<li><a href="#">Sports</a></li>
										<li><a href="#">Travel</a></li>
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
					<div class="col-xs-6 col-md-6"><input class="stdno" type="text" name="StudentNo" placeholder="Student no." /></div>
					<div class="col-xs-6 col-md-6 stdname">จอห์นซีน่า กินทูน่า</div>
				</div>
				<div class="row">
					<div class="col-xs-6 col-md-6"><input class="stdno" type="text" name="StudentNo" placeholder="Student no." /></div>
					<div class="col-xs-6 col-md-6 stdname">จอห์นซีน่า กินทูน่า</div>
				</div>
				<div class="row">
					<div class="col-xs-6 col-md-6"><input class="stdno" type="text" name="StudentNo" placeholder="Student no." /></div>
					<div class="col-xs-6 col-md-6 stdname">จอห์นซีน่า กินทูน่า</div>
				</div>
				<input type="button" name="previous" class="previous action-button" value="Previous" />
				<input type="button" name="next" class="next action-button" value="Next" />
			</fieldset>
			<fieldset>
				<h2 class="fs-title">Advisors</h2>
				<h3 class="fs-subtitle">Choose your project advisors</h3>
				<div class="row">
					<div class="col-xs-4 col-md-4 category">Main advisor</div>
					<div class="col-xs-8 col-md-8"><input class="advisor" type="text" name="mainAdvisor" placeholder="Search or select" /></div>
				</div>
		    	<div class="row">
					<div class="col-xs-4 col-md-4 category">Co-advisor</div>
					<div class="col-xs-8 col-md-8"><input class="advisor" type="text" name="coAdvisor" placeholder="Search or select" /></div>
				</div>
		    	<input type="button" name="previous" class="previous action-button" value="Previous" />
				<input type="button" name="next" class="next action-button" value="Next" />
		    </fieldset>
			<fieldset>
		    	<h2 class="fs-title">Submit</h2>
		    	<h3 class="fs-subtitle">Ensure your information is correct before submission</h3>
		    	<div class="proname">Driving License Simulation Game</div>
		    	<div class="proname">เกมจำลองสถานการณ์การสอบใบอนุญาติขับขี่รถยนต์</div>
		    	<div class="title">Category :</div><div class="info">Social</div>
		    	<div class="title">Additional Category :</div><div class="info">Games</div>
				<div class="title" id="head">Team members</div>
					<table class="teammem">
					  <tr>
					    <td>Student no. 56130500065</td>
					    <td>มาร์ค ซัคเคอร์เบิร์ก</td>
					  </tr>
					  <tr>
					    <td>Student no. 56130500078</td>
					    <td>ซาบิน่า อัลตินเบโคว่า</td>
					  </tr>
					  <tr>
					    <td>Student no. 56130500126</td>
					    <td>โรเบิร์ต แพททินสัน</td>
					  </tr>
					</table>
				<div class="title" id="head">Advisor</div>
					<table class="teammem">
					  <tr>
					    <td>อ.พิเชฎฐ์ ลิ้มวชิรานันต์</td>
					  </tr>
					  <tr>
					  	<td>อ.เอกพงษ์ จึงเจริญสุขยิ่ง</td>
					  </tr>
					</table>
				<input type="button" name="previous" class="previous action-button" value="Previous" />
				<input type="submit" name="submit" class="submit action-button" value="submit" />
			</fieldset>
		</form>
	</div>
		<style type="text/css">
			#footer {
    			display: none;
    		}
		</style>
    	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
        <script src="js/myscripts.js"></script>
@stop
