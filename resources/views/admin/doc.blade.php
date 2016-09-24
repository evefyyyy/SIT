@extends('adminTmp')
@section('content')
<div class="row news-head">
	<div class="hidden-xs col-md-1 col-lg-1"></div>
	<div class="col-xs-12 col-md-10 col-lg-10">
		<img height="45" src="/img/document.png"><label>documents</label>
		<span id="pendlink">
			<a class="btn" data-toggle="modal" data-target="#addDoc"><i class="glyphicon glyphicon-plus" data-toggle="modal" data-target="#addDoc"></i>document</a>
		</span>
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
						<button class="btn btn-danger" data-toggle="confirmation" data-placement="top" data-singleton="true" onclick="setNum({{$count}})">
							<i class="glyphicon glyphicon-trash"></i>
						</button>
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
	<?php
	$count = 0 ;
	?>
	@foreach ($news as $n)
	<!-- edit document for admin -->
	<div class="modal fade" id="doc{{$count}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<form method="post" action="/news/document/edit" enctype="multipart/form-data">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<input type="text" class="form-control" id="title{{$count}}" name="title" value="{{$n->title}}" onkeyup="copy({{$count}})" required>
					</div>
					<div class="modal-body">
						<input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
							<label for="message-text" class="control-label">File</label>
							<span>
								<input type="file" id="file" name="myfiles" required/>
							</span>
							 <div class="input_fields_wrap">
							    <div name="mytext[]">proposal.pdf<label class="remove_field"><span class="glyphicon glyphicon-remove"></span></label></div>
							</div>
						</div>
						<!-- <div class="form-group" style="width:40%">
							<label for="message-text" class="control-label">Expiration date</label>
							<div class='input-group date datetimepicker'>
								<input type='text' class="form-control" />
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
						</div> -->
						<input type="hidden" name="hId" value="{{$n->id}}">
						<input type="hidden" name="cTitle" id="copy{{$count++}}" value="{{$n->title}}">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">save</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	@endforeach
	<!-- add a document for admin -->
	<div class="modal fade" id="addDoc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
					<h4 class="modal-title">New Document</h4>
				</div>
				<div class="modal-body">
					<form method="post" action="/news/document" enctype="multipart/form-data">
						<input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
							<label for="recipient-name" class="control-label">Title</label>
							<input type="text" class="form-control" id="title" name="title" required/>
						</div>
						<div class="form-group">
							<label for="message-text" class="control-label">File</label>
							<input type="file" id="file" name="myfiles" required/>
						</div>
						<!-- <div class="form-group" style="width:40%">
							<label for="message-text" class="control-label">Expiration date</label>
							<div class='input-group date datetimepicker'>
								<input type='text' class="form-control" />
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
						</div> -->
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">add</button>
					</form>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<script src="{!! URL::asset('js/create.js') !!}"></script>
	<script type="text/javascript">
	$(function () {
				$('.datetimepicker').datetimepicker({
					format: 'DD/MM/YYYY'
				});
			});
	$('[data-toggle=confirmation]').confirmation({
		rootSelector: '[data-toggle=confirmation]',
		placement: 'top',
		onConfirm: function() {
			var num = $("#num").val() ;
			$.ajax({
				type:"post",
				dataType: "",
				url :"/news/delete",
				data: {id: $("#nId"+num).val(),type: $("#type").val() , _token:$("#_token").val() },
				success:function(data){
					if(data == 'd'){
						window.location.pathname = "/news/document/";
					}else{
						window.location.pathname = "/news/announcement/";
					}

				}
			});
		}
	});
	function copy(x) {
		$y = $("#title"+x).val() ;
		document.getElementById('copy'+x).value = $y;
	}
	function setNum(x){
		document.getElementById('num').value = x;
	}
	</script>
	@stop
