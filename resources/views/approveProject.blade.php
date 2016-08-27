@extends('adminTmp')
@section('content')
	<table class="table" id="pendingTable">
		<thead>
			<tr>
				<th>Pending Projects</th>
			</tr>
		</thead>
		<tbody>
		 <tr>
	        <table class="table pending">
	          <tr>
			    <th rowspan="2" style="width:15%">Project name<span>:</span></th>
			    <td colspan="4" rowspan="2" style="width:60%" id="name">Application for Diabetes Sufferers in Android Operating System
			    <br>โปรแกรมช่วยเหลือผู้ป่วยโรคเบาหวานบนระบบปฏิบัติการแอนดรอยด์</td>
			    <td rowspan="3" style="width:35%">
			    	<button class="delete approvebt">approve</button>
					<button class="rejectbt cd-popup-trigger">reject</button>
			    	<input type="text" class="form-control" />
			    </td>
			  </tr>
			  <tr>
			  </tr>
			  <tr>
			    <th>Type<span>:</span></th>
			    <td style="width:15%">Research</td>
			    <th style="width:15%">Category<span>:</span></th>
			    <td style="width:15%">Health</td>
			    <th>Project id<span>:</span></th>
			  </tr>
			  <tr>
			    <th rowspan="3">Team member<span>:</span></th>
			    <td>56130500056<br>
			    	56130500002<br>
			    	56130500100
			    </td>
			    <td colspan="2">
			    	นาย ต้มแซ่บ กระดูกหมู<br>
			    	นางสาว ส้มตำปูปลาร้า ยำคอหมูย่าง<br>
			    	นาย ไก่ย่าง สิบเอ็ดดาว
			    </td>
			    <th>Advisor<span>:</span></th>
			    <td>ศ.ฮอเรซ ซลักฮอร์น<label id="main">Main</label><br>
			    	ศ. เซเวอรัส สเนป
			    </td>
			  </tr>
	        </table>
	      </tr>
    </tbody>
	</table>
		<div class="cd-popup" role="alert">
			<div class="cd-popup-container">
				<p>Are you sure you want to reject this project?</p>
				<ul class="cd-buttons">
					<li><a class="cd-delete">Yes</a></li>
					<li><a class="cd-close">No</a></li>
				</ul>
				<a class="cd-popup-close cd-close img-replace"></a>
			</div> <!-- cd-popup-container -->
		</div> <!-- cd-popup -->
    	<script src="{!! URL::asset('js/approve.js') !!}"></script>
@stop