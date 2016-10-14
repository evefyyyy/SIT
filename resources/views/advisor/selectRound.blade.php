@extends('advTmp')
@section('content')
<div class="row round-btn">
<h2><img height="45" src="/img/givemarks.png">give marks</h2>
			<a href="#"><button id="round1">exam round 1</button></a>
			<a href="round"><button id="round2">exam round 2</button></a>
			<a href="#"><button id="round3">exam round 3</button></a>
			<a href="#"><button id="round4">exam round 4</button></a>
	</div>
</div>
<script>
	$('#round1').prop('disabled', true);
	$('#round3').prop('disabled', true);
	$('#round4').prop('disabled', true);
</script>
@stop