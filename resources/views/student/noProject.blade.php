@extends('stdTmp')
@section('content')
	<div class="page-header">
            <div class="col-md-12 noProject">
                <p>You did not have any project.</p>
                <a href="{{url('student/myproject/create/create')}}">Create project</a>
            </div>
    </div>
    <style type="text/css">
			#footer {
    			position: fixed !important;
    			height: 55px;
    		}
	</style>
@stop
