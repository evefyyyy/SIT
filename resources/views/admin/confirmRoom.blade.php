@extends('adminTmp')
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
	</div>
	<div class="hidden-xs col-md-1 col-lg-2"></div>
</div>
<div class="row">
	<div id="roomTB">
		<table class="table table-bordered" style="width:90%">
			<thead>
				<tr>
					<th style="width:8%">project id</th>
					<th style="width:8%">exam time</th>
					<th style="width:10%">student id</th>
					<th style="width:18%">student name</th>
					<th style="width:34%">project name</th>
					<th style="width:6%">type</th>
					<th style="width:8%">main advisor</th>
					<th style="width:8%">co-advisor</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>IT56-BU02</td>
					<td>9.00am - 9.30am</td>
					<td>56130500065<br>56130500078<br>56130500126</td>
					<td>Ronnaporn Aimmanoj<br>Surapong Nateprapai<br>Artima Chanthasangsawang</td>
					<td>ระบบบริหารจัดการอุปกรณ์แบบฝังตัว เพื่อการเฝ้าระวังหรือควบคุมผ่านเครือข่ายอินเทอร์เน็ต</td>
					<td class="pjtype">research</td>
					<td class="firstname">Olarn abc</td>
					<td class="firstname">Kittiphan abc</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<div class="row" id="center">
	<div class="col-xs-1 col-md-1 col-lg-1"></div>
	<div class="col-xs-10 col-md-10 col-lg-10">
			<button class="no-print action-button" onclick="back()">back</button>
			<!-- <button class="no-print action-button">submit</button> -->
	</div>
	<div class="col-xs-1 col-md-1 col-lg-1"></div>
</div>

<script>
	function back() {
		history.back()
	}
	$('.firstname').each(function(index) {
	document.getElementsByClassName('firstname')[index].innerHTML = $(this).text().split(' ')[0]
});
</script>
@stop
