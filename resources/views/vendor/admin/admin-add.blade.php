@extends('layouts.admin')
@section('title'  , 'Tambah Admin')
@section('body')


<form action="{{ url('admin/admin') }}" class="bg-white md:w-1/2 rounded-xl shadow-lg py-3 px-6 mt-5" method="post">
	@csrf
	<h1 class="text-2xl font-bold text-gray-600 mb-2 mt-6">Tambah Admin</h1>
	<div class="form-group">
		<label for="name" class="form-label">Nama</label>
		<input autofocus="true" type="text" class="form-input @error('name') is-invalid @enderror " name="name" value="{{ old('name') }}">
		@include('vendor.components.error' , ['name' => 'name'])
	</div>
	<div class="form-group">
		<label for="email">Email</label>
		<input type="email" class="form-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
		@include('vendor.components.error' , ['name' => 'email'])
	</div>
	<div class="form-group">
		<label for="password">Password</label>
		<input type="password" class="form-input @error('password') is-invalid @enderror" name="password">
		@include('vendor.components.error' , ['name' => 'password'])
	</div>
	<div class="form-group">
		<label for="password_confirmation">Konfirmasi Password</label>
		<input type="password" class="form-input" name="password_confirmation">
	</div>
	<button class="btn">Kirim</button>
</form>

@endsection
	