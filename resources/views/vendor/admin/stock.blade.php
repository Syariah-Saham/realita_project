@extends('layouts.admin')
@section('title'  , 'Saham')
@section('body')

@include('vendor.components.modal-delete')

<div class="container pb-20">
	<h1 class="text-2xl font-bold text-gray-600 mb-2 mt-6">Saham</h1>

	<a href="{{ url('admin/stock/create') }}" class="btn">Tambah Saham</a>

	<table class="w-full bg-white rounded-xl overflow-hidden shadow-lg">
		<thead class="bg-green-400 text-white">
			<tr>
				<th class="p-2">#</th>
				<th>Kode</th>
				<th>Nama Emiten</th>
				<th>Kapitalisasi</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			@forelse($stocks as $stock)
				<tr class="hover:bg-gray-100 transition duration-500">
					@include('vendor.components.iteration' , ['paginate' => 50])
					<td>{{ $stock->code_issuers }}</td>
					<td>{{ $stock->name }}</td>
					<td class="text-right">{{ Number::format($stock->capitalization) }}</td>
					<td class="col-badge">
						<a href="{{ url('admin/report/search/?keyword='.$stock->code_issuers) }}" class="badge bg-green">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
							  <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
							</svg>
						</a>
						<button data-action="{{ url('admin/stock/' . $stock->id) }}" class="badge badge-delete bg-red">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
							<path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
							</svg>
						</button>
					</td>
				</tr>
			@empty
				<tr>
					<td class="p-2 text-center text-lg font-bold" colspan="5">Tidak ada data</td>
				</tr>
			@endforelse
		</tbody>
	</table>

	<div class="py-4">
		{{ $stocks->links() }}
	</div>
	
</div>


@endsection
	