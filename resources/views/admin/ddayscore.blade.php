@extends('adminTmp')
@section('content')
<h2><img height="45" src="/img/leaderboard.png">Popular vote</h2>
<div class="hidden-xs col-md-1 col-lg-1"></div>
	<div class="col-xs-12 col-md-10 col-lg-10" id="scoreTB">
		<table id="pjtable" class="table table-bordered" style="width:100%">
			<thead>
				<tr>
					<th>project id</th>
					<th>project name</th>
					<th>score</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>IT56-SO34</td>
					<td>"เพ็ทเทนชัน" แอปพลิเคชันและอุปกรณ์ติดตามสัตว์เลี้ยง บนระบบปฏิบัติการแอนดรอยด์</td>
					<td>60</td>
				</tr>
				<tr>
					<td>IT56-SO18</td>
					<td>เกมแอปพลิเคชันเพื่อพัฒนาทักษะการพูดภาษาอังกฤษ</td>
					<td>52</td>
				</tr>
				<tr>
					<td>IT56-BU29</td>
					<td>เว็บแอปพลิเคชันเพื่อสนับสนุนการประเมินผลแผนพัฒนาคุณภาพชีวิตผู้สูงอายุกรุงเทพมหานคร</td>
					<td>54</td>
				</tr>
				<tr>
					<td>IT56-BU11</td>
					<td>แชทชิคชิคกับสวิสต์ฉึกฉึก</td>
					<td>54</td>
				</tr>
				<tr>
					<td>IT56-RE27</td>
					<td>สงครามมอนสเตอร์เสมือนจริง</td>
					<td>66</td>
				</tr>
				<tr>
					<td>IT56-RE27</td>
					<td>สงครามมอนสเตอร์เสมือนจริง</td>
					<td>66</td>
				</tr>
			</tbody>
    	</table>
	</div>
<div class="hidden-xs col-md-1 col-lg-1"></div>

<script>
$('#pjtable').DataTable();
</script>
@stop