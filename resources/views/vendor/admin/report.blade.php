@extends('layouts.admin')
@section('title'  , 'Laporan Keuangan')
@section('body')

@php
	if(!isset($_GET['page'])) {
		$page = 0;
	} else {
		$page = $_GET['page']-1;
	}
@endphp

<div class="container pb-20">
	<h1 class="text-2xl font-bold text-gray-600">Laporan Keuangan</h1>

	<a href="{{ url('/admin/report/create') }}" class="btn">Tambah Laporan Keuangan</a>
	<table class="rounded shadow-lg w-full mt-4 overflow-hidden">
		<thead class="bg-green-400 text-white">
			<tr>
				<th class="p-2">#</th>
				<th>Kode Emiten</th>
				<th>Nama Emiten</th>
				<th>Periode</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			@forelse($reports as $report)
				<tr>
					<td class="p-2 text-center">{{ $page * 50 + $loop->iteration }}</td>
					<td>{{ $report->stock->code_issuers }}</td>
					<td>{{ $report->stock->name }}</td>
					<td>{{ $report->periode->year }}</td>
					<td class="col-badge">
						<a href="" class="badge bg-green">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
							  <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
							</svg>
						</a>
						<form action="" method="post">
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
					<td colspan="5" class="text-center font-bold text-lg">Tidak ada data</td>
				</tr>
			@endforelse
		</tbody>
	</table>




	<div class="my-6">
			{{ $reports->links() }}
	</div>
	
</div>

@endsection
	