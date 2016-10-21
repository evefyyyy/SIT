@extends('generalTmp')
@section('content')
<div class="row filter-head">
        <div class="col-lg-12">
            <div class="text-center">
                <button class="btn btn-sm" data-toggle="portfilter" data-target="all">
                    All
                </button>
                @foreach($category as $cat)
                <button class="btn btn-sm" data-toggle="portfilter" data-target="{{$cat->category_name}}">
                    {{$cat->category_name}}
                </button>
                @endforeach
            </div>
        </div>
    </div>
<div class="row">
	<div class="hidden-xs col-sm-1 col-md-1 col-lg-1"></div>
		<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">

      @foreach($groupProject as $project)
      <?php
        $id = $project->id;
        $poster = DB::table('pictures')
                  ->where('project_pkid',$id)
                  ->where('picture_type_id','=','1')
                  ->value('picture_path_name');
      
       ?>
			<div class="col-xs-18 col-sm-6 col-md-4 col-lg-3" data-tag='{{$project->category->category_name}}'>
	          <div class="thumbnail">
	          	<div class="pdf-thumb-box">
			      <a href="/showproject/{{$project->id}}">
			      	 <div class="pdf-thumb-box-overlay">
			        	<div class="center-box"></div><i class="glyphicon glyphicon-eye-open gi-2x"></i>
       				 </div>
              @if(count($poster)===0)
              <img src="/img/no-poster.png">
              @else
	          <img src="{{$poster}}" alt="">
              @endif
          		</a>
          		</div>
	              <div class="caption">
	                <h6>{{$project->group_project_eng_name}}</h6>
                  @if(count($project->ProjectDetail) === 0)
                    <p></p>
                  @else
	                   <p>{{$project->projectDetail[0]->group_project_detail}}</p>
                  @endif
	            </div>
	       	  </div>
	       	</div>
          @endforeach
	<div class="hidden-xs col-sm-1 col-md-1 col-lg-1"></div>
</div>
	<script>
		$(document).ready(function() {
		    $("div.caption").dotdotdot(
		    {
		        ellipsis : '...',
		        wrap: "word",
		        height: 70,
		    });
		});
	</script>
@stop
