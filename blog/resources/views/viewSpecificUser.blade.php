<!-- THIS PAGE SHOWS USER'S INFORMATION DETAILS -->
@extends('layout')
@section('content')
<div class="container-fluid">
	<h1 class="page-header text-center"> {{ $user->name }}'s Profile</h1>
	<hr>
	<p class="lead"> ID: {{ $user->id }}</p>
	<p class="lead"> E-mail: {{ $user->email }}</p>
</div>
@endsection