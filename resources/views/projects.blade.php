@extends('generalTmp')
@section('content')
<div class="row filter-head">
        <div class="col-lg-12">
            <div class="text-center">
                <button class="btn btn-sm" data-toggle="portfilter" data-target="all">
                    All
                </button>
                <button class="btn btn-sm" data-toggle="portfilter" data-target="education">
                    education
                </button>
                <button class="btn btn-sm" data-toggle="portfilter" data-target="games">
                    games
                </button>
                <button class="btn btn-sm" data-toggle="portfilter" data-target="health">
                    health
                </button>
                <button class="btn btn-sm" data-toggle="portfilter" data-target="sports">
                    sports
                </button>
                <button class="btn btn-sm" data-toggle="portfilter" data-target="travel">
                    travel
                </button>
                <button class="btn btn-sm" data-toggle="portfilter" data-target="others">
                    others
                </button>
            </div>
        </div>
    </div>
<div class="row">
	<div class="hidden-xs col-sm-1 col-md-1 col-lg-1"></div>
		<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
			<div class="col-xs-18 col-sm-6 col-md-3" data-tag='education'>
	          <div class="thumbnail">
	          	<div class="pdf-thumb-box">
			      <a href="/showproject">
			        <div class="pdf-thumb-box-overlay">
			        	<div class="center-box"></div><i class="glyphicon glyphicon-eye-open gi-2x"></i> 
       				 </div>
	            	<img src="/img/the_secret_life_of_pets.jpg" alt="">
	        	</a>
	   		 </div>
	              <div class="caption">
	                <h6>SIT Portfolio</h6>
	                <p>เว็บไซต์แสดงผลงานนักศึกษาคณะเทคโนโลยีสารสนเทศ</p>
	            </div>
	          </a>
	        </div>
		</div>
	<div class="hidden-xs col-sm-1 col-md-1 col-lg-1"></div>
</div>
	<script>
		$(document).ready(function() {
		    $("div.caption").dotdotdot(
		    {
		        ellipsis : '...',
		        wrap: "word",
		        height: 75,
		    });
		});
	</script>
@stop