@extends('adminnav')
@section('sidebar')
<div class="sidebar container">
	<div class="row">
		<div class="wrapper">
			<div class="side-bar">
				<ul>
					<li class="menu-head">
						current year<a href="#" class="push_menu"><span class="glyphicon glyphicon-menu-hamburger pull-right"></span></a>
					</li>
					<div class="menu">
						<li>
							<a class="{{ strrpos(Request::path(),'setting/current/type') === 0 ? 'active' : ''  }}" href="/setting/current/type">type</a>
						</li>
						<li>
							<a class="{{ strrpos(Request::path(),'setting/current/category') === 0 ? 'active' : ''  }}" href="/setting/current/category">category</a>
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