<!DOCTYPE html>
<html>
<head>
	<title>D-Day</title>
	<link href="{!! URL::asset('css/dday.css') !!}" rel="stylesheet" type="text/css">
    <link href="{!! URL::asset('css/bootstrap.css') !!}" rel="stylesheet">
</head>
<body>
<div class="sandbox sandbox-correct-pronounciation">
  <h1 class="heading heading-correct-pronounciation">
    <em>Dday</em>
   Popular vote
  </h1>
</div>
<div id="particles"></div>
<script src="{!! URL::asset('js/dday.js') !!}"></script>
<script type="text/javascript">
	function checkGencode(){
		var gencode = document.getElementById("entergencode").value;
		window.location="dday/voteproject/"+gencode;
	}
</script>
</body>
</html>
	
