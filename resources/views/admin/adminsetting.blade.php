@extends('adminTmp')
@section('content')
Enter number you want to gencode
<input type="number" name="entergencode" id="entergencode">
<select id="department">
	<option value="IT">IT</option>
	<option value="CS">CS</option>
</select>
<button onclick="genCode()">enter</button><br>
	
	<table class="table table-bordered">
			
			
			@foreach($dday_gencode as $dg)
			<tr>

				@for ($col = 0; $col < 1; $col ++) 
				<td>{{$dg->dday_gencode}}</td>
				@endfor

			</tr>
			@endforeach
			
			
		</table>


		<script type="text/javascript">
			function genCode(){
				var numgencode = document.getElementById("entergencode").value; 
				var department = document.getElementById("department").value;
				window.location="/admin/setting/"+numgencode+"/"+department;
			}
		</script>
		@stop