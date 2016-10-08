@extends('adminTmp')
@section('content')
<div id="scoresheet">
	<h2><img height="45" src="/img/exam.png">manage criteria</h2>
	<div class="row">
		<div class="col-xs-1 col-md-3 col-lg-3"></div>
		<div class="col-xs-10 col-md-6 col-lg-6" id="scoreyear">
				<a href="criteria/main" id="cri-btn" class="btn">main criteria</a>
				<a href="criteria/sub" id="cri-btn" class="btn">sub criteria</a>
		</div>
		<div class="col-xs-1 col-md-3 col-lg-3"></div>
	</div>
	<div id="center">
	  <a><button class="action-button" onclick="back()">back</button></a>
	  <a href="#"><button type="submit" class="action-button">save</button></a>
	</div>
</div>
<script>
function back() {
		window.history.back()
}
</script>
@stop