<!DOCTYPE html>
<html>
<head>
	<title>Laravel Exercise</title>
</head>
<body>
	<table border=1>
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Action</th>
		</tr>
		@foreach($members as $user)
			<tr>
				<td> {{ $user->name }} </td>
				<td> {{ $user->email }}</td>
				<td><a href="/user/{{ $user->id }}">Detail</a></td>
			</tr>
		@endforeach
	</table>
</body>
</html>