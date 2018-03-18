<!-- THIS PAGE SHOWS ALL THE REGISTERED USERS -->
@extends('layout')
@section('content')
<h1 class="page-header text-center">REGISTERED USERS</h1>
<hr>
<table class="table table-striped table-bordered">		
	<tr>
		<th>Name</th>
		<th>Email</th>
		<th>Action</th>
	</tr>
	@foreach($members as $user)
	<tr>
		<td> {{ $user->name }} </td>
		<td> {{ $user->email }}</td>
		<td>
			<ul class="list-unstyled">
				<li><a href="/ViewUser/{{ $user->id }}" class="text-primary">Detail</a></li>
				<li><a href="/EditProfile/{{ $user->id }}" class="text-primary">Edit</a></li>
				<li><a href="/ChangePassword/{{ $user->id }}" class="text-primary">Change Password</a></li>
				<li><a href="/Delete/{{ $user-> id }}" class="text-danger">Delete</a></li>
			</ul>
		</td>
	</tr>
	@endforeach
</table>
@endsection

@if (session('success'))
<div class="alert alert-success">
	{{ session('success') }}
</div>
@endif

@if (session('fail'))
<div class="alert alert-danger">
	{{ session('fail') }}
</div>
@endif