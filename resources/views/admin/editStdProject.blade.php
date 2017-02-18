@extends('adminTmp')
@section('content')

<script src="{!! URL::asset('js/jquery-ui.min.js') !!}"></script>
<div id="detail">
	<div class="row">
		<div class="col-hidden-xs col-sm-1 col-md-1 col-lg-1"></div>
		<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
				<img class="img-responsive" id="cover" src="/img/no-poster.png"/>
				<input type="file" id="img-cover" name="poster"/>
				<label for="img-cover" class="btn btn-browse">Select new image</label>
				<label class="pic-size">poster 1920 x 1080 px</label><div class="pull-right">PROJECT ID : IT56-38</div>
		</div>
		<div class="col-hidden-xs col-sm-1 col-md-1 col-lg-1"></div>
	</div>
	<div class="row">
		<div class="col-hidden-xs col-sm-1 col-md-1 col-lg-1"></div>
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-8">
			<h4><input class="form-control" /></h4>
			<h4><input class="form-control" /></h4>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<span class="textt pull-left">type</span>
				<select class="selectType">
				  <option>business</option>
				  <option>research</option>
				  <option>social</option>
				</select>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<span class="textt pull-left">category</span>
				<select class="selectCategory">
				  <option>business</option>
				  <option>education</option>
				  <option>elderly</option>
				  <option>games</option>
				</select>
			</div>
		</div>
		<div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 btn-save">
				<a class="btn btn-default" onclick="goBack()">back</a>
				<button type="submit" class="btn btn-primary">save changes</button>
		</div>
		<div class="col-hidden-xs col-sm-1 col-md-1 col-lg-1"></div>
	</div>
	<div class="row" style="margin-top:20px">
		<div class="col-hidden-xs col-sm-1 col-md-1 col-lg-1"></div>
		<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
			<div class="panel panel-info">
			  <div class="panel-heading">details</div>
			  <div class="panel-body">
			  	<div class="col-lg-12">
			    	<textarea class="form-control" rows="3" placeholder="Enter your project description" name="detail"></textarea>
				</div>
			  </div>
			</div>
		</div>
		<div class="col-hidden-xs col-sm-1 col-md-1 col-lg-1"></div>
	</div>
	<div class="row">
		<div class="col-hidden-xs col-sm-1 col-md-1 col-lg-1"></div>
		<div class="col-xs-12 col-sm-10 col-md-5 col-lg-5">
				<img id="group-member" src="/img/no-image.png" alt="your image" />
				<input type="file" id="imgInp" name="groupPicture"/>
				<label for="imgInp" class="btn btn-browse group">Select new image</label>
				<label class="pic-size">group member photo (4:3)</label>
			<div class="panel panel-info">
				<div class="panel-heading">tools & techniques</div>
				<div class="panel-body">
					<div class="col-lg-12">
						<textarea class="form-control" rows="4" placeholder="Mobile : Android JavaEE, SDK Emulator
Database : SQLite
Graphic : Adobe Photoshop, Illustrator" name="tools"></textarea>
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
		                	<div class="noproject">no image uploaded</div>
										 			<!-- <li class="col-xs-4 gallery">
												 			<img src="">
												 		</li> -->

		                </ul>
		            </div>
		        </div>
		    </div>
		</div>
		<div class="col-hidden-xs col-sm-1 hidden-md hidden-lg"></div>
		<div class="col-hidden-xs col-sm-12 hidden-md hidden-lg"></div>
		<div class="col-hidden-xs col-sm-1 hidden-md hidden-lg"></div>
		<div class="col-xs-12 col-sm-10 col-md-5 col-lg-5">
		<div class="panel panel-info">
			<div class="panel-heading">author</div>
			<div class="panel-body">
				<div class="control-group">
		            <div class="controls"> 
		                	<div class="col-xs-7 col-md-7 col-lg-7 textt fullname">Ms.Artima Chanthasangsawang</div>
		                    <div class="input-group col-lg-5">
		                        <input class="form-control" type="text" placeholder="student no." />
		                    	<span class="input-group-btn">
		                            <button class="btn btn-success" type="button">
		                                <span class="glyphicon glyphicon-plus"></span>
		                            </button>
		                        </span>
		                    </div>
		            </div>
		        </div>
			<div class="col-xs-3 col-md-3 col-lg-3"></div>
			</div>
		</div>
		<div class="panel panel-info">
			<div class="panel-heading">advisor</div>
			<div class="panel-body">
			<div class="col-lg-3 textt">Main advisor</div>
			<div class="col-lg-9">
				<select class="selectMainadv advisor" multiple data-width="100%" data-max-options="1" id="mainAdvisor" name="mainAdv">
					<option value="1">Pichet Limvachiranan</option>
					<option value="2">Umaporn Supasitthimethee</option>
			 	</select>
			</div>
			<div class="col-lg-3 textt">Co-advisor</div>
			<div class="col-lg-9">
				<select class="selectCoadv advisor" multiple data-width="100%" data-max-options="1" id="mainAdvisor" name="mainAdv">
					<option value="1">Pichet Limvachiranan</option>
					<option value="2">Umaporn Supasitthimethee</option>
			 	</select>
			</div>
			</div>
		</div>
		<div class="embed-responsive embed-responsive-16by9">
			<iframe id="vdo" width="1280" height="720" src="https://www.youtube.com/embed/XqJU9HWBUsE" frameborder="0" allowfullscreen></iframe>
		</div>
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Paste a youtube link" id="embedcode" name="video" value="">
				<span class="input-group-btn">
					<button class="btn btn-primary embed" type="button">Embed</button>
				</span>
			</div>
		</div>
		<div class="col-hidden-xs col-sm-1 col-md-1 col-lg-1"></div>
	</div>
</div>
<script src="{!! URL::asset('js/edit.js') !!}"></script>
<script>
$(function () {
	$('.selectMainadv').selectpicker({
		liveSearch: true,

		noneSelectedText: 'no advisor selected',
	});
	$('.selectCoadv').selectpicker({
		liveSearch: true,

		noneSelectedText: 'no advisor selected',
	});
	$('.selectType').selectpicker();
	$('.selectCategory').selectpicker();
});

$(".btn-success").click(function () {
      $(".control-group").append('<div class="controls"><div class="col-xs-7 col-md-7 col-lg-7 textt fullname"></div><div class="input-group col-lg-5"><input class="form-control" type="text" placeholder="student no." /><span class="input-group-btn"><button class="btn btn-danger remove" type="button" onclick=><span class="glyphicon glyphicon-minus"></span></button></span></div></div>');
	$(".remove").click(function () {
	    $(this).closest('.controls').remove();
   	});
});
</script>
@stop
