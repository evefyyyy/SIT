@extends('advTmp')
@section('content')
<div class="row news-head">
	<div class="hidden-xs col-md-1 col-lg-1"></div>
	<div class="col-xs-12 col-md-10 col-lg-10">
		<img height="45" src="/img/document.png"><label>documents</label>
	</div>
	<div class="hidden-xs col-md-1 col-lg-1"></div>
</div>
<div class="row" id="newTB">
	<div class="hidden-xs col-md-1 col-lg-1"></div>
	<div class="col-xs-12 col-md-10 col-lg-10">
	<table class="table table-responsive table-hover">
		<thead>
			<tr>
				<th colspan="2" style="width:70%">title</th>
				<th style-"width:15%">download file</th>
				<th style="width:15%">date</th>
			</tr>
		</thead>
		<tbody>
			<!-- no document -->
			@if(count($news)==null)
				<tr>
					<td colspan="4" class="no-project">There is no document.</td>
				</tr>
			@else
			<!-- show document -->
				@foreach ($news as $n)
				<tr>
					<td><a data-toggle="modal" data-target="#doc{{$count}}">{{$n->title}}</a></td>
					<td style="width:10%">
						<input type="hidden" id="num" name="id" value="">
						<input type="hidden" id="nId{{$count++}}" name="id" value="{{$n->id}}">
						<input type="hidden" id="type" name="type" value="d">
					</td>
					<td><a href="/adminNewsFiles/{{$n->file_path_name}}" download><i class="flaticon-doc-file-format-symbol"></i></a></td>
					<td>{{date('M d, Y',strtotime($n->created_at))}}</td>
				</tr>
				@endforeach
				@endif
			</tbody>
		</table>
	</div>
	<div class="hidden-xs col-md-1 col-lg-1"></div>
</div>
@stop
