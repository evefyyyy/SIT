@extends('advTmp')
@section('content')
<div class="row round-btn">
<h2><img height="45" src="/img/givemarks.png">give marks</h2>
			@foreach($round as $r)
			<a href="/exam/round/{{$r}}"><button>exam round {{$r}}</button></a>
			@endforeach
	</div>
</div>
<script>
	$('#round1').prop('disabled', true);
</script>
@stop
