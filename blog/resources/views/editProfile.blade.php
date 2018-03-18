<!-- THIS PAGE SHOWS THE FORM THAT USER NEEDS TO FILL IN ORDER TO UPDATE HIS/HER PROFILE -->
@extends('layout')

@section('content')
<h1 class="page-header text-center">Edit Profile</h1>
<hr>
<form method="POST" action="/UpdateProfile/{{ $user->id }}">
	<!-- buit-in function by laravel to make it secure -->
	{{ csrf_field() }}
	{{ method_field('patch') }}
	<div class="form-group">
		<label>Name</label> 
		<input type="name" name="name" value="{{ $user->name }}" class="form-control" required>
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
	</div>
	<button type="submit">Confirm</button>
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