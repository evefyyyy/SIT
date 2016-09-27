@extends('adminTmp')
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
	<div class="col-xs-4 col-md-6 col-lg-6 table-bar">
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
				       <input type="checkbox" checked/>&nbsp;Category
				     </a>
				  </li>
				  <li>
				     <a class="small toggle-vis" data-value="option5" tabIndex="-1" data-column="4">
				       <input type="checkbox" checked/>&nbsp;Main advisor
				     </a>
				  </li>
				  <li>
				     <a class="small toggle-vis" data-value="option6" tabIndex="-1" data-column="5">
				       <input type="checkbox" checked/>&nbsp;Co-advisor
				     </a>
				  </li>
				  <li>
				     <a class="small toggle-vis" data-value="option7" tabIndex="-1" data-column="6">
				       <input type="checkbox" checked/>&nbsp;Proposal
				     </a>
				  </li>
			</ul>
		</div>
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
	<div class="hidden-xs col-md-1 col-lg-1"></div>
	<div class="col-xs-12 col-md-10 col-lg-10" id="projectTB" style="margin-top:30px">
		<table id="pjtable" class="table table-bordered results">
			<thead>
				<tr>
					<th>Project ID</th>
					<th>Project name</th>
					<th>Type</th>
					<th>Category</th>
					<th>main advisor</th>
					<th>co-advisor</th>
					<th>Proposal</th>
				</tr>
			</thead>
			<tbody>
				@if($countProject===0)

				<tr>
					<td colspan="6" class="no-project">no project found</td>
				</tr>
				@else
				@foreach($group_project as $gp)
				@if($gp->group_project_approve===1)


				<tr>
					<td>{{$gp->group_project_id}}</td>
					<td id="name">

						<a href="{{url('showproject/'.$gp->id)}}">{{$gp->group_project_eng_name}}<br>
							{{$gp->group_project_th_name}}
						</a>
					</td>
					<td>{{$gp->type->type_name}}</td>
					<td>{{$gp->category->category_name}}</td>
					<?php $advisors = App\ProjectAdvisor::where('project_pkid', $gp->id)->get();
                        $advisorsNo1 = $advisors[0]->advisor->advisor_name;
                        $advisorsNo2 = $advisors[1]->advisor->advisor_name;
                    ?>
					<td class="firstname">{{ $advisorsNo1 }}</td>
					<td class="firstname">{{ $advisorsNo2 }}</td>
					<td id="center"><a href="/proposalFile/{{$gp->proposal[0]->proposal_path_name}}" download><span class="flaticon-pdf-file-format-symbol"></span></td></a>
				</tr>

				@endif
				@endforeach
				@endif
			</tbody>
		</table>
	</div>
	<div class="hidden-xs col-md-1 col-lg-1"></div>
	</div>
</div>
<script src="{!! URL::asset('js/search.js') !!}"></script>
<script>
$('table').filterForTable();
$('#searchInput').on( 'keyup', function () {
    table.search( this.value ).draw();
} );
$('.firstname').each(function(index) {
	document.getElementsByClassName('firstname')[index].innerHTML = $(this).text().split(' ')[0]
});
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
