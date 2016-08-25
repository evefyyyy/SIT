@extends('stdTmp')
@section('content')
	<div id="waitApp">
	<div class="proname">{{$Engname}}</div>
	<div class="proname">เกมจำลองสถานการณ์การสอบใบอนุญาติขับขี่รถยนต์</div>
	<div id="center"><div class="title">Category :</div><div class="info">Social</div>
	<div class="title">Additional Category :</div><div class="info">Games</div></div>
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
				<th rowspan="2"><img height="50" src="/img/waitApprove.png"></th>
			</tr>
			<tr>
				<td>อ.เอกพงษ์ จึงเจริญสุขยิ่ง</td>
			</tr>
		</table>
		</div>
	</div>
	</div>
@stop
