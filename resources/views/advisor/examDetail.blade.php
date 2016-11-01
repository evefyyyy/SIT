@extends('advTmp')
@section('content')
<div class="row" id="editroom">
	<div class="hidden-xs col-md-1 col-lg-2"></div>
	<div class="col-xs-12 col-md-10 col-lg-8">
	<h2>exam room 3</h2>
	<div class="row">
		<div class="col-xs-2 col-md-3 col-lg-3 titlee">room</div>
		<div class="col-xs-3 col-md-3 col-lg-3">Training room 3</div>
		<div class="col-xs-2 col-md-2 col-lg-2 titlee">date</div>
		<div class="col-xs-5 col-md-4 col-lg-4">19 September 2016 (9.30am-5.30pm)</div>
	</div>
	<div class="row">
		<div class="col-xs-3 col-md-3 col-lg-3 titlee">exam commitee</div>
		<div class="col-xs-9 col-md-8 col-lg-8">Sumet, Olarn, Ekapong, Patcharaporn</div>
	</div>
	<div class="hidden-xs col-md-1 col-lg-2"></div>
	</div>
</div>
<div class="row" id="marksTB">
	<div class="hidden-xs col-md-1 col-lg-2"></div>
	<div class="col-xs-12 col-md-10 col-lg-8">
	<table class="table table-bordered">
				<thead>
					<tr>
						<th>Project ID</th>
						<th>Project name</th>
						<th>give marks</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>IT56-RE02</td>
						<td id="name"><a class="tblink" href="/exam/selectround/IT56-31">เว็บไซต์หลักสูตรเรียนฟรี จากมหาวิทยาลัยชั้นนำประเทศอังกฤษ</a></td>
						<td><i class="glyphicon glyphicon-ok"></i></td>
					</tr>
					<tr>
						<td>IT56-SO01</td>
						<td id="name"><a class="tblink" href="#">แอพพลิเคชั่นสำหรับการออกกำลังกาย</a></td>
						<td><i class="glyphicon glyphicon-ok"></i></td>
					</tr>
					<tr>
						<td>IT56-BU05</td>
						<td id="name"><a class="tblink" href="#">ระบบบริหารจัดการอุปกรณ์แบบฝังตัว เพื่อการเฝ้าระวังหรือควบคุมผ่านเครือข่ายอินเทอร์เน็ต</a></td>
						<td></td>
					</tr>
					<tr>
						<td>IT56-SO03</td>
						<td id="name"><a class="tblink" href="#">สื่อการเรียนรู้ภาษาเวียดนาม</a></td>
						<td><i class="glyphicon glyphicon-ok"></i></td>
					</tr>
				</tbody>
			</table>
			<div id="center">
			  <a href="/exam/selectround"><button class="action-button">back</button></a>
			  <button type="submit" class="action-button">submit</button>
			</div>
	</div>
	<div class="hidden-xs col-md-1 col-lg-2"></div>
</div>
@stop
