@extends('adminnav')
@section('sidebar')
<div class="sidebar container">
	<div class="row">
		<div class="wrapper">
			<div class="side-bar">
				<ul>
					<li class="menu-head">
						global setting<a href="#" class="push_menu"><span class="glyphicon glyphicon-menu-hamburger pull-right"></span></a>
					</li>
					<div class="menu">
						<li>
							<a class="{{ strrpos(Request::path(),'setting/admin') === 0 ? 'active' : ''  }}" href="/setting/admin">admin<span class="glyphicon glyphicon-user pull-right"></span></a>
						</li>
						<li>
							<a href="#">students</a>
						</li>
						<li>
							<a href="#">test room</a>
						</li>
						<li>
							<a class="{{ strrpos(Request::path(),'setting/recommend') === 0 ? 'active' : ''  }}" href="/setting/recommend">recommend</a>
						</li>
						<li>
							<a href="#">year</a>
						</li>
						<li>
							<a href="#">type</a>
						</li>
						<li>
							<a href="#">category</a>
						</li>
					</div>

				</ul>
			</div>   
			<div class="page-content">
				<div class="col-md-12">
					@yield('content')
				</div>
			</div>
		</div>
	</div>
</div>
<script>
$(document).ready(function(){
	$(".push_menu").click(function(){
		$(".wrapper").toggleClass("active");
		$(".page-content").toggleClass("active");
	});
});
</script>
@stop