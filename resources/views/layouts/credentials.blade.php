<!DOCTYPE html>
<html>
<head>
  @include('partials._head')
  @yield('stylesheet')
</head>
<body class="hold-transition login-page">
	<div class="login-box">
  		<div class="login-logo">
    		<a href="#"><b>Absen</b> Siswa</a>
  		</div>
  		<div class="login-box-body">
  			@yield('content')
  		</div>
  	</div>
  	@include('partials._javascript')
    @yield('javascript')
</body>
</html>