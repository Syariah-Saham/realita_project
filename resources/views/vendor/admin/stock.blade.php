@extends('layouts.admin')
@section('title'  , 'Saham')
@section('body')

@php
	if(!isset($_GET['page'])) {
		$page = 0;
	} else {
		$page = $_GET['page']-1;
	}
@endphp

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
				<tr>
					<td class="p-2 text-center">{{ $page * 50 + $loop->iteration }}</td>
					<td>{{ $stock->code_issuers }}</td>
					<td>{{ $stock->name }}</td>
					<td>200T</td>
					<td class="col-badge">
						<a href="{{ url('admin/stock/'.$stock->id) }}" class="badge bg-green">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
							  <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
							</svg>
						</a>
						<form action="{{ url('admin/stock/' . $stock->id) }}" method="post">
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
	