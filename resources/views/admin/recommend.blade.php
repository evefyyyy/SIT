@extends('adminTmp')
@section('content')
<h2><img height="45" src="/img/recommend.png">recommend projects</h2>
<div class="row" id="recTB">
	<div class="col-xs-1 col-md-2 col-lg-2"></div>
	<div class="col-xs-10 col-md-8 col-lg-8">
		<button class="btn btn-primary">add</button><input class="form-control" placeholder="Project ID">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th width="15%">project id</th>
					<th>project name</th>
					<th width="5%">action</th>
				</tr>
			</thead>
			<tbody>
				<!-- <tr>
					<td colspan="8" class="no-project">no project found</td>
				</tr> -->
				<tr>
					<td>IT56-38</td>
					<td>ระบบแสดงผลงานนักศึกษาและจัดการโครงงานเทคโนโลยีสารสนเทศ คณะเทคโนโลยีสารสนเทศ</td>
					<td class="del-btn"><button class="btn btn-danger btn-circle btn-sm" data-toggle="confirmation" data-singleton="true"><i class="glyphicon glyphicon-remove"></i></button></td>
				</tr>
				<tr>
					<td>IT56-21</td>
					<td>ระบบจัดการศูนย์ข้อมูล</td>
					<td class="del-btn"><button class="btn btn-danger btn-circle btn-sm" data-toggle="confirmation" data-singleton="true"><i class="glyphicon glyphicon-remove"></i></button></td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="col-xs-1 col-md-2 col-lg-2"></div>
</div>
<script>
$('.del-btn').click(function (){
	$(this).parents('tr:first').remove();
		// $.ajax({
  //           type:"post",
  //           dataType: "",
  //           url : "/edit/pic/delete",
  //           data: {id: $("#ssid"+i).val() , _token:$("#_token").val() },
  //       });
});
</script>
@stop