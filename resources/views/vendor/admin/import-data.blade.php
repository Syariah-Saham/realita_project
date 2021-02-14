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

@endsection
	