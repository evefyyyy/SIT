@extends('adminTmp')
@section('content')
    <div id="pendlink">
         <a href="/admin/project/pending">Pending Projects</a>
    </div>
	<table id="projectTB" class="table table-bordered">
		<thead>
			<tr>
				<th style="width:12%">Project ID</th>
				<th style="width:66%">Project name</th>
				<th style="width:12%">Type</th>
				<th style="width:10%">Proposal</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>TI56-01</td>
				<td id="name">
					<a href="#">Health & Nutrition on Mobile Phone<br>
					โปรแกรมดูแลสุขภาพตามหลักโภชนาการบนโทรศัพท์มือถือ
					</a>
				</td>
				<td>Social</td>
				<td><a href="#"><img src="/img/pdf.png"></td></a>
			</tr>
			<tr>
				<td>TI55-02</td>
				<td id="name">
					<a href="#">Driving simulation<br>
					เกมจำลองสถานการณ์การสอบใบอนุญาติขับขี่รถยนต์
					</a>
				</td>
				<td>Research</td>
				<td></td>
			</tr>
			<tr>
				<td>TI55-02</td>
				<td id="name">
					<a href="#">Dreamaker<br>
					แอพพลิเคชั่นออมเงินสร้างฝัน
					</a>
				</td>	
				<td>Business</td>
				<td></td>
			</tr>
    	</tbody>
	</table>
@stop