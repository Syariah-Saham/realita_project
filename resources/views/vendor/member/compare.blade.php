<x-app-layout>

    <div class="py-6 pb-12 mb-12 px-3 lg:px-8">
    	<form id="form" action="{{ url('member/compare/find') }}" class="flex flex-col items-center justify-center">
            <div id="listStocks" data-json="{{ $codes }}"></div>
            <img src="{{ asset('asset/landing/comparasi.svg') }}" alt="illustrasi" class="w-1/2 mb-4">
            <h1 class="text-2xl font-bold text-gray-600">Comparison Emiten</h1>
            <div class="w-54">
                <div class="inline-block">
                    <input id="inputKeyword" autocomplete="off" autofocus="true" name="keyword" type="text" class="form-input rounded-full px-8" placeholder="Ketik kode emiten...">
                    <input type="hidden" name="list_data" value="{{ $list_data }}">
                </div>
                <button class="bg-green-400 text-white py-2 px-4 rounded ">Cari</button>
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
                    li.className = 'px-6 py-3  w-72 cursor-pointer hover:bg-green-100';
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



        <div class="result-compare grid grid-cols-2 md:grid-cols-7 gap-2 mt-6">
        	<div class="col-span-2 rounded-lg shadow-md bg-white overflow-hidden">
        		<h1 class="font-bold text-3xl text-center uppercase py-2 bg-blue-400 text-white m-2 rounded mb-4">Indikator</h1>
        		<div class="list-value">
        			<p class="p-2">Current Ratio</p>
        			<p class="p-2 bg-gray-200">Dividen Saham (Rp)</p>
        			<p class="p-2">Dividen Yield</p>
        			<p class="p-2 bg-gray-200">Dividen Payout</p>
        			<p class="p-2">Laba bersih / saham</p>
        			<p class="p-2 bg-gray-200">Nilai Buku</p>
        			<p class="p-2">Debt to Asset Ratio (x)</p>
        			<p class="p-2 bg-gray-200">Debt to Equity Ratio (x)</p>
        			<p class="p-2">Return of Assets (%)</p>
        			<p class="p-2 bg-gray-200">Return of Equity (%)</p>
                    <p class="p-2">Net Profit Margin (%)</p>
                    <p class="p-2 bg-gray-200">Price to Earning Ratio (x)</p>
                    <p class="p-2">Price to Book Value (x)</p>
        		</div>
        	</div>
            @if(isset($items))
                @php
                    $bg = ['bg-green-400' , 'bg-indigo-400' , 'bg-purple-400' , 'bg-orange-400' , 'bg-teal-400'];
                @endphp
                @foreach($items as $stock)
                	<div class="rounded-lg shadow-md bg-white">
                		<h1 class="font-bold text-3xl text-center uppercase py-2 {{ $bg[$loop->iteration] }} text-white m-2 rounded mb-4">{{ $stock['ticker'] }}</h1>
                		<div class="list-value text-center">
                			<p class="p-2">{{ $stock['cr'] }}</p>
                			<p class="p-2 bg-gray-200">{{ $stock['dn'] }}</p>
                			<p class="p-2">{{ $stock['dy'] }}</p>
                			<p class="p-2 bg-gray-200">{{ $stock['dp'] }}</p>
                			<p class="p-2">{{ $stock['np'] }}</p>
                			<p class="p-2 bg-gray-200">{{ $stock['bv'] }}</p>
                			<p class="p-2">{{ $stock['dar'] }}</p>
                			<p class="p-2 bg-gray-200">{{ $stock['der'] }}</p>
                			<p class="p-2">{{ $stock['roa'] }}</p>
                			<p class="p-2 bg-gray-200">{{ $stock['roe'] }}</p>
                            <p class="p-2">{{ $stock['npm'] }}</p>
                            <p class="p-2 bg-gray-200">{{ $stock['per'] }}</p>
                            <p class="p-2">{{ $stock['pbv'] }}</p>
                		</div>
                		<div class="text-center">
                            <form action="{{ url('member/report/search') }}">
                                @csrf
                                <input type="hidden" name="keyword" value="{{ $stock['ticker'] }}">
                                <button class="font-bold text-md text-center uppercase py-1 px-4 bg-green text-white rounded inline-block">Laporan</button>
                            </form>
        	        		<button class="font-bold text-md text-center uppercase py-1 px-4 bg-red text-white my-2 rounded inline-block btn-delete">HAPUS</button>
                		</div>
                	</div>
                @endforeach
            @endif
        </div>
    </div>



    <script>
        const btnDelete = document.querySelectorAll('.btn-delete');
        btnDelete.forEach(btn => {
            btn.addEventListener('click' , () => {
                let codeIssuers = btn.parentElement.parentElement.firstElementChild.innerHTML;
                listData = listData.filter(code => code !== codeIssuers);
                listDataInput.value = JSON.stringify(listData);
                form.submit();
            })
        })
    </script>



</x-app-layout>



