@extends('generalTmp')
@section('content')
<link href="{!! URL::asset('css/owl.carousel.css') !!}" rel="stylesheet">
<script src="{!! URL::asset('js/owl.carousel.min.js') !!}"></script>

	<div class="row">
		<div class="hidden-xs col-sm-1 col-md-1 col-lg-1"></div>
		<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
			<h5>ผลงานนักศึกษาคณะเทคโนโลยีสารสนเทศ มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าธนบุรี</h5>
		</div>
		<div class="hidden-xs col-sm-1 col-md-1 col-lg-1"></div>
	</div>
	<div class="row">
		<div class="hidden-xs col-sm-2 col-md-2 col-lg-2"></div>
		<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
			<p class="fancy"><span>recommend projects</span></p>
			<div id="recommend" class="owl-carousel">
				@foreach($recommend_project->shuffle() as $pj)
						<?php  
							$project_picture = App\Picture::all()->where('project_pkid', $pj->id)
    						->where('picture_type_id', 1)
    						->first();
						?>
		                <a href="/showproject/{{$pj->group_project_id}}"><div class="item"><img src="{{$project_picture->picture_path_name}}"></div>
		                <?php $count_show_project++; ?>
		                @if($count_show_project==5)
		                	<?php break; ?>
		                @endif
		        @endforeach
		    </div>
		    <a href="home/"><p class="fancyy"><span>Click here to see more</span></p></a>
		 </div>
		<div class="hidden-xs col-sm-2 col-md-2 col-lg-2"></div>
	</div>


<script>
    $(document).ready(function() {
      $("#recommend").owlCarousel({
      navigation : true,
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem : true,
      autoPlay : 2500,
      stopOnHover : false,
      rewindNav : true,
      responsive : true,
      autoHeight :true
      });
    });
</script>
@stop
