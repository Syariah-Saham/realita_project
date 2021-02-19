@extends('layouts.admin')
@section('title'  , 'Pembayaran')
@section('body')

<div class="px-1 md:px-6 lg:px-8 my-4 mb-8">
	<h1 class="font-bold text-xl lg:text-3xl">Daftar Pembayaran</h1>
	<table class="w-full mt-4 text-xs md:text-sm lg:text-lg bg-white rounded-xl overflow-hidden shadow-lg">
		<thead class="bg-gr text-white">
			<tr>
				<th class="p-2">#</th>
				<th>Paket</th>
				<th>Harga</th>
				<th>Status</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			@forelse($payments as $payment)
				<tr>
				    <th class="p-2">{{ $loop->iteration }}</th>
				    <td>{{ $payment->package->name }}</td>
				    <td>Rp{{ number_format($payment->package->current_price , 0,',','.') }}</td>
				    <td class="text-center">{{ $payment->status }}</td>
				    <td class="col-badge">
				        <a href="{{ url('admin/payment/'.$payment->id) }}" class="badge bg-green">
				            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
				              <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
				            </svg>
				        </a>
				    </td>
				</tr>
			@empty
				<tr>
					<td colspan="5" class="text-center font-semibold text-lg my-2">Tidak ada data</td>
				</tr>
			@endforelse
				
		</tbody>
	</table>
</div>

@endsection
	