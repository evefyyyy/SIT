@extends('adminTmp')
@section('content')
<div class="row" id="editroom">
	<div class="col-xs-1 col-md-1 col-lg-2"></div>
	<div class="col-xs-10 col-md-10 col-lg-8">
	<h2>IT56-RE02</h2>
	<div class="row head" id="center">
		<strong>Future Learn</strong>เว็บไซต์หลักสูตรเรียนฟรี จากมหาวิทยาลัยชั้นนำประเทศอังกฤษ
	</div>
	<div class="row">
	</div>
	<div class="row">
		<div class="col-xs-2 col-md-3 col-lg-3 titlee">project type</div>
		<div class="col-xs-2 col-md-2 col-lg-2 type">research</div>
		<div class="col-xs-3 col-md-2 col-lg-2 titlee">main advisor</div>
		<div class="col-xs-5 col-md-5 col-lg-5">Ekapong Jungcharoensukying</div>
	</div>
	<div class="row">
		<div class="col-xs-2 col-md-3 col-lg-3 titlee"></div>
		<div class="col-xs-2 col-md-2 col-lg-2 type"></div>
		<div class="col-xs-3 col-md-2 col-lg-2 titlee">co-advisor</div>
		<div class="col-xs-5 col-md-5 col-lg-5">Olarn Rojanapornpun</div>
	</div>
	<div class="col-xs-1 col-md-1 col-lg-2"></div>
	</div>
</div>
<div class="row" id="viewmark">
  <div class="col-xs-1 col-md-1 col-lg-2"></div>
  <div class="col-xs-10 col-md-10 col-lg-8">
    <p><strong>round 1</strong> การศึกษาความเป็นไปได้ (25%)</p>
   <div class="col-xs-3 col-md-2 col-lg-3 titlee">date</div>
   <div class="col-xs-9 col-md-10 col-lg-9">9 June 2016</div>
   <div class="col-xs-3 col-md-2 col-lg-3 titlee">exam commitee</div>
   <div class="col-xs-9 col-md-10 col-lg-9"><span>c1</span></div>
    <table class="table table-bordered">
      <thead>
       <tr>
       		<th>criteria</th>
       		<th width="8%">c1</th>
       		<th width="8%">c2</th>
       		<th width="8%">c3</th>
       		<th width="8%">c4</th>
       		<th width="8%">c5</th>
       		<th width="15%">full marks</th>
       </tr>
     </thead>
     <tbody>
        <tr><td>ความสมบูรณ์ของงาน</td><td>35</td><td>30</td><td>35</td><td>30</td><td>32</td><td>40</td></tr>
        <tr><td>คุณภาพของงาน</td><td>25</td><td>30</td><td>38</td><td>32</td><td>28</td><td>40</td></tr>
        <tr><td>การตอบคำถาม</td><td>8</td><td>9</td><td>9</td><td>8</td><td>7</td><td>10</td></tr>
        <tr><td>การนำเสนองานและเอกสาร</td><td>10</td><td>9</td><td>7</td><td>7</td><td>6</td><td>10</td></tr>
      </tbody>
      <tfoot>
      	<tr><th>total score</th><th>78</th><th>78</th><th>85</th><th>80</th><th>74</th><th>100</th></tr>
      	<tr><th>grade</th><th>B</th><th>B</th><th>B+</th><th>B+</th><th>C+</th></tr>
      </tfoot>
 	</table>
  </div>
  <div class="col-xs-1 col-md-1 col-lg-2"></div>
</div>
	<div id="center">
			<a href="/exam/scorerecord"><button class="no-print action-button">back</button></a>
			<button class="action-button">save</button>
	</div>
<script src="{!! URL::asset('js/bootstrap-select.min.js') !!}"></script>
<script src="{!! URL::asset('js/marks.js') !!}"></script>
@stop