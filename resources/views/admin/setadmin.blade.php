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
				<tr>	
					<td>Pornthip Sirijutikul</td>
					<td>officer</td>
					<td>
						<buton class="btn btn-apply">
							<i class="glyphicon glyphicon-ok"></i>
							<i class="glyphicon glyphicon-remove"></i>
						</button>
					</td>
				</tr>
				<tr>
					<td>Ekapong Jungcharoensukying</td>
					<td>lecturer</td>
					<td>
						<buton class="btn btn-unapply">
							<i class="glyphicon glyphicon-remove"></i>
							<i class="glyphicon glyphicon-ok"></i>
						</button>
					</td>
				</tr>
				<tr>
					<td>Umaporn Supasitthimethee</td>
					<td>lecturer</td>
					<td>
						<buton class="btn btn-unapply">
							<i class="glyphicon glyphicon-remove"></i>
							<i class="glyphicon glyphicon-ok"></i>
						</button>
					</td>
				</tr>
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
</script>
@stop