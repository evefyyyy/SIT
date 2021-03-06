@extends('adminTmp')
@section('content')
<div id="scoresheet">
	<h2><img height="45" src="/img/exam.png">score sheet</h2>
	<div class="row">
		<div class="col-xs-1 col-md-3 col-lg-3"></div>
		<div class="col-xs-10 col-md-6 col-lg-6" id="scoreyear">
			<div id="center">
				<a href="managescore/template" id="temp-btn" class="btn">manage template</a>
				<a href="managescore/criteria" id="cri-btn" class="btn">manage criteria</a>
			</div>
			<table class="table table-bordered table-hover">
				<tbody>
					@foreach($year as $y)
					<tr>
						<td width="35%">year {{$y->year}}</td><td width="65%"><a href="/exam/managescore/{{$y->year}}">view score sheet <i class="glyphicon glyphicon-list-alt gi-1x"></i></a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="col-xs-1 col-md-3 col-lg-3"></div>
	</div>
	</div>
@stop