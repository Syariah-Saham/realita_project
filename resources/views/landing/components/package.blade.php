	<div id="price" class="price px-3 md:px-10 py-20">
		<div class="text-center">
			<h1 class="title-section text-xl md:text-3xl font-black">Harga <span>realita</span></h1>
		</div>
		<div class="flex flex-col md:flex-row gap-6 my-8 w-full md:w-4/5 justify-center mx-auto">
			@foreach($packages as $package)
	            <div class="w-full md:w-1/3 bg-white rounded-xl shadow-lg text-center p-4 py-6" data-aos="fade-up">
	                <h2 class="text-3xl font-bold  text-teal-400">{{ $package->name }}</h2>
	                <h4 class="text-sm mb-3 -mt-1">{{ $package->description }}</h4>
	                <div class="my-3 -mt-2">
                		@if($package->name === 'FREE!')
		                	<div class="flex flex-row justify-center items-center gap-1">
			                    <h1 class="text-2xl md:text-4xl mt-2 font-bold text-indigo-500">Rp{{ number_format($package->current_price , 0,',','.') }}</h1>
		                	</div>
		                    <s class="text-xl text-gray-300">Rp{{ number_format($package->original_price , 0,',','.') }}</s>
	                	@elseif($package->name === 'Paket Personal')
	                		<div class="flex flex-row justify-center items-center gap-1">
			                    <h1 class="text-2xl md:text-4xl mt-2 font-bold text-indigo-500">Rp2.500</h1>
		                		<span class="mt-3">/hari</span>
		                	</div>
		                    <s class="text-xl text-gray-300">Rp5.000</s>
	                	@elseif($package->name === 'Paket Expert')
	                		<div class="flex flex-row justify-center items-center gap-1">
			                    <h1 class="text-2xl md:text-4xl mt-2 font-bold text-indigo-500">Rp4.100</h1>
		                		<span class="mt-3">/hari</span>
		                	</div>
		                    <s class="text-xl text-gray-300">Rp10.000</s>
	                	@endif
	                    @if($package->name === 'FREE!')
		                    <p class="text-gray-300">( akses selamanya )</p>
	                    @else
		                    <p class="text-gray-300">( dibayar pertahun)</p>
	                    @endif
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
                                Free fitur komparasi emiten up to {{ $package->compare }} emiten
                            </span>
                        </li>
	                </ul>
	                <div class="flex-row mt-2">
	                	<a href="{{ url('member/package/'.$package->id.'/xendit') }}" class="btn text-white bg-green-400 rounded-full py-1 px-4 uppercase font-bold mx-3">Beli</a>
	                </div>
	            </div>
			@endforeach
		</div>
	</div>