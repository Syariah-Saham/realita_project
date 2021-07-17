@extends('layouts.admin')
@section('title'  , 'Tambah Periode')
@section('body')

@include('vendor.components.modal-delete')

<form action="{{ url('admin/periode/create') }}" class="w-1/2 rounded-xl bg-white shadow-lg p-4" method="post">
	@csrf
	<h1 class="text-2xl font-bold text-gray-600 mb-2 mt-6">Tambah Periode</h1>
	<div class="form-group">
		<label for="periode" class="form-label">Tahun Periode </label>
		<input autofocus="true" type="text" id="periode" name="year" class="form-input @error('year') is-invalid @enderror " value="{{ old('year') }}">
		@include('vendor.components.error' , ['name' => 'year'])
	</div>
	<button class="btn">Tambah</button>
</form>

<table class="w-1/2 mt-4 rounded overflow-hidden shadow-lg">
	<thead class="bg-green-400 text-white">
		<tr>
			<th class="p-2">Periode</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		@forelse($periodes as $periode)
			<tr>
				<td class="p-2">{{ $periode->year }}</td>
				<td class="col-badge">
					<a href="{{ url('admin/report') }}" class="badge bg-green">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
						  <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
						</svg>
					</a>
					<button data-action="{{ url('admin/periode/'.$periode->id) }}" class="badge badge-delete bg-red">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
						<path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
						</svg>
					</button>
				</td>
			</tr>
		@empty
			<tr>
				<td class="p-2 text-center font-bold text-lg" colspan="2">Tidak ada data</td>
			</tr>
		@endforelse
	</tbody>
</table>

@endsection
	