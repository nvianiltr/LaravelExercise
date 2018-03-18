<!DOCTYPE html>
<html>
<head>
	<title>Laravel Testing</title>
</head>
<body>
	<form method="POST" action="/register">
		<!-- buit-in function by laravel to make it secure -->
		{{ csrf_field() }} 
		<input type="name" name="name" placeholder="name" required><br>
		<input type="email" name="email" placeholder="email" required><br>
		<input type="password" name="password" placeholder="password" required><br>
		<button type="submit">Submit</button>
	</form>
</body>
</html>