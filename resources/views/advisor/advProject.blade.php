@extends('advTmp')
@section('content')
<link href="{!! URL::asset('css/datatables.css') !!}" rel="stylesheet">
<script src="{!! URL::asset('js/datatables.min.js') !!}"></script>
<div class="row">
	<div class="col-xs-1 col-md-1 col-lg-1"></div>
	<div class="col-xs-4 col-md-4 col-lg-4">
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
		<div class="col-xs-6 col-md-6 col-lg-6 table-bar">
        <div class="btn-group">
        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span> <span class="caret"></span></button>
			<ul class="dropdown-menu dropdown-menu-right">
				  <li>
				    <a class="small toggle-vis" data-value="option1" tabIndex="-1" data-column="0">
				      <input type="checkbox" checked/>&nbsp;Project ID
				    </a>
				  </li>
				  <li>
				    <a class="small toggle-vis" data-value="option2" tabIndex="-1" data-column="1">
				      <input type="checkbox" checked/>&nbsp;Project name
				    </a>
				  </li>
				  <li>
				    <a class="small toggle-vis" data-value="option3" tabIndex="-1" data-column="2">
				      <input type="checkbox" checked/>&nbsp;Type
				    </a>
				  </li>
				  <li>
				     <a class="small toggle-vis" data-value="option4" tabIndex="-1" data-column="3">
				       <input type="checkbox" checked/>&nbsp;Main advisor
				     </a>
				  </li>
				  <li>
				     <a class="small toggle-vis" data-value="option5" tabIndex="-1" data-column="4">
				       <input type="checkbox" checked/>&nbsp;Co-advisor
				     </a>
				  </li>
				  <li>
				     <a class="small toggle-vis" data-value="option6" tabIndex="-1" data-column="5">
				       <input type="checkbox" checked/>&nbsp;Proposal
				     </a>
				  </li>
				  <li>
				     <a class="small toggle-vis" data-value="option7" tabIndex="-1" data-column="6">
				       <input type="checkbox" checked/>&nbsp;Score
				     </a>
				  </li>
			</ul>
		</div>
       <input id="searchInput" name="search" class="pjsearch form-control" placeholder="Search here"/>
	</div>
	<div class="col-xs-1 col-md-1 col-lg-1"></div>
	</div>
	<div class="row">
		<div class="hidden-xs col-md-1 col-lg-1"></div>
        <div class="col-xs-12 col-md-10 col-lg-10" id="projectTB" style="margin-top:30px">
			<table id="pjtable" class="table table-bordered results">
				<thead>
					<tr>
						<th>Project ID</th>
						<th>Project name</th>
						<th>Type</th>
						<th>Main advisor</th>
						<th>co-advisor</th>
						<th>proposal</th>
						<th>score</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$proCount = 0;
						$scoreCount = 0;
					 ?>
					@if($project === 0)
					@else
					@foreach($project as $pj)
					<tr>
						<td>{{$pj->group_project_id}}</td>
						<td id="name">
							<a class="tblink" href="/showproject/{{$pj->id}}" target="_blank">{{$pj->group_project_eng_name}}<br>{{$pj->group_project_th_name}}</a>
						</td>
						<td>{{$pj->type->type_name}}</td>
						@if($pj->countAdv == 2)
							@foreach($pj->advisor as $adv)
							<td class="firstname">{{$adv->advisor_name}}</td>
							@endforeach
						@else
							@foreach($pj->advisor as $adv)
							<td class="firstname">{{$adv->advisor_name}}</td>
							@endforeach
							<td class="firstname"></td>
						@endif
						<td id="center"><a class="tblink" data-toggle="modal" data-target="#propModal{{$proCount++}}"><span class="glyphicon glyphicon-folder-open gi-2x"></span></a></td>
						<td id="center"><a class="tblink" data-toggle="modal" data-target="#scoreModal{{$scoreCount++}}"><span class="glyphicon glyphicon-list-alt gi-3x"></span></a></td>
					</tr>
					@endforeach
					@endif
				</tbody>
			</table>
		</div>
	</div>
	<div class="hidden-xs col-md-1 col-lg-1"></div>
</div>
	<?php
		$proCount = 0;
		$scoreCount = 0;
	 ?>
	 @if($project === 0)
	 @else
	 @foreach($project as $pj)
	<div class="modal fade" id="scoreModal{{$scoreCount++}}" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content" id="center">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">{{$pj->group_project_id}}</h4>
				</div>
				<div class="modal-body">
					<table class="table table-bordered myscore">
						<tbody>
							<tr>
								<td width="50%">exam round 1</td><td>A <span class="verygood">(very good)</span></td>
							</tr>
							<tr>
								<td>exam round 2</td><td>B <span class="good">(good)</span></td>
							</tr>
							<tr>
								<td>exam round 3</td><td>B+ <span class="verygood">(very good)</span></td>
							</tr>
							<tr>
								<td>exam round 4</td><td></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	@endforeach
	@endif
	<?php
		$proCount = 0;
		$scoreCount = 0;
	 ?>
	 @if($project === 0)
	 @else
	@foreach($project as $pj)
	<div class="modal fade" id="propModal{{$proCount++}}" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content" id="center">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">{{$pj->group_project_id}}</h4>
				</div>
				<div class="modal-body">
					<table class="table table-bordered myprop">
						<tbody>
							<tr>
								@if($pj->firstDraftProposal === null)
								@else
								<td width="60%">first draft proposal</td><td width="40%"><a class="tblink" href="/proposalFile/{{$pj->firstDraftProposal}}" download><span class="flaticon-pdf-file-format-symbol"></span></a></td>
								@endif
							</tr>
							<tr>
								@if($pj->firstProposal === null)
								@else
								<td>first proposal</td><td><a class="tblink" href="/proposalFile/{{$pj->firstProposal}}" download><span class="flaticon-pdf-file-format-symbol"></span></a></td>
								@endif
							</tr>
							<tr>
								@if($pj->secondProposal === null)
								@else
								<td>second proposal</td><td><a class="tblink" href="/proposalFile/{{$pj->secondProposal}}" download><span class="flaticon-pdf-file-format-symbol"></span></a></td>
								@endif
							</tr>
							<tr>
								@if($pj->thirdProposal === null)
								@else
								<td>third proposal</td><td><a class="tblink" href="/proposalFile/{{$pj->thirdProposal}}" download><span class="flaticon-pdf-file-format-symbol"></span></a></td>
								@endif
							</tr>
							<tr>
								@if($pj->finalProposal === null)
								@else
								<td>final proposal</td><td><a class="tblink" href="/proposalFile/{{$pj->finalProposal}}" download><span class="flaticon-pdf-file-format-symbol"></span></a></td>
								@endif
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	@endforeach
	@endif
	<script src="{!! URL::asset('js/search.js') !!}"></script>
	<script>
	$('.results').filterForTable();
	$(document).ready(function() {
    var table = $('#pjtable').DataTable( {
    	 "searching": false
    } );

    $('a.toggle-vis').on( 'click', function (e) {

        // Get the column API object
        var column = table.column( $(this).attr('data-column') );

        // Toggle the visibility
        column.visible( ! column.visible() );


    } );
} );
	</script>
	@stop
