<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Dashboard</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
		<link rel="stylesheet" href="{{URL::to('/assets/build/css/style.css')}}" media="screen" title="no title" charset="utf-8">
	</head>
	<body>
		<div class="main">
			<div class="sidebar">
				<div class="nav">
					<ul>
						<li>
							<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
						</li>
						<li>
							<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
						</li>
						<li>
							<span class="glyphicon glyphicon-screenshot" aria-hidden="true"></span>
						</li>
						<li>
							<span class="glyphicon glyphicon-file" aria-hidden="true"></span>
						</li>
					</ul>
				</div>
				<div class="tankers">
					<div class="header">
						<h3>Dashboard</h3>
					</div>
					<div class="tanks">
						<ul>
							<li class="active"> <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Tank 1</li>
							<li> <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Tank 2</li>
							<li><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Tank 3</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="content">
				<div class="header">
					<div class="left">
						<h2>Dashboard of Tank 1</h2>
					</div>
					<div class="right">
						Southern-on-Sea 19C
					</div>
				</div>
				<div class="blocks">
					<div class="left">
						<div class="capchart">
							<div id="container-speed" style="width: 500px; height: 300px; float: left; margin-top: 30px; margin-left: 20px;"></div>
						</div>
						<div class="specs">
						</div>
					</div>
					<div class="right">
						<div class="data">
							<ul>
								<li>
									Data 1
								</li>
								<li>
									Data 2
								</li>
								<li>Data 3</li>
							</ul>
						</div>
						<div class="inspect">
							Inspect
						</div>
					</div>
				</div>
				<div class="chart">
					<div id="container" style="min-width: 310px; height: 497px; margin: 0 auto"></div>
				</div>
			</div>
		</div>
	</body>
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="http://code.highcharts.com/highcharts.js"></script>
	<script src="http://code.highcharts.com/highcharts-more.js"></script>
	<script src="http://code.highcharts.com/modules/solid-gauge.js"></script>
	<script src="http://code.highcharts.com/modules/exporting.js"></script>
	<script type="text/javascript" src="{{URL::to('/assets/')}}/build/js/app.min.js">
	</script>
</html>