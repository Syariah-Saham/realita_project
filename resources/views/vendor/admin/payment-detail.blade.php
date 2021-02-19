@extends('layouts.admin')
@section('title'  , 'Detail Pembayaran')
@section('body')

<div class="px-1 md:px-6 lg:px-8 my-4 mb-8">
	<h1  class="font-bold text-xl lg:text-3xl">Detail Pembayaran</h1>
	<a href="{{ url('admin/payment') }}" class="btn">Kembali</a>
	<div class="flex flex-col md:flex-row my-2 gap-4 text-sm lg:text-lg">
		<div class="w-full md:w-1/3">
			<div class="bg-white rounded-lg shadow-lg p-4">
				<h3 class="font-bold text-lg lg:text-xl">Data Member</h3>
				@php $user = $payment->member->user; @endphp
				<div class="flex">
					<p class="w-1/3">Nama</p>
					<p class="w-2/3 text-gray-400">{{ $user->name }}</p>
				</div>
				<div class="flex">
					<p class="w-1/3">Email</p>
					<p class="w-2/3 text-gray-400">{{ $user->email }}</p>
				</div>
				<div class="flex">
					<p class="w-1/3">Member Sejak</p>
					<p class="w-2/3 text-gray-400">{{ $user->created_at->diffForHumans() }}</p>
				</div>
			</div>
		</div>
		<div class="w-full md:w-1/3">
			<div class="bg-white rounded-lg shadow-lg p-4">
				<h3 class="font-bold text-lg lg:text-xl">Paket Dibeli</h3>
				@php $package = $payment->package @endphp
				<div class="flex">
					<p class="w-2/5">Nama</p>
					<p class="w-3/5 text-gray-400">{{ $package->name }}</p>
				</div>
				<div class="flex">
					<p class="w-2/5">Harga Asli</p>
					<p class="w-3/5 text-gray-400">	Rp{{ number_format($package->original_price , 0,',','.') }}</p>
				</div>
				<div class="flex">
					<p class="w-2/5">Harga Sekarang</p>
					<p class="w-3/5 text-gray-400">Rp{{ number_format($package->current_price , 0,',','.') }}</p>
				</div>
				<div class="flex">
					<p class="w-2/5">Lap.Keuangan</p>
					<p class="w-3/5 text-gray-400">{{ $package->report }}</p>
				</div>
				<div class="flex">
					<p class="w-2/5">Screening</p>
					<p class="w-3/5 text-gray-400">{{ $package->screening }}</p>
				</div>
				<div class="flex">
					<p class="w-2/5">Comparasi</p>
					<p class="w-3/5 text-gray-400">{{ $package->compare }}</p>
				</div>
			</div>
		</div>
		<div class="w-full md:w-1/3">
			<div class="bg-white rounded-lg shadow-lg p-4">
				<h3 class="font-bold text-lg lg:text-xl"3>Pembayaran</h3>
				@php 
					$bank = $payment->bank;
					$status = [
						'pending'   => 'text-orange-400',
						'confirmed' => 'text-green-400',
						'failed'    => 'text-red-400',
					];
				@endphp
				<div class="flex">
					<p class="w-2/5">Bank</p>
					<p class="w-3/5 text-gray-400">{{ $bank->bank }}</p>
				</div>
				<div class="flex">
					<p class="w-2/5">No.Rekening</p>
					<p class="w-3/5 text-gray-400">{{ $bank->card_number }}</p>
				</div>
				<div class="flex">
					<p class="w-2/5">Nama</p>
					<p class="w-3/5 text-gray-400">{{ $bank->name }}</p>
				</div>
				<div class="flex">
					<p class="w-2/5">Status</p>
					<p class="w-3/5 text-gray-400 {{ $status[$payment->status] }}">{{ $payment->status }}</p>
				</div>
				<div class="flex">
					<p class="w-2/5">Waktu</p>
					<p class="w-3/5 text-gray-400">{{ $payment->created_at }}</p>
				</div>
				<div class="flex items-center">
					<p class="w-2/5">Bukti</p>
					<p class="w-3/5"><a href="{{ url('admin/payment/'.$payment->id.'/proof') }}" class="btn">Unduh Bukti</a></p>
				</div>
				<div class="flex justify-evenly">
					@if($payment->status === 'pending')
						<form action="{{ url('admin/payment/'.$payment->id.'/status') }}" method="post">
							@csrf
							@method('put')
							<input type="hidden" name="status" value="failed">
							<button class="px-6 shadow-md my-1 py-1 rounded-full text-white uppercase bg-gr2">Batalkan</button>
						</form>
						<form action="{{ url('admin/payment/'.$payment->id.'/status') }}" method="post">
							@csrf
							@method('put')
							<input type="hidden" name="status" value="confirmed">
							<button class="btn">Konfirmasi</button>
						</form>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
	