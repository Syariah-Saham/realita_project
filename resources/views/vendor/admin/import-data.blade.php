@extends('layouts.admin')
@section('title'  , 'Import Data')
@section('body')

<h1>Import Data</h1>

<form action="{{ url('admin/import/stock') }}" method="post">
	@csrf
	<button class="btn">Import Data Saham</button>
</form>

<form action="{{ url('admin/import/report') }}" method="post">
	@csrf
	<button class="btn">Import Laporan Keuangan</button>
</form>

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


@endsection
	