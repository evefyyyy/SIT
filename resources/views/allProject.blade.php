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
					<a href="#">apple apple apple banana banana banana orange orange<br>
					อีฟฟี่ จุ้บปาจุ้บ อีฟฟี่ จุ้บปาจุ้บ อีฟฟี่ จุ้บปาจุ้บ อีฟฟี่ จุ้บปาจุ้บ อีฟฟี่ จุ้บปาจุ้บ
					</a>
				</td>
				<td>Business</td>
				<td></td>
			</tr>
			<tr>
				<td>TI55-02</td>
				<td id="name">
					<a href="#">This must be a very very longggggggggggggggggggggggg project name<br>
					จ้ำจี้มะเขือเปาะ กระเทาะหน้าแว่น พายเรืออ้อนแอ้น กระแท่นต้นกุ่ม สาวๆ หนุ่มๆ อาบน้ำท่าไหน อาบน้ำท่าวัด เอาแป้งที่ไหนผัด เอากระจกที่ไหนส่อง เยี่ยมๆ มองๆ นกขุนทองร้องกรู๊
					</a>
				</td>	
				<td>Research</td>
				<td></td>
			</tr>
    	</tbody>
	</table>
@stop