<x-app-layout>


    @include('vendor.member.components.modal' , ['session' => 'sorry'])

    <div class="py-6 md:pb-12 pb-15 mb-20 md:mb-12 px-1 lg:px-8">
    	<form id="form" action="{{ url('member/compare/find') }}" class="flex flex-col items-center justify-center">
            <div id="listStocks" data-json="{{ $codes }}"></div>
            @if(!isset($_GET['keyword']))
            <img src="{{ asset('asset/landing/comparasi.svg') }}" alt="illustrasi" class="w-4/5 md:w-1/2 mb-4">
            @endif
            <h1 class="text-2xl font-bold text-gray-600">Komparasi Emiten</h1>
            <div class="w-54">
                <div class="inline-block">
                    <input id="inputKeyword" autocomplete="off" autofocus="true" name="keyword" type="text" class="form-input rounded-full px-8" placeholder="Ketik kode emiten...">
                    <input type="hidden" name="list_data" value="{{ $list_data }}">
                </div>
                <button style="background-image: linear-gradient(136deg, #2af598 0%, #009efd 100%);" class="text-white py-2 px-4 rounded relative transform translate-y-2">
                    <svg class="h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 21h7a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v11m0 5l4.879-4.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242z" />
                    </svg>
                </button>
            </div>
            <ul id="listKeyword" class="relative z-10 bg-white transform translate-y-3 rounded shadow-sm">
            </ul>
        </form>
        <script>
            const form        = document.getElementById('form');
            const input       = document.getElementById('inputKeyword');
            const listKeyword = document.getElementById('listKeyword');
            const listDataInput = document.querySelector('input[name="list_data"]');
            let codes         = document.getElementById('listStocks').getAttribute('data-json');
            codes             = JSON.parse(codes);

            let listData = JSON.parse(listDataInput.value);
            const pushData = (code) => {
                if(!listData.includes(code)) {
                    listData.push(code);
                    listDataInput.value = JSON.stringify(listData);
                }
            } 

            input.addEventListener('keyup' , () => {
                input.value = input.value.toUpperCase();

                let resultCode = codes.filter(code => code.includes(input.value));
                if(resultCode.length > 5) { resultCode.length = 5; }
                listKeyword.innerHTML = '';
                resultCode.forEach(code => {
                    let li = document.createElement('li');
                    li.className = 'px-6 py-3 text-sm md:text-md w-72 cursor-pointer hover:bg-green-100';
                    li.innerText = code;
                    listKeyword.append(li);

                    li.addEventListener('click' , () => {
                        input.value = li.innerText;
                        listKeyword.innerHTML = '';
                        pushData(li.innerText);
                        form.submit();
                    })
                })
            });

            form.addEventListener('submit' , (e) => {
                e.preventDefault();
                pushData(input.value);
                form.submit();
            })
        </script>



        

        @php
            $bg = ['bg-green-400' , 'bg-indigo-400' , 'bg-purple-400' , 'bg-orange-400' , 'bg-teal-400'];
        @endphp
        <div class="block bg-white rounded-lg mt-3 shadow-lg p-3 text-xs md:text-sm">
            <div class="my-4 border-b-2 pb-3 border-gray-200">
                <h2 class="font-bold mb-2 text-sm md:text-lg">Performance</h2>
                <div class="flex">
                    <div class="w-1/6 font-bold">
                        <p class="my-1 md:py-2">Emiten</p>
                        <p class="my-1">NPM(%)</p>
                        <p class="my-1">RoA(%) </p>
                        <p class="my-1">RoE(%) </p>
                    </div>
                    @if(isset($items))
                    @foreach($items as $stock)
                        <div class="w-1/6 text-right  mx-0.5 pr-0.5">
                            <form action="{{ url('member/report/search') }}">
                                <input type="hidden" name="keyword" value="{{ $stock['ticker'] }}">
                                <button class="text-center w-full hover:bg-opacity-80 text-white rounded  font-bold my-1 md:py-2 transition duration-200 {{ $bg[$loop->iteration-1] }} ">{{ $stock['ticker'] }}</button>
                            </form>
                            <p class="my-1">{{ $stock['npm'] }}</p>
                            <p class="my-1">{{ $stock['roa'] }}</p>
                            <p class="my-1">{{ $stock['roe'] }}</p>
                        </div>
                    @endforeach
                    @endif
                </div>
                <div style="font-size: 10px">
                    <div class="flex">
                        <span class="w-1/6">*) NPM</span><span class="w-2/6">Net Profit Margin</span>
                        <span class="w-1/6"> ROA</span><span class="w-2/6">Return on Asset</span>
                    </div>
                    <p class="flex"><span class="w-1/6 pl-3">RoE</span><span>Return on Equity</span></p>
                </div>
            </div>

            <div class="my-4 border-b-2 pb-3 border-gray-200">
                <h2 class="font-bold mb-2 text-sm md:text-lg">Valuation</h2>
                <div class="flex">
                    <div class="w-1/6 font-bold">
                        <p class="my-1 md:py-2">Emiten</p>
                        <p class="my-1">EPS</p>
                        <p class="my-1">BV(Rp)</p>
                        <p class="my-1">PER(x)</p>
                        <p class="my-1">PBV(x)</p>
                    </div>
                    @if(isset($items))
                    @foreach($items as $stock)
                        <div class="w-1/6 text-right  mx-0.5 pr-0.5">
                            <form action="{{ url('member/report/search') }}">
                                <input type="hidden" name="keyword" value="{{ $stock['ticker'] }}">
                                <button class="text-center w-full hover:bg-opacity-80 text-white rounded  font-bold my-1 md:py-2 transition duration-200 {{ $bg[$loop->iteration-1] }} ">{{ $stock['ticker'] }}</button>
                            </form>
                            <p class="my-1">{{ $stock['np'] }}</p>
                            <p class="my-1">{{ $stock['bv'] }}</p>
                            <p class="my-1">{{ $stock['per'] }}</p>
                            <p class="my-1">{{ $stock['pbv'] }}</p>
                        </div>
                    @endforeach
                    @endif
                </div>
                <div style="font-size: 10px">
                    <div class="flex">
                        <span class="w-1/6">*) EPS</span><span class="w-2/6">Laba Bersih per Saham</span>
                        <span class="w-1/6"> BV</span><span class="w-2/6">Nilai Buku</span>
                    </div>
                    <div class="flex">
                        <span class="w-1/6 pl-3">PER</span><span class="w-2/6">Price Earning Ratio</span>
                        <span class="w-1/6"> PBV</span><span class="w-2/6">Price to Book Value</span>
                    </div>
                </div>
            </div>

            <div class="my-4 border-b-2 pb-3 border-gray-200">
                <h2 class="font-bold mb-2 text-sm md:text-lg">Solvency</h2>
                <div class="flex">
                    <div class="w-1/6 font-bold">
                        <p class="my-1 md:py-2">Emiten</p>
                        <p class="my-1">CR(x)</p>
                        <p class="my-1">DER(x)</p>
                        <p class="my-1">DAR(x)</p>
                    </div>
                    @if(isset($items))
                    @foreach($items as $stock)
                        <div class="w-1/6 text-right  mx-0.5 pr-0.5">
                            <form action="{{ url('member/report/search') }}">
                                <input type="hidden" name="keyword" value="{{ $stock['ticker'] }}">
                                <button class="text-center w-full hover:bg-opacity-80 text-white rounded  font-bold my-1 md:py-2 transition duration-200 {{ $bg[$loop->iteration-1] }} ">{{ $stock['ticker'] }}</button>
                            </form>
                            <p class="my-1">{{ $stock['cr'] }}</p>
                            <p class="my-1">{{ $stock['der'] }}</p>
                            <p class="my-1">{{ $stock['dar'] }}</p>
                        </div>
                    @endforeach
                    @endif
                </div>
                <div style="font-size: 10px">
                    <div class="flex">
                        <span class="w-1/6">*) CR</span><span class="w-2/6">Current Ratio</span>
                        <span class="w-1/6"> DER</span><span class="w-2/6">Debt to Equity Ratio</span>
                    </div>
                    <p class="flex"><span class="w-1/6 pl-3"> DAR</span><span>Debt to Asset Ratio</span></p>
                </div>
            </div>

            <div class="my-4 border-b-2 pb-3 border-gray-200">
                <h2 class="font-bold mb-2 text-sm md:text-lg">Dividend</h2>
                <div class="flex">
                    <div class="w-1/6 font-bold">
                        <p class="my-1 md:py-2">Emiten</p>
                        <p class="my-1">DS</p>
                        <p class="my-1">DY</p>
                        <p class="my-1">DP</p>
                    </div>
                    @if(isset($items))
                    @foreach($items as $stock)
                        <div class="w-1/6 text-right  mx-0.5 pr-0.5">
                            <form action="{{ url('member/report/search') }}">
                                <input type="hidden" name="keyword" value="{{ $stock['ticker'] }}">
                                <button class="text-center w-full hover:bg-opacity-80 text-white rounded  font-bold my-1 md:py-2 transition duration-200 {{ $bg[$loop->iteration-1] }} ">{{ $stock['ticker'] }}</button>
                            </form>
                            <p class="my-1">{{ $stock['dn'] }}</p>
                            <p class="my-1">{{ $stock['dy'] }}</p>
                            <p class="my-1">{{ $stock['dp'] }}</p>
                        </div>
                    @endforeach
                    @endif
                </div>
                <div style="font-size: 10px">
                    <div class="flex">
                        <span class="w-1/6">*) DS</span><span class="w-2/6">Dividend Saham</span>
                        <span class="w-1/6"> DY</span><span class="w-2/6">Dividend Yield</span>
                    </div>
                    <p class="flex"><span class="w-1/6 pl-3"> DP</span><span>Dividend Payout</span></p>
                </div>
            </div>

            <div class="my-4">
                <h2 class="font-bold mb-2 text-sm">Syariah</h2>
                <div class="flex">
                    <div class="w-1/6 font-bold">
                        <p class="my-1 md:py-2">Emiten</p>
                        <p class="my-1">Ket.</p>
                    </div>
                    @if(isset($items))
                    @foreach($items as $stock)
                        <div class="w-1/6 text-right  mx-0.5 pr-0.5">
                            <form action="{{ url('member/report/search') }}">
                                <input type="hidden" name="keyword" value="{{ $stock['ticker'] }}">
                                <button class="text-center w-full hover:bg-opacity-80 text-white rounded  font-bold my-1 md:py-2 {{ $bg[$loop->iteration-1] }} ">{{ $stock['ticker'] }}</button>
                            </form>
                            <p class="my-1 flex justify-center">
                                @if($stock['sharia']==='true')
                                    <svg class="h-6 w-6 md:h-10 md:w-10 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                @else
                                    <svg class="h-6 w-6 md:h-10 md:w-10 text-red-500"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                @endif
                            </p>
                        </div>
                    @endforeach
                    @endif
                </div>
                <div class="flex">
                    <div class="w-1/6">-</div>

                    @if(isset($items))
                    @foreach($items as $stock)
                        <div class="w-1/6 text-right  mx-0.5 pr-0.5">
                            <div class="text-center mt-2 border-t-2 border-gray-100 pt-1">
                                <button data-code="{{ $stock['ticker'] }}" class="bg-red rounded mx-auto p-1 text-white btn-delete">
                                    <svg class="h-4 w-4 md:h-6 md:w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                      <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    @endforeach
                    @endif
                </div>
            </div>

        </div>
    </div>



    <script>
        const btnDelete = document.querySelectorAll('.btn-delete');
        btnDelete.forEach(btn => {
            btn.addEventListener('click' , () => {
                let codeIssuers = btn.getAttribute('data-code');
                listData = listData.filter(code => code !== codeIssuers);
                listDataInput.value = JSON.stringify(listData);
                form.submit();
            })
        })
    </script>



</x-app-layout>



