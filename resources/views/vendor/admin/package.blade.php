@extends('layouts.admin')
@section('title'  , 'Paket')
@section('body')

@include('vendor.components.modal-delete')

<div class="px-1 md:px-6 lg:px-8 my-4 mb-8">
	<h1 class="font-bold text-3xl">Paket</h1>
	<a href="{{ url('/admin/package/create') }}" class="btn">Buat Paket</a>
	<div class="mt-4 flex flex-col md:flex-row gap-4">
		@forelse($packages as $package)
			<div class="w-full md:w-1/3 bg-white rounded-lg shadow-lg text-center p-4 flex flex-col justify-between">
				<div>
					<h2 class="text-3xl font-bold text-teal-400">{{ $package->name }}</h2>
	                <h4 class="text-sm mb-3">{{ $package->description }}</h4>
					<div class="my-3">
						<h1 class="text-2xl md:text-4xl mt-2 font-bold text-indigo-500">Rp{{ number_format($package->current_price , 0,',','.') }}</h1>
						<s class="text-xl text-gray-300">Rp{{ number_format($package->original_price , 0,',','.') }}</s>
	                    @if($package->name === 'FREE!' || $package->name === 'Expert')
		                    <p class="text-gray-300">( akses selamanya )</p>
	                    @else
		                    <p class="text-gray-300">( dibayar perbulan)</p>
	                    @endif
					</div>
	                <ul class="text-left text-sm my-2">
	                    <li class="my-1 flex flex-row">
	                        	<img src="{{ asset('asset/landing/bullet-icon.svg') }}" class="inline-block h-4 md:h-6 transform mr-2" alt="Paket Realita Syariah Saham Indonesia">
	                            <span>
	                                Akses Mudah Laporan Keuangan Emiten 5 tahun (2016-2020)
	                            </span>
	                        </li>
	                        <li class="my-1 flex flex-row">
	                        	<img src="{{ asset('asset/landing/bullet-icon.svg') }}" class="inline-block h-4 md:h-6 transform mr-2" alt="Paket Realita Syariah Saham Indonesia">
	                            <span>
			                        @if(Str::contains($package->name , 'FREE') )
		                                Free Screening Ratio PBV dan PER Emiten
			                        @elseif(Str::contains($package->name , 'Expert'))
	                                    Free Screening All Ratio
			                        @else
	                                    Free Screening Fundamental (Maksimal {{ $package->screening }} Ratio)
	                                @endif
	                            </span>
	                        </li>
	                        <li class="my-1 flex flex-row">
	                        	<img src="{{ asset('asset/landing/bullet-icon.svg') }}" class="inline-block h-4 md:h-6 transform mr-2" alt="Paket Realita Syariah Saham Indonesia">
	                            <span>
	                            	@if(Str::contains($package->name , 'FREE') || Str::contains($package->name , 'Basic'))
	                            		Fitur Head to Head Emiten
	                                @else
		                                Fitur Komparasi Hingga {{ $package->compare }} Emiten
	                                @endif
	                            </span>
	                        </li>
	                        <li class="my-1 flex flex-row">
	                        	<img src="{{ asset('asset/landing/bullet-icon.svg') }}" class="inline-block h-4 md:h-6 transform mr-2" alt="Paket Realita Syariah Saham Indonesia">
	                            <span>
	                            @if($package->name === 'Expert')
	                                Watchlist Unlimited
	                            @else
	                                Watchlist Maksimal {{ $package->watchlist }} Emiten
	                            @endif
	                            </span>
	                        </li>
	                </ul>
				</div>
				<div class="flex-row mt-2">
					<button data-action="{{ url('admin/package/'.$package->id) }}" class="text-white uppercase rounded-full py-1 px-4 mx-3 bg-red-400 badge-delete">Hapus</button>
					<a href="{{ url('admin/package/'.$package->id.'/edit') }}" class="btn mx-3">Edit</a>
				</div>
			</div>	
		@empty
			<h1>Belum ada paket</h1>
		@endforelse
	</div>
	


	<div class="payments mt-8">
		<h1 class="font-bold text-3xl">Pembayaran Terbaru</h1>
		<a href="{{ url('admin/payment/') }}" class="btn">Lihat Semua Pembayaran</a>
		<table class="w-full text-xs md:text-sm lg:text-lg bg-white rounded-xl overflow-hidden shadow-lg">
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

</div>


@endsection
	