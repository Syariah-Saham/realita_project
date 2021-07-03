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
			</tr>
		</thead>
		<tbody>
			@forelse($payments as $payment)
				<tr>
				    <th class="p-2">{{ $loop->iteration }}</th>
				    <td>{{ $payment->package->name }}</td>
				    <td>Rp{{ number_format($payment->package->current_price , 0,',','.') }}</td>
				    <td class="text-center">{{ $payment->status }}</td>
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
	