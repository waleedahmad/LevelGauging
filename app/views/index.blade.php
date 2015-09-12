<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>@yield('title')</title>
		<link
			rel="stylesheet"
			href="//f.fontdeck.com/s/css/sDLal4th9BQH2lvZFncwJ6sQBs4/{{$_SERVER['SERVER_NAME']}}/59246.css"
			type="text/css"
		/>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<link rel="stylesheet" href="{{URL::to('/assets/')}}/bower_components/bootstrap/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="{{URL::to('/assets/build/css/style.css')}}">
		@if(isset($tank->id))
		<meta name="tankid" content="{{$tank->id}}">
		@endif

		@if(isset($user_id))
		<meta name="userid" content="{{$user_id}}">
		@endif
	</head>
	<body>
		<div class="wrapper">
			@yield('register-form')
			@yield('login-form')
			@yield('client-dashboard')
			@yield('client-details')
			@yield('client-notifications')
			@yield('client-data')
			@yield('client-addresses')
			@yield('admin-authorize')
		</div>
	</body>
	<script type="text/javascript" src="{{URL::to('/assets/')}}/bower_components/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="{{URL::to('/assets/')}}/bower_components/jquery-ui/ui/minified/datepicker.min.js"></script>
	<script type="text/javascript" src="{{URL::to('/assets/')}}/build/js/timepicker.min.js"></script>
	<script type="text/javascript" src="{{URL::to('/assets/')}}/build/js/app.min.js"></script>

</html>
