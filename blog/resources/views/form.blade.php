<!-- THIS PAGE SHOWS THE FORM THAT USER NEEDS TO FILL IN ORDER TO REGISTER -->
@extends('layout')

@section('content')
<h1 class="page-header text-center">REGISTER</h1>
<hr>
<form method="POST" action="/register">
	<!-- buit-in function by laravel to make it secure -->
	{{ csrf_field() }}
	<div class="form-group">
		<label>Name</label> 
		<input type="name" name="name" placeholder="Name" class="form-control" required>
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="email" name="email" placeholder="E-mail" class="form-control" required>
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="password" name="password" placeholder="Password" class="form-control" required>
	</div>
	<button type="submit">Submit</button>
</form>
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