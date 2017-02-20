@extends('setting')
@section('content')
<h2><img height="45" src="/img/user1.png">Students List</h2>
<div class="row" style="margin-bottom:10px">
	<div class="hidden-col-xs col-sm-1 col-md-1 col-lg-1"></div>
	<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10" id="pendlink">
			<a class="btn" data-toggle="modal" data-target="#addStd"><i class="glyphicon glyphicon-plus"></i>add students</a>
	</div>
	<div class="hidden-col-xs col-sm-1 col-md-1 col-lg-1"></div>
</div>
<div class="row">
	<div class="hidden-col-xs col-sm-1 col-md-1 col-lg-1"></div>
	<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
		<table id="adminTB" class="table table-bordered">
			<thead>
				<tr>
					<th>student no.</th>
					<th>name</th>
					<th>project id</th>
				</tr>
			</thead>
			<tbody>
				@foreach($allstudent as $astd)
				<tr>
					<td>{{$astd->student_id}}</td>
					<td>{{$astd->student_name}}</td>
					@if($astd->projectStudent == null)
					<td></td>
					@else
					<td>{{$astd->projectStudent->groupProject->group_project_id}}</td>
					@endif
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="hidden-col-xs col-sm-1 col-md-1 col-lg-1"></div>
</div>
	<!-- add students popup -->
	<div class="modal fade" id="addStd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
					<h4 class="modal-title">Add Students</h4>
				</div>
				<div class="modal-body">
					<p>Enter the range of student no.</p>
					<div class="form-group">
						<form class="form" role="form" method="post" action="/setting/student/getnamestudent">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="text" class="form-control" id="title" name="firstnum" placeholder="Student no." required/><label>TO</label><input type="text" class="form-control" id="title" name="lastnum" placeholder="Student no." required/>
						</form>
					</div>
				</div>
				<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
<script>
	$(document).ready( function () {
		$('#adminTB').dataTable( {
		} );
	} );
</script>
@stop