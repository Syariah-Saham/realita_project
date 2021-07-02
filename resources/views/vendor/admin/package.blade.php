@extends('layouts.admin')
@section('title'  , 'Paket')
@section('body')

@include('vendor.components.modal-delete')

<div class="px-1 md:px-6 lg:px-8 my-4 mb-8">
	<h1 class="font-bold text-3xl">Paket</h1>
	<a href="{{ url('/admin/package/create') }}" class="btn">Buat Paket</a>
	<div class="mt-4 flex flex-col md:flex-row gap-4">
		@forelse($packages as $package)
			<div class="w-full md:w-1/3 bg-white rounded-lg shadow-lg text-center p-4">
				<h2 class="text-3xl font-bold text-teal-400">{{ $package->name }}</h2>
				<div class="my-3">
					<h1 class="text-2xl md:text-4xl mt-2 font-bold text-indigo-500">Rp{{ number_format($package->current_price , 0,',','.') }}</h1>
					<s class="text-xl text-gray-300">Rp{{ number_format($package->original_price , 0,',','.') }}</s>
				</div>
                <ul class="text-left text-sm md:text-lg my-2">
                    <li class="my-1 flex flex-row">
                        <img src="{{ asset('asset/dashboard/list-bullets.svg') }}" alt="illustrasi" class="inline-block h-4 md:h-6 transform translate-y-0.5 mr-2">
                        <span>
                            Free akses laporan keuangan maksimal {{ $package->report }} emiten / bulan
                        </span></li>
                    @if(Str::contains($package->name , 'Gratis'))
                        <li class="my-1 flex flex-row">
                            <img src="{{ asset('asset/dashboard/list-bullets.svg') }}" alt="illustrasi" class="inline-block h-4 md:h-6 transform translate-y-0.5 mr-2">
                            <span>
                                Free screening ratio PBV dan PER Emiten
                            </span>
                        </li>
                    @elseif(Str::contains($package->name , 'Expert'))
                        <li class="my-1 flex flex-row">
                            <img src="{{ asset('asset/dashboard/list-bullets.svg') }}" alt="illustrasi" class="inline-block h-4 md:h-6 transform translate-y-0.5 mr-2">
                            <span>
                                Free screening fundamental (All ratio)
                            </span>
                        </li>
                    @else
                        <li class="my-1 flex flex-row">
                            <img src="{{ asset('asset/dashboard/list-bullets.svg') }}" alt="illustrasi" class="inline-block h-4 md:h-6 transform translate-y-0.5 mr-2">
                            <span>
                                Free screening fundamental (Maksimal {{ $package->screening }} ratio)
                            </span>
                        </li>
                    @endif
                    <li class="my-1 flex flex-row">
                        <img src="{{ asset('asset/dashboard/list-bullets.svg') }}" alt="illustrasi" class="inline-block h-4 md:h-6 transform translate-y-0.5 mr-2">
                        <span>
                            Free fitur comparasi emiten up to {{ $package->compare }} emiten
                        </span>
                    </li>
                </ul>
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

</div>


@endsection
	