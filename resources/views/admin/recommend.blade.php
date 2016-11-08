@extends('adminTmp')
@section('content')
<h2><img height="45" src="/img/recommend.png">recommend projects</h2>
<div class="row" id="recTB">
	<div class="col-xs-1 col-md-2 col-lg-2"></div>
	<div class="col-xs-10 col-md-8 col-lg-8">
		<form class="form" role="form" method="post" action="/setting/recommend/addrecommend">
		<button class="btn btn-primary " id="addproject">add</button><input class="form-control" placeholder="Project ID" name="recommend">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		</form>
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
				<?php $count=0; ?>
				@foreach($recommendproject as $rcp)
				<tr>
				<?php $count++ ?>
					<td>{{$rcp->group_project_id}}</td>
					<td>{{$rcp->group_project_th_name}}</td>
					<input type="hidden" name="count" value="{{$count}}" id="count">
					<input type="hidden" name="projectid" value="{{$rcp->id}}" id="{{$count}}">
					<td class="del-btn" ><button class="btn btn-danger btn-circle btn-sm" data-toggle="confirmation" data-singleton="true" value="{{$rcp->id}}"><i class="glyphicon glyphicon-remove"></i></button></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="col-xs-1 col-md-2 col-lg-2"></div>
</div>
<script>
$('.del-btn').click(function (){
	$(this).parents('tr:first').remove();
	console.log($(this).parents('tr:first').find('td:nth-child(1)').text());
		var x = $("count").val();
		// $.ajax({
  //           type:"post",
  //           url : "/setting/recommend/deleterecommend",
  //           data: {
		// 		pjid: $(x).val(),
		// 		_token: "{{csrf_token()}}"
		// 	},
            
            
  //       });
});

</script>
@stop