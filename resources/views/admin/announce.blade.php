@extends('adminTmp')
@section('content')

<div class="row news-head">
	<div class="hidden-xs col-md-1 col-lg-1"></div>
	<div class="col-xs-12 col-md-10 col-lg-10">
		<img height="45" src="/img/announce.png"><label>announcement</label>
		<span id="pendlink">
			<a class="btn" data-toggle="modal" data-target="#addDoc"><i class="glyphicon glyphicon-plus" data-toggle="modal" data-target="#addDoc"></i>announcement</a>
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
					<th colspan="2" style="width:80%">title</th>
					<th style="width:15%">post date</th>
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
				<tr class="news" >
					<td><a data-toggle="modal" data-target="#announce{{$count}}">{{$n->title}}</a></td>
					<td style="width:10%">
						<button class="btn btn-danger" data-toggle="confirmation" onclick="setNum({{$count}})">
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
@foreach($news as $n)
<!-- edit announcement for Admin -->
<div class="modal fade" id="announce{{$count}}" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<form method="post" action="/news/announcement/edit" enctype="multipart/form-data">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<input type="text" class="form-control" id="title{{$count}}" name="title" value="{{$n->title}}" onkeyup="copy({{$count}})" required>
				</div>
				<div class="modal-body">
					<input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
					<div class="form-group">
						<label for="message-text" class="control-label">Description</label>
						<textarea rows="4" class="form-control" id="desc" name="description">{{$n->description}}</textarea>
					</div>
					<div class="form-group">
						<label for="message-text" class="control-label">File</label>
						<input type="file" id="file" name="myfiles" />
						<div class="input_fields_wrap">
							<div name="mytext[]">proposal.pdf<label class="remove_field"><span class="glyphicon glyphicon-remove"></span></label></div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-xs-5 col-md-3 col-lg-3">
								<label for="message-text" class="control-label">Publish Date</label>
								<div class='input-group date' id='datetimepicker1'>
									<input type='text' class="form-control"/>
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>
							</div>
							<div class="col-xs-5 col-md-3 col-lg-3">
								<label for="message-text" class="control-label">Expiration Date</label>
								<div class='input-group date' id='datetimepicker2'>
									<input type='text' class="form-control"  name="exp" placeholder="{{date('d/m/y',strtotime($n->end_date))}}"/>
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>
							</div>
							<div class="col-xs-2 col-md-6 col-lg-6"></div>
						</div>
					</div>
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
<!-- show announccement for student -->
		<!-- <?php
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
				@endforeach -->
			</div>
			<!-- add a new announccement for admin -->
			<div class="modal fade" id="addDoc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="exampleModalLabel">New Announcement</h4>
						</div>
						<div class="modal-body">
							<form method="post" action="/news/announcement" enctype="multipart/form-data">
								<input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
								<div class="form-group">
									<label for="recipient-name" class="control-label">Title</label>
									<input type="text" class="form-control" id="title" name="title" required/>
								</div>
								<div class="form-group">
									<label for="message-text" class="control-label">Description</label>
									<textarea rows="4" class="form-control" id="desc" name="description"></textarea>
								</div>
								<div class="form-group">
									<label for="message-text" class="control-label">File</label>
									<input type="file" id="file" name="myfiles"/>
									<br>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-xs-5 col-md-3 col-lg-3">
											<label for="message-text" class="control-label">Publish Date</label>
											<div class='input-group date' id='datetimepicker6'>
												<input type='text' class="form-control"/>
												<span class="input-group-addon">
													<span class="glyphicon glyphicon-calendar"></span>
												</span>
											</div>
										</div>
										<div class="col-xs-5 col-md-3 col-lg-3">
											<label for="message-text" class="control-label">Expiration Date</label>
											<div class='input-group date' id='datetimepicker7'>
												<input type='text' class="form-control" name="exp"/>
												<span class="input-group-addon">
													<span class="glyphicon glyphicon-calendar"></span>
												</span>
											</div>
										</div>
										<div class="col-xs-2 col-md-6 col-lg-6"></div>
									</div>
								</div>
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
			$('[data-toggle=confirmation]').confirmation({
				rootSelector: '[data-toggle=confirmation]',
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
