<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>@yield('title')</title>
		<link rel="stylesheet" href="//f.fontdeck.com/s/css/sDLal4th9BQH2lvZFncwJ6sQBs4/DOMAIN_NAME/59246.css" type="text/css" />
		<link rel="stylesheet" href="{{URL::to('/assets/')}}/bower_components/bootstrap/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="{{URL::to('/assets/build/css/style.css')}}">
	</head>
	<body>
		<div class="wrapper">
			@yield('register-form')
			@yield('login-form')

			@if(Session::has('auth'))
				<a href="/logout">Logout</a>
			@endif
		</div>
	</body>
	<script type="text/javascript" src="{{URL::to('/assets/')}}/bower_components/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="{{URL::to('/assets/')}}/build/js/app.min.js">
	</script>
</html>
