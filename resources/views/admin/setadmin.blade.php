@extends('setting')
@section('content')
<h2><img height="45" src="/img/user1.png">Users List</h2>
<div class="row">
	<div class="hidden-col-xs col-sm-1 col-md-1 col-lg-1"></div>
	<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
		<table id="adminTB" class="table table-bordered">
			<thead>
				<tr>
					<th>name</th>
					<th>role</th>
					<th>admin</th>
				</tr>
			</thead>
			<tbody>
				@foreach($staff_user as $stf_user)
				@if($stf_user->name != "SuperAdmin")
				@if($stf_user->admin_authen==1)
				<tr>	
					<td>{{$stf_user->name}}</td>
					<td>{{$stf_user->user_type->user_type_name}}</td>
					<td>
						<buton class="btn btn-apply" value=1>
							<i class="glyphicon glyphicon-remove"></i>
							<i class="glyphicon glyphicon-ok"></i>
						</button>
					</td>
				</tr>
				@endif
				@endif
				@endforeach
				@foreach($advisor_user as $adv_user)
				@if($adv_user->admin_authen==1)
				<tr>
					<td>{{$adv_user->advisor_name}}</td>
					<td>{{$adv_user->user_type->user_type_name}}</td>
					<td>
						<buton class="btn btn-unapply" value=1 focmaction = "/admin/setting/on">
							<i class="glyphicon glyphicon-remove"></i>
							<i class="glyphicon glyphicon-ok"></i>
						</button>
					</td>
				</tr>
				@endif
				@endforeach
				@foreach($staff_user as $stf_user)
				@if($stf_user->name != "SuperAdmin")
				@if($stf_user->admin_authen==0)
				<tr>	
					<td>{{$stf_user->name}}</td>
					<td>{{$stf_user->user_type->user_type_name}}</td>
					<td>
						<buton class="btn btn-apply" id="settoadmin" value="{{$stf_user->id}}" >
							<i class="glyphicon glyphicon-remove"></i>
							<i class="glyphicon glyphicon-ok"></i>
						</button>
					</td>
				</tr>
				@endif
				@endif
				@endforeach
				@foreach($advisor_user as $adv_user)
				@if($adv_user->admin_authen==0)
				<tr>
					<td>{{$adv_user->advisor_name}}</td>
					<td>{{$adv_user->user_type->user_type_name}}</td>
					<td>
						<buton class="btn btn-unapply" >
							<i class="glyphicon glyphicon-remove"></i>
							<i class="glyphicon glyphicon-ok"></i>
						</button>
					</td>
				</tr>
				@endif
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="hidden-col-xs col-sm-1 col-md-1 col-lg-1"></div>
</div>
<script>
	$(document).ready( function () {
		$('#adminTB').dataTable( {
		} );
	} );

	$('#settoadmin').click(function() {
		var userid = $(".rejectbt").attr("value");
		$.ajax({
			type: 'get',
			url:'/setting/admin/settoadmin',
			data: {
				gencode: $("#gencode").val(),
				pjid: $("#pjid").val(),
				_token: "{{csrf_token()}}"
			},
		   	success:function(result){
		   			if (result=="success") {
		       		$('.cd-load').hide();
		      		$('.cd-success').show();
		      	} else if (result=="used") {
		      		$('.cd-load').hide();
		      		$('.cd-content').show();
		      		$('.alert').show();
		      		$('.alert front').append("This code has already used");
		      		$('#gencode').val("");
		      	} else if (result=="invalid") {
		      		$('.cd-load').hide();
		      		$('.cd-content').show();
		      		$('.alert').show();
		      		$('.alert front').append("invalid code");
		      		$('#gencode').val("");
			   }
		    }
		});
	});
</script>
@stop