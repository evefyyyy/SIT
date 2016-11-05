@extends('adminTmp')
@section('content')
<h2><img height="45" src="/img/score.png">score record</h2>
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
					<td><a class="tblink" href="scorerecord/viewscore/{{$pj->group_project_id}}" target="_blank">{{$pj->group_project_th_name}}</a></td>
					<td>{{$pj->score1 !== [] ? $pj->score1[0]->score_test_sum : ''}} <span class="good">(good)</span></td>
					<td>{{$pj->score2 !== [] ? $pj->score2[0]->score_test_sum : ''}} <span class="fair">(fair)</span></td>
					<td>{{$pj->score3 !== [] ? $pj->score3[0]->score_test_sum : ''}}</td>
					<td>{{$pj->score4 !== [] ? $pj->score4[0]->score_test_sum : ''}}</td>
				</tr>
				@endforeach
			</tbody>
    	</table>
	</div>
<div class="hidden-xs col-md-1 col-lg-1"></div>
	<div id="dt-filter">
		<button class="btn btn-default" data-toggle="modal" data-target="#scorelv">score level</button>
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
<div class="modal fade" id="scorelv" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">score level</h4>
			</div>
			<div class="modal-body">
				<table class="table table-bordered">
					<tbody>
						<tr>
							<td width="50%">more than<input type="number" class="form-control" min="0" max="100"></td><td><input class="form-control verygood"></td>
						</tr>
						<tr>
							<td>more than<input type="number" class="form-control" min="0" max="100"></td><td><input class="form-control good"></td>
						</tr>
						<tr>
							<td>more than<input id="pscore" type="number" class="form-control" min="0" max="100"></td><td><input class="form-control fair"></td>
						</tr>
						<tr>
							<td>less than<span></span></td><td><input class="form-control poor"></td>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">cancel</button>
					<button type="submit" class="btn btn-primary">save</button>
			</div>
		</div>
	</div>
</div>
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
$('#pscore').keyup(function () {
	var p = $('#pscore').val();
	$('#scorelv .table > tbody > tr > td > span').html(p);
});
</script>
@stop
