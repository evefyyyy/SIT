@extends('adminTmp')
@section('content')
<h2><img height="45" src="/img/score.png">score record</h2>
<div class="row">
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
	<div id="dt-filter">
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
			<button class="btn btn-default" data-toggle="modal" data-target="#scorelv">score level</button>
	</div>
</div>
<!-- manage score level -->
	<div class="modal fade" id="scorelv" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content" id="center">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Score Level</h4>
			</div>
			<div class="modal-body">
				<table class="table table-bordered myscore">
					<tbody>
						<tr>
							<td width="50%">exam round 1</td><td width="50%">D <span class="poor">(poor)</span></td>
						</tr>
						<tr>
							<td>exam round 2</td><td>C+ <span class="fair">(fair)</span></td>
						</tr>
						<tr>
							<td>exam round 3</td><td>B <span class="good">(good)</span></td>
						</tr>
						<tr>
							<td>exam round 4</td><td></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	</div><!-- /.modal -->
<script>
$(document).ready(function() {
    var table = $('#pjtable').DataTable( {
		} );
$tmp = $("#dt-filter").html();
$("#dt-filter").empty();
$("#pjtable_filter").append($tmp );
		$('a.toggle-vis').on( 'click', function (e) {
			if($(this).children().prop('checked')){
				$(this).children().prop('checked',false);
			}else{
				$(this).children().prop('checked',true);
			}
        // Get the column API object
        var column = table.column( $(this).attr('data-column') );

        // Toggle the visibility
        column.visible( ! column.visible() );
    } );
} );
</script>
@stop
