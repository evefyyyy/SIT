@extends('adminTmp')
@section('content')
<div class="row" id="editroom">
	<div class="col-xs-1 col-md-1 col-lg-2"></div>
	<div class="col-xs-10 col-md-10 col-lg-8">
	<h2>exam room 3</h2>
	<div class="row">
		<div class="col-xs-6 col-md-3 col-lg-3 titlee">room</div>
		<div class="col-xs-6 col-md-3 col-lg-3">Training room 3</div>
		<div class="col-xs-6 col-md-2 col-lg-2 titlee">date</div>
		<div class="col-xs-6 col-md-4 col-lg-4">19 September 2016 (9.30am-5.30pm)</div>
	</div>
	<div class="row">
		<div class="col-xs-6 col-md-3 col-lg-3 titlee">exam commitee</div>
		<div class="col-xs-6 col-md-8 col-lg-8">Sumet, Olarn, Ekapong, Patcharaporn</div>
	</div>
	</div>
	<div class="col-xs-1 col-md-1 col-lg-2"></div>
</div>
<div class="row">
	<div id="roomTB">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th style="width:8%">project id</th>
					<th style="width:8%">exam time</th>
					<th style="width:10%">student id</th>
					<th style="width:18%">student name</th>
					<th style="width:36%">project name</th>
					<th style="width:10%">main advisor</th>
					<th style="width:10%">co-advisor</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>IT56-BU02</td>
					<td>9.00am - 9.30am</td>
					<td>56130500065<br>56130500078<br>56130500126</td>
					<td>Ronnaporn Aimmanoj<br>Surapong Nateprapai<br>Artima Chanthasangsawang</td>
					<td>ระบบบริหารจัดการอุปกรณ์แบบฝังตัว เพื่อการเฝ้าระวังหรือควบคุมผ่านเครือข่ายอินเทอร์เน็ต</td>
					<td>Olarn</td>
					<td>Kittiphan</td>
				</tr>
				<tr>
					<td>IT56-RE12</td>
					<td>9.30am - 10.00am</td>
					<td>56130500054<br>56130500077
					<td>Saranya Sitthimunkhong<br>Mangkorn Jungroongrit
					<td>แผนที่ท่องเที่ยวไทย</td>
					<td>Olarn</td>
					<td>Ekapong</td>
				</tr>
				<tr>
					<td>IT56-RE05</td>
					<td>10.00am - 10.30am</td>
					<td>56130500063<br>56130500114<br>56130500125
					<td>Warit Kosolwattanasombat<br>Chanon Phueksamut<br>Boonyanuch Keeratiratana
					<td>แอปพลิเคชั่นช่วยเหลือในการแปลภาษาและสนทนากับชาวต่างชาติ</td>
					<td>Olarn</td>
					<td>Autchara</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<div class="row" id="center">
	<div class="col-xs-1 col-md-1 col-lg-1"></div>
	<div class="col-xs-10 col-md-10 col-lg-10">
			<a href="editroom"><button class="action-button">back</button></a>
			<a href=""><button class="action-button">submit</button></a>
	</div>
	<div class="col-xs-1 col-md-1 col-lg-1"></div>
</div>
@stop