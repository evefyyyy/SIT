@extends('advTmp')
@section('content')
<div class="row round-btn">
<h2><img height="45" src="/img/givemarks.png">give marks</h2>
			@foreach($round as $key => $r)
			<a href="/exam/round/{{$r}}">
				@if($submitted[$key] === null)
					<button id="round{{$r}}">
				@else
					<button id="round{{$r}}" disabled>
				@endif
						exam round {{$r}}
					</button>
			</a>
			@endforeach
</div>
@stop
