@extends('advTmp')
@section('content')
<div class="row">
	<div class="hidden-xs col-md-1 col-lg-1"></div>
	<div class="col-xs-4 col-md-2 col-lg-2">
		YEAR
	  <div class="dropdown" id="year">
	    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">All
	    <span class="caret"></span></button>
	    <ul class="dropdown-menu" role="menu" aria-labelledby="year">
	      <li><a href="#">All</a></li>
	      <li><a href="#">2016</a></li>
	    </ul>
	  </div>
	</div>
	<div class="col-xs-4 col-md-6 col-lg-6">
            <input id="searchInput" name="search" class="pjsearch form-control" placeholder="Search here"/>
	</div>
	<div class="col-xs-4 col-md-2 col-lg-2">
		<span id="pendlink">
			<a class="btn" href="/project/pending">Pending Projects</a>
		</span>
	</div>
	<div class="hidden-xs col-md-1 col-lg-1"></div>
</div>
<div class="row">
	<div id="projectTB" style="margin-top:30px">
		<table class="table table-bordered results">
			<thead>
				<tr>
					<th style="width:12%">Project ID</th>
					<th style="width:54%">Project name</th>
					<th style="width:8%">Type</th>
					<th style="width:8%">category</th>
					<th style="width:10%">advisor</th>
					<th style="width:0%">Proposal</th>
				</tr>
			</thead>
			<tbody>
				@if($countProject===0)

				<tr>
					<td colspan="6" class="no-project">no project found</td>
				</tr>
				@else
				@foreach($project as $pj)
				@if($pj->groupProject->group_project_approve===1)

				<tr>
					<td>{{$pj->groupProject->group_project_id}}</td>
					<td id="name">
						<a href="#">{{$pj->groupProject->group_project_eng_name}}<br>
							{{$pj->groupProject->group_project_th_name}}
						</a>
					</td>
					<td>{{$pj->groupProject->type->type_name}}</td>
					<td>{{$pj->groupProject->category->category_name}}</td>
					<?php $advisors = App\ProjectAdvisor::where('project_pkid', $pj->project_pkid)->get();
                        $advisorsNo1 = $advisors[0]->advisor->advisor_name;
                        $advisorsNo2 = $advisors[1]->advisor->advisor_name;
                    ?>
					<td class="firstname">{{ $advisorsNo1 }}</td>
					<td id="center"><a href="/proposalFile/{{$pj->groupProject->proposal[0]->proposal_path_name}}" download><span class="flaticon-pdf-file-format-symbol"></span></td></a>
				</tr>

				@endif
				@endforeach
				@endif
			</tbody>
		</table>
	</div>
</div>
<script src="{!! URL::asset('js/search.js') !!}"></script>
<script>
$('table').filterForTable();
$('.firstname').each(function(index) {
	document.getElementsByClassName('firstname')[index].innerHTML = $(this).text().split(' ')[0]
});
@stop