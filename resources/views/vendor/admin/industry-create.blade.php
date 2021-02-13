@extends('layouts.admin')
@section('title'  , 'Tambah Industry')
@section('body')

<form action="{{ url('admin/industry/create') }}" class="w-1/2 rounded-xl bg-white shadow-lg p-4" method="post">
	@csrf
	<h1 class="text-2xl font-bold text-gray-600 mb-2 mt-6">Tambah Industri</h1>
	<div class="form-group">
		<label for="industry" class="@error('industry') text-red-400 @enderror ">Nama Industri </label>
		<input autofocus="true" autocomplete="industry" type="text" id="industry" name="industry" class="form-input @error('industry') is-invalid @enderror " value="{{ old('industry') }}">
		@include('vendor.components.error' , ['name' => 'industry'])
	</div>
	<button class="btn">Tambah</button>
</form>

<table class="w-1/2 mt-4 rounded overflow-hidden shadow-lg">
	<thead class="bg-green-400 text-white">
		<tr>
			<th class="p-2">Industri</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		@forelse($industries as $industry)
			<tr>
				<td class="p-2">{{ $industry->industry }}</td>
				<td class="col-badge">
					<a href="{{ url('member/report') }}" class="badge bg-green">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
						  <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
						</svg>
					</a>
					<form action="{{ url('admin/industry/'.$industry->id) }}" method="post">
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
				<td colspan="2" class="text-lg font-bold text-center">Tidak ada data</td>
			</tr>
		@endforelse
	</tbody>
</table>

@endsection
	