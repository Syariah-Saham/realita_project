@extends('layouts.admin')
@section('title'  , 'Tambah Sektor')
@section('body')

	<form action="{{ url('admin/sector/create') }}" class="w-1/2 rounded-xl bg-white shadow-lg p-4" method="post">
		@csrf
		<h1 class="text-2xl font-bold text-gray-600 mb-2 mt-6">Tambah Sektor</h1>
		<div class="form-group">
			<label for="sector" class="form-label">Nama Sektor </label>
			<input autofocus="true" type="text" id="sector" name="sector" class="form-input @error('sector') is-invalid @enderror " value="{{ old('sector') }}">
			@include('vendor.components.error' , ['name' => 'sector'])
		</div>
		<button class="btn">Tambah</button>
	</form>

	<table class="w-1/2 mt-4 rounded overflow-hidden shadow-lg">
		<thead class="bg-green-400 text-white">
			<tr>
				<th class="p-2">Sektor</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			@forelse($sectors as $sector)
				<tr>
					<td class="p-2">{{ $sector->sector }}</td>
					<td class="col-badge">
						<a href="{{ url('admin/report') }}" class="badge bg-green">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
							  <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
							</svg>
						</a>
						<form action="{{ url('admin/sector/' . $sector->id) }}" method="post">
							@csrf
							@method('delete')
							<button class="badge bg-red">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
								  <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
								</svg>
							</button>
						</form>
					</td>
				</tr>
			@empty
				<tr>
					<td colspan="2" class="text-center text-lg font-bold">Tidak ada data</td>
				</tr>
			@endforelse
		</tbody>
	</table>

@endsection
	