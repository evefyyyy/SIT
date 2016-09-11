@extends('generalTmp')
@section('content')
<link href="{!! URL::asset('css/owl.carousel.css') !!}" rel="stylesheet">
<script src="{!! URL::asset('js/owl.carousel.min.js') !!}"></script>
	<div class="row">
		<div class="hidden-xs col-sm-1 col-md-1 col-lg-1"></div>
		<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
			<h5>ผลงานนักศึกษาคณะเทคโนโลยีสารสนเทศ สาขาวิชาเทคโนโลยีสารสนเทศ มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าธนบุรี</h5>
		</div>
		<div class="hidden-xs col-sm-1 col-md-1 col-lg-1"></div>
	</div>
	<div class="row">
		<div class="hidden-xs col-sm-2 col-md-2 col-lg-2"></div>
		<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
			<p class="fancy"><span>recommend projects</span></p>
			<div id="recommend" class="owl-carousel">
		                <div class="item"><a href="/showproject"><img src="/img/the_secret_life_of_pets.jpg"></a></div>
		                <div class="item"><a href="/showproject"><img src="/img/kung_fu_panda_2.jpg"></a></div>
		                <div class="item"><a href="/showproject"><img src="/img/kitty_12.jpg"></a></div>
		                <div class="item"><a href="/showproject"><img src="/img/summertime.jpg"></a></div>
		    </div>
		    <a href="projects"><p class="fancyy"><span>Click here to see more</span></p></a>
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