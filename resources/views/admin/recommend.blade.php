@extends('setting')
@section('content')
<h2><img height="45" src="/img/recommend.png">recommend projects</h2>
<div class="row" id="recTB">
	<div class="hidden-col-xs col-sm-1 col-md-1 col-lg-1"></div>
	<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
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
	<div class="hidden-col-xs col-sm-1 col-md-1 col-lg-1"></div>
</div>
<script>
$('.del-btn').click(function (){
	$(this).parents('tr:first').remove();
	console.log($(this).parents('tr:first').find('td:nth-child(1)').text());
		var x = $(this).parents('tr:first').find('td:nth-child(1)').text();
		$.ajax({
            type:"post",
            url : "/setting/recommend/deleterecommend",
            data: {
				pjid: x,
				_token: "{{csrf_token()}}"
			},
            
            
        });
});

</script>
@stop