<!-- THIS PAGE SHOWS THE FORM THAT USER NEEDS TO FILL IN ORDER TO CHANGE PASSWORD -->
@extends('layout')
@section('content')
<h1 class="page-header text-center">Change Password</h1>
<hr>
<form method="POST" action ="/UpdatePassword/{{ $user->id }}">
	{{ csrf_field() }}
	{{ method_field('patch') }}


	<div class="form-group">
		<label>Current Password</label>
		<input type="password" class="form-control" name="oldpw" required>
	</div>
	<div class="form-group">
		<label>New Password</label>
		<input type="password" class="form-control" name="newpw" required>
	</div>
	<div class="form-group">
		<label>Confirm New Password</label>
		<input type="password" class="form-control" name="newpw_confirmation" required>
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