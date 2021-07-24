<x-app-layout>

    @include('vendor.member.components.modal' , ['session' => 'sorry'])


    <div class="py-12">
        <div class="max-w-7xl px-4 sm:px-6 lg:px-8 pb-10">

            <div class="bg-white rounded-lg shadow-lg p-4 mb-5 w-full md:w-1/2">
                <h3 class="font-semibold text-base lg:text-lg">Hai, {{ Auth::user()->name }}!</h3>
                <div class="text-sm md:text-base mb-2">
                    @php
                        $package_name = Auth::user()->member->package->name;
                        $finish_date = Auth::user()->member->finish_date;
                    @endphp
                    <p>Saat ini kamu sedang berlangganan paket: <span class="text-teal-400 font-bold">{{ Auth::user()->member->package->name }}</span></p>

                    <p>Berlaku hingga : 
                        @if($package_name === 'Expert' && $finish_date !== 'unlimited')
                            <span class="text-teal-400 text-italic">Selamanya!</span>
                        @elseif($package_name === 'FREE!' || $package_name === 'Expert')
                            <span class="text-teal-400 text-italic">Selamanya!</span>
                        @else
                            <span class="text-teal-400 text-italic">{{ $finish_date }}</span>
                        @endif
                    </p>
                </div>
                <a href="{{ url('/member/package') }}" class="btn">Lihat Paket</a>
            </div>
            
        	<h1 class="text-2xl font-bold text-gray-600">Fitur Utama</h1>
        	<div class="flex flex-col md:flex-row gap-8 mt-4 mb-8">
                <a href="{{ url('member/report') }}" class="w-full transition duration-300 transform hover:translate-y-1 ease-in-out md:w-1/3">
                    <div style="background-image: linear-gradient(136deg , #de11fd 0%, #35e49c 100%);" class="bg-gr shadow-md rounded-3xl flex flex-row items-center py-3 px-8  text-white">
                        <svg class="h-20 mr-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <h3 class="font-bold text-2xl">Laporan Keuangan</h3>
                    </div>
                </a>
                <a href="{{ url('member/screening') }}" class="w-full transition duration-300 transform hover:translate-y-1 ease-in-out md:w-1/3">
                    <div style="background-image: linear-gradient(136deg, #2af598 0%, #009efd 100%);" class="bg-gr shadow-md rounded-3xl flex flex-row items-center py-3 px-8  text-white">
                        <svg class="h-20 mr-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                        </svg>
                        <h3 class="font-bold text-2xl">Screening Fundamental</h3>
                    </div>
                </a>
        		<a href="{{ url('member/compare') }}" class="w-full transition duration-300 transform hover:translate-y-1 ease-in-out md:w-1/3">
        			<div style="background-image: linear-gradient(136deg, #009efd 0%, #f900fd 100%);" class="bg-gr shadow-md rounded-3xl flex flex-row items-center py-3 px-8  text-white">
        				<svg class="h-20 mr-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        				  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
        				</svg>
        				<h3 class="font-bold text-2xl">Komparasi Emiten</h3>
        			</div>
        		</a>
        	</div>

            <h1 class="text-2xl font-bold text-gray-600 mt-5">Watchlist Saham</h1>
            <form action="{{ url('member/dashboard') }}" method="post" class="bg-white rounded-lg shadow-lg p-4 my-3 w-full md:w-1/2 lg:w-1/3 flex flex-row justify-center">
                @csrf
                <div >
                    <input type="text" id="watchlist" class="form-input @error('code') is-invalid @enderror" name="code" placeholder="Ketik Kode Emiten" value="{{ old('code') }}">
                    @include('vendor.components.error' , ['name' => 'code'])
                </div>
                <button class="text-white px-2 my-2 rounded bg-gr ml-2">
                    <svg class="h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 21h7a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v11m0 5l4.879-4.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242z" />
                    </svg>
                </button>
            </form>
            @forelse($wathcs->chunk(5) as $chunk)
                <div class="flex flex-row gap-3 mt-4">
                    @foreach($chunk as $data)
                        <div class="flex flex-row items-center gap-2 bg-white rounded-md px-4 shadow-md hover:bg-green-100 transition duration-200">
                            <a href="{{ url('member/report/search?keyword='.$data->stock->code_issuers) }}">{{ $data->stock->code_issuers }}</a>
                            <form action="{{ url('member/dashboard/' . $data->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="text-white px-2 my-2 rounded bg-gr2 ml-2">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 21h7a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v11m0 5l4.879-4.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242z" />
                                    </svg>
                                    <svg class="h-5 my-1"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                      <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            @empty
                <h1 class="font-semibold text-red-400 text-center my-6 w-full md:w-1/2 lg:w-1/3">Belum ada Watchlist!</h1>
            @endforelse
                
        </div>
    </div>


    <script>
        const input = document.getElementById('watchlist');
        input.addEventListener('keyup' , () => {
            input.value = input.value.toUpperCase();
        })
    </script>


</x-app-layout>



