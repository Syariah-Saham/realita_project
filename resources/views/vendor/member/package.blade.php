<x-app-layout>
	<div class="py-4 px-1 md:px-4 pb-12">
        <div class="max-w-7xl md:px-4 sm:px-6 lg:px-8 pb-20">
            @php $packageMember = Auth::user()->member->package->name;  @endphp
            @if(!Str::contains($packageMember , 'Expert'))
        	<h1 class="text-2xl font-bold text-gray-600">Daftar Paket</h1>
        		<div class="flex flex-col md:flex-row gap-4 mt-4">
        			@forelse($packages as $package)
        	            @php 
                            $status = Auth::user()->member->package_id === $package->id; 
                        @endphp

                        @if(Str::contains($packageMember , 'FREE'))
                            @if(!Str::contains($package->name , 'FREE'))
                	            <div class="w-full md:w-1/3 @if(!$status) bg-white @else bg-purple-500 text-white @endif rounded-lg shadow-lg text-center p-4 py-6">
                	                <h2 class="text-3xl font-bold @if(!$status) text-teal-400 @endif">{{ $package->name }}</h2>
                	                <div class="my-3">
                	                    <h1 class="text-2xl md:text-4xl mt-2 font-bold @if(!$status)text-indigo-500 @endif">Rp{{ number_format($package->current_price , 0,',','.') }}</h1>
                	                    <s class="text-xl text-gray-300">Rp{{ number_format($package->original_price , 0,',','.') }}</s>
                	                </div>
                	                <ul class="text-left text-sm md:text-lg my-2">
                	                    <li class="my-1 flex flex-row">
                                            <img src="{{ asset('asset/dashboard/list-bullets.svg') }}" alt="illustrasi" class="inline-block h-4 md:h-6 transform translate-y-0.5 mr-2">
                                            <span>
                                                Free akses laporan keuangan maksimal {{ $package->report }} emiten / bulan
                                            </span></li>
                                        @if(Str::contains($package->name , 'FREE'))
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
                                                Free fitur komparasi emiten up to {{ $package->compare }} emiten
                                            </span>
                                        </li>
                	                </ul>
                	                <div class="flex-row mt-2">
                	                    @if(!$status && $package->current_price !== 0 )
                	                        <a href="{{ url('member/package/'.$package->id.'/xendit') }}" class="btn mx-3">Beli</a>
                	                    @elseif($status)
                	                        <span class="btn mx-3">Paket Anda</span>
                	                    @endif
                	                </div>
                	            </div>
                            @endif
                        @elseif(Str::contains($packageMember , 'Personal'))
                            @if(Str::contains($package->name , 'Expert'))
                                <div class="w-full md:w-1/3 @if(!$status) bg-white @else bg-purple-500 text-white @endif rounded-lg shadow-lg text-center p-4 py-6">
                                    <h2 class="text-3xl font-bold @if(!$status) text-teal-400 @endif">{{ $package->name }}</h2>
                                    <p class="text-sm md:text-lg">{{ $package->description }}</p>
                                    <div class="my-3">
                                        <h1 class="text-2xl md:text-4xl mt-2 font-bold @if(!$status)text-indigo-500 @endif">Rp{{ number_format($package->current_price , 0,',','.') }}</h1>
                                        <s class="text-xl text-gray-300">Rp{{ number_format($package->original_price , 0,',','.') }}</s>
                                    </div>
                                    <ul class="text-left text-xs md:text-sm my-2">
                                        <li class="my-1">Free akses laporan keuangan maksimal {{ $package->report }} emiten / bulan</li>
                                        @if(Str::contains($package->name , 'FREE'))
                                            <li class="my-1">Free screening ratio PBV dan PER Emiten</li>
                                        @elseif(Str::contains($package->name , 'Expert'))
                                            <li class="my-1">Free screening fundamental (All ratio)</li>
                                        @else
                                            <li class="my-1">Free screening fundamental (Maksimal {{ $package->screening }} ratio)</li>
                                        @endif
                                        <li class="my-1">Free fitur comparasi emiten up to {{ $package->compare }} emiten</li>
                                    </ul>
                                    <div class="flex-row mt-2">
                                        @if(!$status && $package->current_price !== 0 )
                                            <a href="{{ url('member/package/'.$package->id.'/xendit') }}" class="btn mx-3">Beli</a>
                                        @elseif($status)
                                            <span class="btn mx-3">Paket Anda</span>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        @endif

        	        @empty
        	            <h1>Tidak ada paket</h1>
        	        @endforelse
        	            
        		</div>
            @endif
        	<div class="my-6">
	        	<h1 class="text-2xl font-bold text-gray-600 mb-2">History Pembayaran</h1>
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
                                    <a href="{{ $payment->invoice_url }}" class="badge bg-gr2">
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
