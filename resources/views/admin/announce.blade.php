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
					<th style="width:80%">title</th>
					<th style="width:20%">date</th>
				</tr>
			</thead>
			<tbody>
				<tr data-toggle="modal" data-target="#announce">
					<td>ตัวอย่างทฤษฏีงานวิจัยที่เกี่ยวข้องของแอปพลิเคชันเกมเพื่อส่งเสริมการเรียนรู้คำศัพท์ภาษาอังกฤษ</td>
					<td>Jun 12, 2012</td>
				</tr>
				<div class="modal fade" id="announce" role="dialog">
				  <div class="modal-dialog modal-lg">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="exampleModalLabel">ตัวอย่างทฤษฏีงานวิจัยที่เกี่ยวข้องของแอปพลิเคชันเกมเพื่อส่งเสริมการเรียนรู้คำศัพท์ภาษาอังกฤษ</h4>
				      </div>
				      <div class="modal-body">
				      	blah blah blah
				      	<a href="#" download><i class="glyphicon glyphicon-download"></i> download file</a>
				      </div>
				    </div>
				  </div>
				</div>
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
	           <div class="form-group">
	            <label for="message-text" class="control-label">Description</label>
	            <textarea rows="4" class="form-control" id="message-text"></textarea>
	          </div>
	          <div class="form-group">
	            <label for="message-text" class="control-label">File</label>
	            <span class="custom-file-upload">
				    <input type="file" id="file" name="myfiles"/>
				</span>
				<br/>
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