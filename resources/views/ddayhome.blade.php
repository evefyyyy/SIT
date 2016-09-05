<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<p>Enter Gencode</p>
	<input type="text" name="gencode" id="entergencode">
	<button onclick="checkGencode()">Enter</button>

	<script type="text/javascript">
		function checkGencode(){
			var gencode = document.getElementById("entergencode").value;
			window.location="dday/voteproject/"+gencode;
		}
	</script>
</body>
</html>
	
