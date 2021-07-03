	<div id="price" class="price px-3 md:px-10 py-20">
		<div class="text-center">
			<h1 class="title-section text-xl md:text-3xl font-black">Harga <span>realita</span></h1>
		</div>
		<div class="flex flex-col md:flex-row gap-2 my-8 w-full md:w-5/6 justify-center mx-auto">
			@foreach($packages as $package)
	            <div class="w-full md:w-1/3 bg-white rounded-xl shadow-lg text-center p-4 py-6" data-aos="fade-up">
	                <h2 class="text-3xl font-bold  text-teal-400">{{ $package->name }}</h2>
	                <h4 class="text-sm mb-3 -mt-1">{{ $package->description }}</h4>
	                <div class="my-3 -mt-2">
	                	<div class="flex flex-row justify-center items-center gap-1">
		                    <h1 class="text-2xl md:text-4xl mt-2 font-bold text-indigo-500">Rp{{ number_format($package->current_price , 0,',','.') }}</h1>
	                	</div>
	                    <s class="text-xl text-gray-300">Rp{{ number_format($package->original_price , 0,',','.') }}</s>
	                    @if($package->name === 'FREE!' || $package->name === 'Expert')
		                    <p class="text-gray-300">( akses selamanya )</p>
	                    @else
		                    <p class="text-gray-300">( dibayar perbulan)</p>
	                    @endif
	                </div>
	                <ul class="text-left text-sm md:text-base my-2">
	                    <li class="my-1 flex flex-row">
                        	<img src="{{ asset('asset/landing/bullet-icon.svg') }}" class="inline-block h-4 md:h-6 transform translate-y-0.5 mr-2" alt="Paket Realita Syariah Saham Indonesia">
                            <span>
                                Akses Mudah Laporan Keuangan Emiten 5 tahun (2016-2020)
                            </span>
                        </li>
                        <li class="my-1 flex flex-row">
                        	<img src="{{ asset('asset/landing/bullet-icon.svg') }}" class="inline-block h-4 md:h-6 transform translate-y-0.5 mr-2" alt="Paket Realita Syariah Saham Indonesia">
                            <span>
		                        @if(Str::contains($package->name , 'FREE') || Str::contains($package->name , 'Basic'))
	                                Free Screening Ratio PBV dan PER Emiten
		                        @elseif(Str::contains($package->name , 'Expert'))
                                    Free Screening All Ratio
		                        @else
                                    Free Screening Ratio (Maksimal {{ $package->screening }} Ratio)
                                @endif
                            </span>
                        </li>
                        <li class="my-1 flex flex-row">
                        	<img src="{{ asset('asset/landing/bullet-icon.svg') }}" class="inline-block h-4 md:h-6 transform translate-y-0.5 mr-2" alt="Paket Realita Syariah Saham Indonesia">
                            <span>
                            	@if(Str::contains($package->name , 'FREE') || Str::contains($package->name , 'Basic'))
                            		Fitur Head to Head Emiten
                                @else
	                                Fitur Komparasi Hingga {{ $package->compare }} Emiten
                                @endif
                            </span>
                        </li>
                        <li class="my-1 flex flex-row">
                        	<img src="{{ asset('asset/landing/bullet-icon.svg') }}" class="inline-block h-4 md:h-6 transform translate-y-0.5 mr-2" alt="Paket Realita Syariah Saham Indonesia">
                            <span>
                            @if($package->name === 'Expert')
                                Watchlist Unlimited
                            @else
                                Watchlist Maksimal {{ $package->watchlist }} Emiten
                            @endif
                            </span>
                        </li>
	                </ul>
	                <div class="flex-row mt-5">
	                	<a href="{{ url('member/package/'.$package->id.'/xendit') }}" class="btn text-white bg-green-400 rounded-full py-1 px-4 uppercase font-bold mx-3">Beli</a>
	                </div>
	            </div>
			@endforeach
		</div>
	</div>