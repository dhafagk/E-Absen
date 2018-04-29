<!DOCTYPE html>
<html>
<head>
	@include('partials._head')
	@yield('stylesheet')
	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">
			@include('partials._navbar')
			@include('partials._sidebar')
			<div class="content-wrapper">
				<section class="content-header">
      				<h1>@yield('heading-title')
        				<small>@yield('heading-subtitle')</small>
      				</h1>
      				<ol class="breadcrumb">
        				<li><a href="#"><i class="fa fa-dashboard"></i> @yield('li-one')</a></li>
        				<li class="active">@yield('li-two')</li>
      				</ol>
    			</section>
    			<section class="content">
    				@yield('content')
    			</section>

			</div>
			@include('partials._footer')
		</div>
		@include('partials._javascript')
		@yield('javascript')
	</body>
</head>
</html>