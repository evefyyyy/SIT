@extends('stdTmp')
@section('content')
<div class="row news-head">
	<div class="hidden-xs col-md-1 col-lg-1"></div>
	<div class="col-xs-12 col-md-10 col-lg-10">
		<img height="45" src="/img/announce.png"><label>announcement</label>
	</div>
	<div class="hidden-xs col-md-1 col-lg-1"></div>
</div>
<div class="row" id="newTB">
	<div class="hidden-xs col-md-1 col-lg-1"></div>
	<div class="col-xs-12 col-md-10 col-lg-10">
	<table class="table table-responsive table-hover">
		<thead>
			<tr>
				<th colspan="2" style="width:80%">title</th>
				<th style="width:15%">date</th>
			</tr>
		</thead>
		<tbody>
			<!-- no announcement -->
			@if(count($news) == null)
				<tr>
					<td colspan="3" class="no-project">There is no announcement.</td>
				</tr>
				@else
				<!-- show announcement -->
				@foreach($news as $n)
				<tr class="news">
					<td><a data-toggle="modal" data-target="#announce{{$count}}">{{$n->title}}</a></td>
					<td style="width:10%">
						<button class="btn btn-danger" data-toggle="confirmation" data-placement="top" data-singleton="true" onclick="setNum({{$count}})">
							<i class="glyphicon glyphicon-trash"></i>
						</button>
						<input type="hidden" id="num" name="id" value="">
						<input type="hidden" id="nId{{$count++}}" name="id" value="{{$n->id}}">
						<input type="hidden" id="type" name="type" value="a">
					</td>
					<td>{{date('M d, Y',strtotime($n->created_at))}}</td>
				</tr>
				@endforeach
				@endif
				<?php
				$count = 0 ;
				?>
			</tbody>
		</table>
	</div>
	<div class="hidden-xs col-md-1 col-lg-1"></div>
</div>
		<!-- show announcement for student -->
		<?php
		$count = 0 ;
		?>
		@foreach($news as $n)
				<div class="modal fade" id="announce{{$count++}}" role="dialog">
				  <div class="modal-dialog modal-lg">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title">{{$n->title}}</h4>
				      </div>
				      <div class="modal-body">
								{{$n->description}}
								@if($n->file_path_name != null)
				      	<a href="/public/adminNewsFiles/{{$n->file_path_name}}" download><i class="glyphicon glyphicon-download"></i> download file</a>
								@endif
							</div>
				    </div>
				  </div>
				</div>
				@endforeach
			</div>
@stop