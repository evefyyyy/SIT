@extends('adminTmp')
@section('content')
<div id="scoresheet">
	<h2><img height="45" src="/img/exam.png">manage criteria</h2>
	<div class="row">
		<div class="col-xs-3 col-md-4 col-lg-4"></div>
		<div class="col-xs-6 col-md-4 col-lg-4" id="managecri">
			<div id="center">
				<a href="criteria/main/create" id="cri-btn" class="btn">main criteria</a>
				<a href="criteria/sub/create" id="cri-btn" class="btn">sub criteria</a>
			</div>
		</div>
		<div class="col-xs-3 col-md-4 col-lg-4"></div>
	</div>
	<div id="center">
	  <a><button class="action-button" onclick="back()">back</button></a>
	</div>
	</form>
</div>
@stop
