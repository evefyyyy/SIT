@extends('stdTmp')
@section('content')

<script src="{!! URL::asset('js/jquery-ui.min.js') !!}"></script>
<div id="detail">
	<div class="row">
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
			<form class="" action="{{$url}}" method="post" enctype="multipart/form-data">
				{{method_field($method)}}
				<input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
				<img class="img-responsive" id="cover" src="{{$poster or '/img/no-poster.png'}}"/>
				<input type="file" id="img-cover" name="poster"/>
				<label for="img-cover" class="btn btn-browse group">Select new image</label>
				<label class="pic-size">poster 1920 x 1080 px</label>
		</div>
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
	</div>
	<div class="row">
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
		<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
			<h3>{{$projectNameEN}}</h3>
			<h4>{{$projectNameTH}}</h4>
		</div>
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 btn-save">
				<a class="btn btn-default" onclick="goBack()">back</a>
				<button class="btn btn-primary">save & show my project</button>
		</div>
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
	</div>
	<div class="row">
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
			<div class="panel panel-info">
			  <div class="panel-heading">details</div>
			  <div class="panel-body">
			  	<div class="col-lg-12">
			    	<textarea class="form-control" rows="3" placeholder="Enter a short description of your project" name="detail">{{$detail or ''}}</textarea>
				</div>
			  </div>
			</div>
		</div>
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
	</div>
	<div class="row">
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
		<div class="col-xs-10 col-sm-10 col-md-5 col-lg-5">
				<img id="group-member" src="{{$groupPic or '/img/no-image.png'}}" alt="your image" />
				<input type="file" id="imgInp" name="groupPicture"/>
				<label for="imgInp" class="btn btn-browse group">Select new image</label>
				<label class="pic-size">group member picture (4:3)</label>
			<div class="panel panel-info">
				<div class="panel-heading">tools & techniques</div>
				<div class="panel-body">
					<div class="col-lg-12">
						<textarea class="form-control" rows="4" placeholder="Mobile : Android JavaEE, SDK Emulator
Database : SQLite
Graphic : Adobe Photoshop, Illustrator" name="tools">{{$tools or ''}}</textarea>
					</div>
				</div>
			</div>
			<!-- gallery pic -->
			<input type="file" name="screenshot[]" id="uploader" multiple/>
			<input type='hidden' name="uploadIndex" id='uploaderIndex' />
			<label for="uploader" class="btn btn-browse">Select image</label>
			<span class="upload-btn">
            <a class="btn btn-danger del" name="btn-delete" title="Delete Multiple image" >Delete</a>
        	</span>
            <div class="panel panel-default" style="margin-top:10px">
		        <div class="panel-body">
		            <div class="dataTable_wrapper">
		                <ul class="row image-view">
		                <?php
		                	$count = 0 ;
		                ?>
											@if($screenshot)
									 			@foreach($screenshot as $img)
										 			<li class="col-xs-4 gallery ui-state-default" id="pic{{$count}}">
												 			<img src="{{asset($img->picture_path_name)}}"/>
												 			<input type="hidden" id="ssid{{$count++}}" value="{{$img->id}}"/>
												 		</li>
									 			@endforeach

							 				@endif

		                </ul>
		            </div>
		        </div>
		    </div>
		    <input type="hidden" id="cpic" value="{{$count}}">
		</div>
		<div class="col-xs-1 col-sm-1 hidden-md hidden-lg"></div>
		<div class="col-xs-12 col-sm-12 hidden-md hidden-lg"></div>
		<div class="col-xs-1 col-sm-1 hidden-md hidden-lg"></div>
		<div class="col-xs-10 col-sm-10 col-md-5 col-lg-5">
		<div class="panel panel-info">
			<div class="panel-heading">author</div>
			<div class="panel-body">
				@foreach($student as $st)
			<div class="col-xs-6 col-md-6 col-lg-6 text">{{$st->student_name}}</div>
			<div class="col-xs-6 col-md-6 col-lg-6 text">รหัสนักศึกษา {{$st->student_id}}</div>
			<div class="col-xs-3 col-md-3 col-lg-3"></div>
			<div class="col-xs-9 col-md-9 col-lg-9 mail"><input type="text" class="form-control" placeholder="email" name="email[]" value="{{$st->student_email or ''}}"></div>
			@endforeach
			</div>
		</div>
		<div class="panel panel-info">
			<div class="panel-heading">advisor</div>
			<div class="panel-body">
			@foreach($advisors as $adv)
			<div class="col-lg-12 text">{{$adv->advisor_name}}</div>
			@endforeach
			</div>
		</div>
		<div class="embed-responsive embed-responsive-16by9" id="vdo"></div>
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Paste a youtube embed code" id="embedcode" name="video" value="{{$video or ''}}">
				<span class="input-group-btn">
					<button class="btn btn-primary embed" type="button">Embed</button>
				</span>
			</div>
		</div>
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
	</div>
		</form>
</div>
<script src="{!! URL::asset('js/edit.js') !!}"></script>
@stop
