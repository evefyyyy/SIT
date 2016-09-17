@extends('adminTmp')
@section('content')
<div class="row" id="editroom">
	<div class="col-xs-1 col-md-1 col-lg-1"></div>
	<div class="col-xs-10 col-md-10 col-lg-10">
	<h2 style="margin-bottom:0">exam room 3</h2>
		<a data-toggle="modal" data-target="#addproject"><i class="glyphicon glyphicon-plus"></i>add project</a>
	</div>
	<div class="col-xs-1 col-md-1 col-lg-1"></div>
</div>
<div class="row">
	<div id="roomTB">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<td style="width:2%" class="move-btn"></td>
					<th style="width:8%">project id</th>
					<th style="width:8%">exam time</th>
					<th style="width:10%">student id</th>
					<th style="width:18%">student name</th>
					<th style="width:36%">project name</th>
					<th style="width:8%">main advisor</th>
					<th style="width:8%">co-advisor</th>
					<td style="width:2%" class="move-btn"></td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="move-btn"><button class="btn btn-info btn-xs move-up"><i class="glyphicon glyphicon-triangle-top"></i></button>
						<button class="btn btn-info btn-xs move-down"><i class="glyphicon glyphicon-triangle-bottom"></i></button>
					</td>
					<td>IT56-BU02</td>
					<td>9.00am - 9.30am</td>
					<td>56130500065<br>56130500078<br>56130500126</td>
					<td>Ronnaporn Aimmanoj<br>Surapong Nateprapai<br>Artima Chanthasangsawang</td>
					<td>ระบบบริหารจัดการอุปกรณ์แบบฝังตัว เพื่อการเฝ้าระวังหรือควบคุมผ่านเครือข่ายอินเทอร์เน็ต</td>
					<td>Olarn</td>
					<td>Kittiphan</td>
					<td class="move-btn"><button class="btn btn-danger btn-circle btn-sm" data-toggle="confirmation" data-singleton="true"><i class="glyphicon glyphicon-remove"></i></button></td>
				</tr>
				<tr>
					<td class="move-btn"><button class="btn btn-info btn-xs move-up"><i class="glyphicon glyphicon-triangle-top"></i></button>
						<button class="btn btn-info btn-xs move-down"><i class="glyphicon glyphicon-triangle-bottom"></i></button>
					</td>
					<td>IT56-RE12</td>
					<td>9.30am - 10.00am</td>
					<td>56130500054<br>56130500077
					<td>Saranya Sitthimunkhong<br>Mangkorn Jungroongrit
					<td>แผนที่ท่องเที่ยวไทย</td>
					<td>Olarn</td>
					<td>Ekapong</td>
					<td class="move-btn"><button class="btn btn-danger btn-circle btn-sm" data-toggle="confirmation" data-singleton="true"><i class="glyphicon glyphicon-remove"></i></button></td>
				</tr>
				<tr>
					<td class="move-btn"><button class="btn btn-info btn-xs move-up"><i class="glyphicon glyphicon-triangle-top"></i></button>
						<button class="btn btn-info btn-xs move-down"><i class="glyphicon glyphicon-triangle-bottom"></i></button>
					</td>
					<td>IT56-RE05</td>
					<td>10.00am - 10.30am</td>
					<td>56130500063<br>56130500114<br>56130500125
					<td>Warit Kosolwattanasombat<br>Chanon Phueksamut<br>Boonyanuch Keeratiratana
					<td>แอปพลิเคชั่นช่วยเหลือในการแปลภาษาและสนทนากับชาวต่างชาติ</td>
					<td>Olarn</td>
					<td>Autchara</td>
					<td class="move-btn"><button class="btn btn-danger btn-circle btn-sm" data-toggle="confirmation" data-singleton="true"><i class="glyphicon glyphicon-remove"></i></button></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
	<div id="center">
			<a href="/exam/manageroom/create"><button class="action-button">back</button></a>
			<a href="preview"><button class="action-button">next</button></a>
		</div>
	<!-- add project -->
		<div class="modal fade" id="addproject" role="dialog" aria-labelledby="exampleModalLabel">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title">Add Project</h4>
				      </div>
				      	<div class="modal-body">
							<div id="addroomTB">
								<table class="table table-bordered">
									<thead>
										<th>project id</th>
										<th>project name</th>
									</thead>
									<tbody>
										<tr>
											<td>IT56-RE05</td>
											<td>แอปพลิเคชั่นให้ความรู้ในการสอบใบขับขี่รถยนต์บนระบบปฏิบัติการแอนดรอย</td>
										</tr>
										<tr>
											<td>IT56-BU15</td>
											<td>แอปพลิเคชั่นสำหรับจัดการค่าย</td>
										</tr>
										<tr>
											<td>IT56-S01</td>
											<td>ระบบควบคุมพลังงานไฟฟ้าภายในอาคาร</td>
										</tr>
										<tr>
											<td>IT56-SO02</td>
											<td>แอปพลิเคชั่นอุปกรณ์ติดตามสัตว์เลี้ยง "เพ็ทเทนชั่น"</td>
										</tr>
									</tdoby>
								</table>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary" data-dismiss="modal" onclick="pjselect()">add</button>
						</form>
						</div>
					</div>
				</div>
			</div>
		</div>
<script src="{!! URL::asset('js/room.js') !!}"></script>
@stop