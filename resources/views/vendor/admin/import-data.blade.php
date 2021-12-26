@extends('layouts.admin')
@section('title'  , 'Import Data')
@section('body')

@include('vendor.components.modal-delete')

<form action="{{ url('admin/import/report') }}" method="post" class="md:w-1/3 bg-white p-4 rounded-lg shadow-md my-4">
	@csrf
	<h3 class="font-semibold">Import Laporan Keuangan</h3>
	<div class="form-group">
		<label for="url" class="form-label">URL Data</label>
		<input type="url" class="form-input" value="{{ old('url') }}" name="url">
		@include('vendor.components.error' , ['name' => 'url'])
	</div>
	<div class="form-group">
		<label for="tahun" class="form-label">Tahun Laporan Keuangan</label>
		<input type="number" name="periode" class="form-input" value="{{ old('periode') }}">
		@include('vendor.components.error' , ['name' => 'periode'])
		<span><a href="{{ url('/admin/periode/create') }}" class="text-xs text-gray-400 hover:underline">lihat daftar periode</a></span>
	</div>
	<button class="btn">Import Laporan Keuangan</button>
</form>

<form action="{{ url('admin/import/stock') }}" method="post">
	@csrf
	<button class="btn">Import Daftar Saham</button>
</form>
	<button data-action="{{ url('admin/import/stock') }}" class="btn badge-delete">Reset Saham</button>


<form action="{{ url('admin/import/maintenance') }}" method="post">
	@csrf
	@method('put')
	@if($maintenance_mode === 'true')
		<input type="hidden" name="mode" value="false">
		<button class="bg-teal-400 text-white py-2 px-6 rounded-full my-2">Mode Maintenance : on</button>
	@else
		<input type="hidden" name="mode" value="true">
		<button class="bg-red-400 text-white py-2 px-6 rounded-full my-2">Mode Maintenance : off</button>
	@endif
</form>

<form action="{{ url('/admin/import/issi') }}" method="post">
    @csrf
    @method('put')
    <button class="btn">Update Index</button>
</form>


@endsection
