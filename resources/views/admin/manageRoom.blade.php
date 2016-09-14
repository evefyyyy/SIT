@extends('adminTmp')
@section('content')
<div class="row news-head">
	<div class="hidden-xs col-md-1 col-lg-1"></div>
	<div class="col-xs-12 col-md-10 col-lg-10">
		<img height="45" src="/img/examroom.png"><label>manage exam room</label>
		<span id="pendlink">
			<a class="btn" href="manageroom/addroom"><i class="glyphicon glyphicon-plus" data-toggle="modal" data-target="#addDoc"></i>add room</a>
		</span>
	</div>
	<div class="hidden-xs col-md-1 col-lg-1"></div>
</div>
<div class="row" id="examroom">
	<div class="col-xs-1 col-md-3 col-lg-3"></div>
	<div class="col-xs-10 col-md-6 col-lg-6">
		<div class="panel panel-primary">
			<div class="panel-heading">exam room 1</div>
			<div class="panel-body">
				<div class="row">
			    <div class="col-xs-4 col-md-4 col-lg-4 titlee">room</div>
				<div class="col-xs-8 col-md-8 col-lg-8">training 1/3</div>
				</div>
				<div class="row">
				<div class="col-xs-4 col-md-4 col-lg-4 titlee">date</div>
				<div class="col-xs-8 col-md-8 col-lg-8">25 July 2014 (8.30am-15.00pm)</div>
				</div>
				<div class="row">
				<div class="col-xs-4 col-md-4 col-lg-4 titlee">exam commitee</div>
				<div class="col-xs-8 col-md-8 col-lg-8">umaporn, pichet, olarn, montri</div>
				</div>
			</div>
		</div>
		<div class="panel panel-primary">
			<div class="panel-heading">exam room 2</div>
			<div class="panel-body">
				<div class="row">
			    <div class="col-xs-4 col-md-4 col-lg-4 titlee">room</div>
				<div class="col-xs-8 col-md-8 col-lg-8">training 2/3</div>
				</div>
				<div class="row">
				<div class="col-xs-4 col-md-4 col-lg-4 titlee">date</div>
				<div class="col-xs-8 col-md-8 col-lg-8">25 July 2014 (8.30am-15.00pm)</div>
				</div>
				<div class="row">
				<div class="col-xs-4 col-md-4 col-lg-4 titlee">exam commitee</div>
				<div class="col-xs-8 col-md-8 col-lg-8">sumet, kittiphan, ekapong, wichai</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-1 col-md-3 col-lg-3"></div>
</div>
@stop