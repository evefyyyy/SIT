@extends('adminTmp')
@section('content')
<h2><img height="45" src="/img/score.png">score record</h2>
<div class="row">
	<div class="hidden-xs col-md-1 col-lg-1"></div>
	<div class="col-xs-6 col-md-5 col-lg-5"></div>
	<div class="col-xs-6 col-md-5 col-lg-5 table-bar">
		<div class="btn-group">
        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span> <span class="caret"></span></button>
			<ul class="dropdown-menu dropdown-menu-right">
				  <li>
				    <a href="#" class="small toggle-vis" data-value="option1" tabIndex="-1" data-column="2">
				      <input type="checkbox" checked/>&nbsp;Round 1
				    </a>
				  </li>
				  <li>
				    <a href="#" class="small toggle-vis" data-value="option2" tabIndex="-1" data-column="3">
				      <input type="checkbox" checked/>&nbsp;Round 2
				    </a>
				  </li>
				  <li>
				    <a href="#" class="small toggle-vis" data-value="option3" tabIndex="-1" data-column="4">
				       <input type="checkbox" checked/>&nbsp;Round 3
				    </a>
				  </li>
				  <li>
				     <a href="#" class="small toggle-vis" data-value="option4" tabIndex="-1" data-column="5">
				       <input type="checkbox" checked/>&nbsp;Round 4
				     </a>
				  </li>
			</ul>
		</div>
       <input id="searchInput" name="search" class="pjsearch form-control" placeholder="Search here"/>
	</div>
	<div class="hidden-xs col-md-1 col-lg-1"></div>
</div>
<div class="hidden-xs col-md-1 col-lg-1"></div>
	<div class="col-xs-12 col-md-10 col-lg-10" id="scoreTB">
		<table id="pjtable" class="table table-bordered" style="width:100%">
			<thead>
				<tr>
					<th>project id</th>
					<th>project name</th>
					<th>round 1</th>
					<th>round 2</th>
					<th>round 3</th>
					<th>round 4</th>
				</tr>
			</thead>
			<tbody>
				@foreach($project as $pj)
				<tr>
					<td>{{$pj->group_project_id}}</td>
					<td><a class="tblink" href="scorerecord/viewscore" target="_blank">{{$pj->group_project_th_name}}</a></td>
					<td>{{$pj->score1 !== [] ? $pj->score1[0]->score_test_sum : ''}}A <span class="good">(good)</span></td>
					<td>{{$pj->score2 !== [] ? $pj->score2[0]->score_test_sum : ''}}B <span class="fair">(fair)</span></td>
					<td>{{$pj->score3 !== [] ? $pj->score3[0]->score_test_sum : ''}}</td>
					<td>{{$pj->score4 !== [] ? $pj->score4[0]->score_test_sum : ''}}</td>
				</tr>
				@endforeach
			</tbody>
    	</table>
	</div>
<div class="hidden-xs col-md-1 col-lg-1"></div>
<script src="{!! URL::asset('js/search.js') !!}"></script>
<script>
$('table').filterForTable();
$('#searchInput').on( 'keyup', function () {
    table.search( this.value ).draw();
} );
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
