<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	Enter number you want to gencode
	<input type="number" name="entergencode" id="entergencode">
	<select id="department">
		<option value="IT">IT</option>
		<option value="CS">CS</option>
	</select>
	<button onclick="genCode()">enter</button><br>

	@foreach($dday_gencode as $dg)
		<?php  
			$status_gencode = App\DdayProject::where('dday_id', $dg->id)->first();
		?>
		{{$dg->dday_gencode}}    @if($status_gencode==null)
									active <br>
								@else
									unactive <br>
								@endif

	@endforeach

	<script type="text/javascript">
		function genCode(){
			var numgencode = document.getElementById("entergencode").value; 
			var department = document.getElementById("department").value;
			window.location="/admin/setting/"+numgencode+"/"+department;
		}
	</script>
</body>
</html>