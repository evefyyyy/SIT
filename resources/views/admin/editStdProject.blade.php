@extends('adminTmp')
@section('content')

<script src="{!! URL::asset('js/jquery-ui.min.js') !!}"></script>
<div id="detail">
	<form action="{{$url}}" method="post" enctype="multipart/form-data">
		{{method_field($method)}}
	<input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
	<div class="row">
		<div class="col-hidden-xs col-sm-1 col-md-1 col-lg-1"></div>
		<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
				@if($poster != null)
				<img src="{{$poster}}" class="img-responsive" id="cover">
				@else
				<img src="/img/no-poster.png" class="img-responsive" id="cover">
				@endif
				<div>
           			<a class="btn btn-danger del" id="dposter" title="delete poster" >Delete</a>
					<label class="pic-size">poster 1920 x 1080 px</label><div class="pull-right">PROJECT ID : {{$groupId}}</div>
				</div>
		</div>
		<div class="col-hidden-xs col-sm-1 col-md-1 col-lg-1"></div>
	</div>
	<div class="row">
		<div class="col-hidden-xs col-sm-1 col-md-1 col-lg-1"></div>
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-8">
			<h4><input class="form-control" value="{{$projectNameEN or ''}}" name="projectNameEN"/></h4>
			<h4><input class="form-control" value="{{$projectNameTH or ''}}" name="projectNameTH"/></h4>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<span class="textt pull-left">type</span>
				<select class="selectType" name="selectType">
					@foreach($type as $ty)
						@if($projectType == $ty->id)
				  		<option value="{{$ty->id}}" selected>{{$ty->type_name}}</option>
						@else
							<option value="{{$ty->id}}">{{$ty->type_name}}</option>
						@endif
					@endforeach
				</select>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<span class="textt pull-left">category</span>
				<select class="selectCategory" name="selectCat">
					@foreach($category as $cat)
						@if($projectCat == $cat->id)
				  		<option value="{{$cat->id}}" selected>{{$cat->category_name}}</option>
						@else
							<option value="{{$cat->id}}">{{$cat->category_name}}</option>
						@endif
					@endforeach
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
			    	<textarea class="form-control" rows="3" placeholder="Enter your project description" name="detail">{{$detail or ''}}</textarea>
				</div>
			  </div>
			</div>
		</div>
		<div class="col-hidden-xs col-sm-1 col-md-1 col-lg-1"></div>
	</div>
	<div class="row">
		<div class="col-hidden-xs col-sm-1 col-md-1 col-lg-1"></div>
		<div class="col-xs-12 col-sm-10 col-md-5 col-lg-5">
			@if($groupPic != null)
			<img src="{{$groupPic}}" class="img-thumbnail" id="group-member">
			@else
			<img src="/img/no-image.png" class="img-thumbnail" id="group-member">
			@endif
				<div style="margin-bottom:20px">
					<a class="btn btn-danger del" id="dgroup" title="delete photo" >Delete</a>
					<label class="pic-size">group member photo (4:3)</label>
				</div>
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
			<div>
            <a class="btn btn-danger del" name="btn-delete" title="delete multiple image" >Delete</a>
        	</div>
            <div class="panel panel-default" style="margin-top:10px">
		        <div class="panel-body">
		            <div class="dataTable_wrapper">
		                <ul class="row image-view">
											<?php
			                	$count = 0 ;
			                ?>
												@if($screenshot)
										 			@foreach($screenshot as $img)
											 			<li class="col-xs-4 gallery" id="pic{{$count}}">
													 			<img src="{{asset($img->picture_path_name)}}"/>
													 			<input type="hidden" id="ssid{{$count++}}" value="{{$img->id}}"/>
													 		</li>
										 			@endforeach
												@else
													<div class="noproject">no image uploaded</div>
								 				@endif
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
							@foreach($student as $st)
	            <div class="controls">
              	<div class="col-xs-7 col-md-7 col-lg-7 textt fullname">{{$st->student_name}}</div>
                  <div class="input-group col-lg-5">
                      <input class="form-control" type="text" placeholder="student no." value="{{$st->student_id}}"/>
                  	<span class="input-group-btn">
                          <button class="btn btn-success" type="button">
                              <span class="glyphicon glyphicon-plus"></span>
                          </button>
                      </span>
                  </div>
	            </div>
							@endforeach
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
					@foreach($alladvisor as $alladv)
						@if($mainAdv[0]->id == $alladv->id)
							<option value="{{$alladv->id}}" selected>{{$alladv->advisor_name}}</option>
						@else
							<option value="{{$alladv->id}}">{{$alladv->advisor_name}}</option>
						@endif
					@endforeach
			 	</select>
			</div>
			<div class="col-lg-3 textt">Co-advisor</div>
			<div class="col-lg-9">
				<select class="selectCoadv advisor" multiple data-width="100%" data-max-options="1" id="mainAdvisor" name="subAdv">
					@foreach($alladvisor as $alladv)
							@if($subAdv != null && $subAdv[0]->id == $alladv->id)
								<option value="{{$alladv->id}}" selected>{{$alladv->advisor_name}}</option>
							@else
								<option value="{{$alladv->id}}">{{$alladv->advisor_name}}</option>
							@endif
					@endforeach
			 	</select>
			</div>
			</div>
		</div>
		<div class="embed-responsive embed-responsive-16by9">
			<iframe id="vdo" width="1280" height="720" src="https://www.youtube.com/embed/XqJU9HWBUsE" frameborder="0" allowfullscreen></iframe>
		</div>
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Paste a youtube link" id="embedcode" name="video" value="{{$video or ''}}">
				<span class="input-group-btn">
					<button class="btn btn-primary embed" type="button">Embed</button>
				</span>
			</div>
		</div>
		<div class="col-hidden-xs col-sm-1 col-md-1 col-lg-1"></div>
	</div>
	</form>
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
$("#dposter").click(function(){
	$('#cover').attr('src','/img/no-poster.png');
})
$("#dgroup").click(function(){
	$('#group-member').attr('src','/img/no-image.png');
})
</script>
<script type="text/javascript">

</script>
@stop
