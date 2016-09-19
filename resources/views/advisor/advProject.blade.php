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
		<div class="col-xs-4 col-md-2 col-lg-2">	</div>
		<div class="hidden-xs col-md-1 col-lg-1"></div>
	</div>
	<div class="row">
		<div id="projectTB" style="margin-top:30px">
			<table class="table table-bordered results">
				<thead>
					<tr>
						<th style="width:12%">Project ID</th>
						<th style="width:57%">Project name</th>
						<th style="width:8%">Type</th>
						<th style="width:12%">co-advisor</th>
						<th style="width:10%">proposal</th>
						<th style="width:7%">score</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td colspan="6" class="no-project">no project found</td>
					</tr>
					<tr>
						<td>IT56-BU05</td>
						<td id="name">
							<a href="#">KMUTT Network dormitory booking web application<br>เว็บแอปพลิเคชั่นจองหอพักในเครือข่ายรอบ มจธ.</a>
						</td>
						<td>Business</td>
						<td class="firstname">Montri Supattatham</td>
						<td id="center"><a href="#" download><span class="flaticon-pdf-file-format-symbol"></span></td></a>
						<td id="center"><a data-toggle="modal" data-target="#scoreModal1"><span class="glyphicon glyphicon-list"></span></a></td>
					</tr>
					<tr>
						<td>IT56-RE11</td>
						<td id="name">
							<a href="#">System management of health center<br>ระบบบริหารงานสถานีอนามัย</a>
						</td>
						<td>research</td>
						<td class="firstname">Pichet Limvachiranan</td>
						<td id="center"><a href="#" download><span class="flaticon-pdf-file-format-symbol"></span></td></a>
						<td id="center"><a data-toggle="modal" data-target="#scoreModal2"><span class="glyphicon glyphicon-list"></span></a></td>
					</tr>
					<tr>
						<td>IT56-SO06</td>
						<td id="name">
							<a href="#">Xinchao Vietnam language learning game<br>สื่อการเรียนรู้ภาษาเวียดนาม</a>
						</td>
						<td>social</td>
						<td class="firstname">Ekapong Jungcharoensukying</td>
						<td id="center"><a href="#" download><span class="flaticon-pdf-file-format-symbol"></span></td></a>
						<td id="center"><a data-toggle="modal" data-target="#scoreModal3"><span class="glyphicon glyphicon-list"></span></a></td>
					</tr>
					<tr>
						<td>IT56-SO10</td>
						<td id="name">
							<a href="#">driving license simulation game<br>เกมจำลองสถานการณ์สอบใบอนุญาติขับขี่รถยนต์</a>
						</td>
						<td>social</td>
						<td class="firstname">Ekapong Jungcharoensukying</td>
						<td id="center"><a href="#" download><span class="flaticon-pdf-file-format-symbol"></span></td></a>
						<td id="center"><a data-toggle="modal" data-target="#scoreModal4"><span class="glyphicon glyphicon-list"></span></a></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="modal fade" id="scoreModal1" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content" id="center">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">IT56-BU05</h4>
				</div>
				<div class="modal-body">
					<table class="table table-bordered myscore">
						<tbody>
							<tr>
								<td>exam round 1</td><td class="good">good</td>
							</tr>
							<tr>
								<td>exam round 2</td><td class="fair">fair</td>
							</tr>
							<tr>
								<td>exam round 3</td><td class="verygood">very good</td>
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
	<div class="modal fade" id="scoreModal2" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content" id="center">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">IT56-RE11</h4>
				</div>
				<div class="modal-body">
					<table class="table table-bordered myscore">
						<tbody>
							<tr>
								<td>exam round 1</td><td class="verygood">very good</td>
							</tr>
							<tr>
								<td>exam round 2</td><td class="verygood">very good</td>
							</tr>
							<tr>
								<td>exam round 3</td><td class="verygood">very good</td>
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
	<div class="modal fade" id="scoreModal3" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content" id="center">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">IT56-SO06</h4>
				</div>
				<div class="modal-body">
					<table class="table table-bordered myscore">
						<tbody>
							<tr>
								<td>exam round 1</td><td class="poor">poor</td>
							</tr>
							<tr>
								<td>exam round 2</td><td class="good">good</td>
							</tr>
							<tr>
								<td>exam round 3</td><td class="good">good</td>
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
	<div class="modal fade" id="scoreModal4" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content" id="center">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">IT56-SO10</h4>
				</div>
				<div class="modal-body">
					<table class="table table-bordered myscore">
						<tbody>
							<tr>
								<td>exam round 1</td><td class="good">good</td>
							</tr>
							<tr>
								<td>exam round 2</td><td class="fair">fair</td>
							</tr>
							<tr>
								<td>exam round 3</td><td class="good">good</td>
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
	<script src="{!! URL::asset('js/search.js') !!}"></script>
	<script>
	$('.no-project').hide();
	$('.results').filterForTable();
	$('.firstname').each(function(index) {
		document.getElementsByClassName('firstname')[index].innerHTML = $(this).text().split(' ')[0]
	});
	</script>
	@stop