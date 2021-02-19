<x-app-layout>
	<div class="py-4 px-1 md:px-4 pb-12">
        <div class="max-w-7xl md:px-4 sm:px-6 lg:px-8 pb-20">
        	<h1 class="text-2xl font-bold text-gray-600">Daftar Paket</h1>
        		<div class="flex flex-col md:flex-row gap-4 mt-4">
        			@forelse($packages as $package)
        	            @php $status = Auth::user()->member->package_id === $package->id; @endphp
        	            <div class="w-full md:w-1/3 @if(!$status) bg-white @else bg-purple-500 text-white @endif rounded-lg shadow-lg text-center p-4 py-6">
        	                <h2 class="text-3xl font-bold @if(!$status) text-teal-400 @endif">{{ $package->name }}</h2>
        	                <p class="text-sm md:text-lg">{{ $package->description }}</p>
        	                <div class="my-3">
        	                    <h1 class="text-2xl md:text-4xl mt-2 font-bold @if(!$status)text-indigo-500 @endif">Rp{{ number_format($package->current_price , 0,',','.') }}</h1>
        	                    <s class="text-xl text-gray-300">Rp{{ number_format($package->original_price , 0,',','.') }}</s>
        	                </div>
        	                <ul class="text-left text-sm md:text-lg my-2">
        	                    <li class="my-1">{{ $package->report }} periode laporan keuangan</li>
        	                    <li class="my-1">{{ $package->screening }} screening fundamental</li>
        	                    <li class="my-1">{{ $package->compare }} comparasi emiten</li>
        	                </ul>
        	                <div class="flex-row mt-2">
        	                    @if(!$status && $package->current_price !== 0 )
        	                        <a href="{{ url('member/package/'.$package->id.'/buy') }}" class="btn mx-3">Beli</a>
        	                    @elseif($status)
        	                        <span class="btn mx-3">Paket Anda</span>
        	                    @endif
        	                </div>
        	            </div>
        	        @empty
        	            <h1>Tidak ada paket</h1>
        	        @endforelse
        	            
        		</div>

        	<div class="my-6">
	        	<h1 class="text-2xl font-bold text-gray-600 mb-2">Daftar Pembayaran</h1>
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
                                    <a href="{{ url('member/package/'.$payment->id . '/download') }}" class="badge bg-gr2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-2 font-semibold text-lg">Tidak ada data</td>
                            </tr>
                        @endforelse
	        		</tbody>
	        	</table>
        	</div>
        </div>	
	</div>
</x-app-layout>
