@extends('stdTmp')
@section('content')
<div id="detail">
	<div class="row">
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
			<div id="image-cropper">
				<div class="cropit-preview cover-pic"></div>
				<input type="file" name="file" id="file" class="cropit-image-input" />
				<label for="file" class="btn btn-default">Select new image</label>
				<label class="pic-size">2480 x 1094 px</label>
				<span class="zoom-image">
					<span class="glyphicon glyphicon-picture gi-1x"></span>
					<input type="range" class="cropit-image-zoom-input" />
					<span class="glyphicon glyphicon-picture gi-2x"></span>
				</span>
			</div>
		</div>
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
	</div>
	<div class="row">
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
		<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
			<h3>{{$projectNameEN}}</h3>
			<h4>{{$projectNameTH}}</h4>
		</div>
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<button class="btn btn-primary" href="/showproject">save & show my project</button>
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
			    	<textarea class="form-control" rows="3" placeholder="Enter a short description of your project"></textarea>
				</div>
			  </div>
			</div>
		</div>
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
	</div>
	<div class="row">
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
		<div class="col-xs-10 col-sm-10 col-md-5 col-lg-5">
			<div id="image-cropper">
				<div class="cropit-preview group-pic"></div>
				<input type="file" name="file" id="file1" class="cropit-image-input" />
				<label for="file1" class="btn btn-default">Select new image</label>
				<span class="zoom-image">
					<span class="glyphicon glyphicon-picture gi-1x"></span>
					<input type="range" class="cropit-image-zoom-input" />
					<span class="glyphicon glyphicon-picture gi-2x"></span>
					<p class="pic-size">4:3 aspect ratio</p>
				</span>
			</div><br>
			<div class="panel panel-info">
				<div class="panel-heading">tools & techniques</div>
				<div class="panel-body">
					<div class="col-lg-12">
						<textarea class="form-control" rows="4" placeholder="Mobile : Android JavaEE, SDK Emulator
Database : SQLite
Graphic : Adobe Photoshop, Illustratore"></textarea>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-1 col-sm-1 hidden-md hidden-lg"></div>
		<div class="col-xs-12 col-sm-12 hidden-md hidden-lg"></div>
		<div class="col-xs-1 col-sm-1 hidden-md hidden-lg"></div>
		<div class="col-xs-10 col-sm-10 col-md-5 col-lg-5">
		<div class="panel panel-info">
			<div class="panel-heading">author</div>
			<div class="panel-body">
			<div class="col-xs-6 col-md-6 col-lg-6 text">{{$stdPre1}}{{$stdFname1}} {{$stdLname1}}</div>
			<div class="col-xs-6 col-md-6 col-lg-6 text">รหัสนักศึกษา {{$stdId1}}</div>
			<div class="col-xs-3 col-md-3 col-lg-3"></div>
			<div class="col-xs-9 col-md-9 col-lg-9 mail"><input type="text" class="form-control" placeholder="email"></div>
			<div class="col-xs-6 col-md-6 col-lg-6 text">{{$stdPre1}}{{$stdFname1}} {{$stdLname1}}</div>
			<div class="col-xs-6 col-md-6 col-lg-6 text">รหัสนักศึกษา {{$stdId1}}</div>
			<div class="col-xs-3 col-md-3 col-lg-3"></div>
			<div class="col-xs-9 col-md-9 col-lg-9 mail"><input type="text" class="form-control" placeholder="email"></div>
			<div class="col-xs-6 col-md-6 col-lg-6 text">{{$stdPre1}}{{$stdFname1}} {{$stdLname1}}</div>
			<div class="col-xs-6 col-md-6 col-lg-6 text">รหัสนักศึกษา {{$stdId1}}</div>
			<div class="col-xs-3 col-md-3 col-lg-3"></div>
			<div class="col-xs-9 col-md-9 col-lg-9 mail"><input type="text" class="form-control" placeholder="email"></div>
			</div>
		</div>
		<div class="panel panel-info">
			<div class="panel-heading">advisor</div>
			<div class="panel-body">
			@foreach($advisors as $adv)
			<div class="col-lg-12 text">{{$adv->prefix}}{{$adv->advisor_fname}} {{$adv->advisor_lname}}</div>
			@endforeach
			</div>
		</div>
		<div class="embed-responsive embed-responsive-16by9">
				<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/QyhrOruvT1c"></iframe>
			</div>
			<div class="input-group">
				<input type="text" class="form-control" value="" placeholder="Paste a youtube embed link">
				<span class="input-group-btn">
					<button class="btn btn-primary" onclick="" type="button">Embed</button>
				</span>
			</div>
		</div>
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
	</div>
	
</div>
<script src="{!! URL::asset('js/jquery.cropit.js') !!}"></script>
<script>
$('#image-cropper').cropit({ imageBackground: true });
</script>
@stop
