<!DOCTYPE html>
<html>
<head>
	<title>Lab Exercise</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
		body {
			padding: 10px 10px;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<h3 class="navbar-brand">Laravel Exercise</h3>
			</div>
			
			<ul class="nav navbar-nav">
				<li><a href="/">Register</a></li>
				<li><a href="/all">View All</a></li>
			</ul>
		</div>
	</nav>
	<hr>
	@yield('content')
</body>
</html>