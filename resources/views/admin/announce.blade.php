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
		<table class="table table-responsive table-hover">
			<thead>
				<tr>
					<th colspan="2" style="width:80%">title</th>
					<th style="width:15%">date</th>
				</tr>
			</thead>
			<tbody>
				@foreach($news as $n)
				<tr data-toggle="modal" data-target="#announce" class="news">
					<td>{{$n->title}}</td>
					<td style="width:10%">
						<button class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
					</td>
					<td>{{date('F d, Y',strtotime($n->created_at))}}</td>
				</tr>
				<!-- Admin -->
				<!-- <div class="modal fade" role="dialog">
				  <div class="modal-dialog modal-lg">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <input type="text" class="form-control" id="title" name="title">
				      </div>
				      <div class="modal-body">
				      	<div class="form-group">
				            <label for="message-text" class="control-label">Description</label>
				            <textarea rows="4" class="form-control" id="desc" name="description"></textarea>
				        </div>
				        <div class="form-group">
				            <label for="message-text" class="control-label">File</label>
				            <span class="custom-file-upload">
							    <input type="file" id="file" name="myfiles"/>
							</span>
							<br/>
				         </div>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				        <button type="submit" class="btn btn-primary">save</button>
				        </form>
				      </div>
				  </div>
				</div> -->
				<div class="modal fade" id="announce" role="dialog">
				  <div class="modal-dialog modal-lg">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title">{{$n->title}}</h4>
				      </div>
				      <div class="modal-body">
				      	{{$n->description}}
				      	<a href="{{'/adminNewsFiles/'.$n->file_path_name}}" download><i class="glyphicon glyphicon-download"></i> download file</a>
				      </div>
				    </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.modal -->
				@endforeach
			</tbody>
		</table>
	</div>
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
	            <input type="text" class="form-control" id="title" name="title" required>
	           </div>
	           <div class="form-group">
	            <label for="message-text" class="control-label">Description</label>
	            <textarea rows="4" class="form-control" id="desc" name="description"></textarea>
	          </div>
	          <div class="form-group">
	            <label for="message-text" class="control-label">File</label>
	            <span class="custom-file-upload">
				    <input type="file" id="file" name="myfiles" required/>
				</span>
				<br/>
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
@stop
