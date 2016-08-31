@extends('adminTmp')
@section('content')
	<div class="row news-head">
		<div class="hidden-xs col-md-1 col-lg-1"></div>
		<div class="col-xs-12 col-md-10 col-lg-10">
			<img height="45" src="/img/document.png"><label>documents</label>
			<span id="pendlink">
        	 	<a class="btn" data-toggle="modal" data-target="#addDoc"><i class="glyphicon glyphicon-plus" data-toggle="modal" data-target="#addDoc"></i>add document</a>
    		</span>
		</div>
		<div class="hidden-xs col-md-1 col-lg-1"></div>
	</div>
	<div class="row" id="newTB">
		<table class="table table-responsive">
			<thead>
				<tr>
					<th style="width:65%">title</th>
					<th style-"width:15%">download file</th>
					<th style="width:20%">date</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>รูปแบบการทำเล่มโครงงาน รหัส 56</td>
					<td id="center"><a href="#" download><i class="flaticon-doc-file-format-symbol"></i></a></td>
					<td>Jun 12, 2012</td>
				</tr>
				<tr>
					<td>แบบฟอร์มเปลี่ยนหัวข้อโครงงาน</td>
					<td id="center"><a href="#" download><i class="flaticon-doc-file-format-symbol"></i></a></td>
					<td>Apr 1, 2012</td>
				</tr>
				<tr>
					<td>แบบเสนอหัวข้อโครงงานและศึกษางานที่เกี่ยวข้อง</td>
					<td id="center"><a href="#" download><i class="flaticon-doc-file-format-symbol"></i></a></td>
					<td>Sep 28, 2011</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="modal fade" id="addDoc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="exampleModalLabel">New Document</h4>
	      </div>
	      <div class="modal-body">
	        <form>
	          <div class="form-group">
	            <label for="recipient-name" class="control-label">Title</label>
	            <input type="text" class="form-control" id="recipient-name">
	           </div>
	          <div class="form-group" class="custom-file-upload">
	            <label for="message-text" class="control-label">File</label>
				<input type="file" id="file" name="myfiles"/>
				<br/><br/>
	          </div>
	        </form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary">add</button>
	      </div>
	    </div>
	  </div>
	</div>
	<script src="{!! URL::asset('js/create.js') !!}"></script>
@stop