<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	Enter number you want to gencode
	<input type="number" name="entergencode" id="entergencode">
	<button onclick="genCode()">enter</button>

	<script type="text/javascript">
		function genCode(){
			var numgencode = document.getElementById("entergencode").value;
			window.location="/admin/setting/"+numgencode;
		}
	</script>
</body>
</html>