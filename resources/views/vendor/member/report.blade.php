<x-app-layout>

    <div class="py-6 pb-12 px-3 lg:px-8">
        <form id="form" action="{{ url('member/report/search') }}" class="flex flex-col items-center justify-center">
            <div id="listStocks" data-json="{{ $codes }}"></div>
            <img src="{{ asset('asset/landing/laporan_keuangan.svg') }}" alt="illustrasi" class="w-1/3">
            <h1 class="text-2xl font-bold text-gray-600">Cari Laporan Keuangan</h1>
            <div class="w-54">
                <div class="inline-block">
                    <input autocomplete="off" autofocus="true" type="text" id="inputKeyword" name="keyword" class="form-input rounded-full px-8" placeholder="Ketik kode emiten...">
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
            const form = document.getElementById('form');
            const input       = document.getElementById('inputKeyword');
            const listKeyword = document.getElementById('listKeyword');
            let codes         = document.getElementById('listStocks').getAttribute('data-json');
            codes             = JSON.parse(codes);

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
                        form.submit();
                    })
                })
            });
        </script>



        @if(isset($data))
        <div class="result-report border-t-2 border-gray-300 my-6 pt-6">
            <h1 class="text-center font-bold text-center text-2xl bg-white p-2 rounded shadow-lg block w-48 mx-auto">Kode Saham <span class="text-white block w-full rounded mt-2 text-4xl py-2 font-black" style="background-image: linear-gradient(136deg, #2af598 0%, #009efd 100%);">{{ $stock->code_issuers }}</span></h1>
            <div id="dataJson" data-json="{{ $json }}"></div>
            <div class="flex flex-col md:flex-row gap-2 shadow-md bg-white p-4 mt-4">
                <div class="md:w-1/2">
                    <div class="flex flex-row gap-2">
                        <div class="w-2/5">Nama Emiten</div>
                        <div class="w-3/5 text-green-400 font-bold">{{ $stock->name }}</div>
                    </div>
                    <div class="flex flex-row gap-2">
                        <div class="w-2/5">Tanggal IPO</div>
                        <div class="w-3/5  text-green-400 ">{{ Carbon::parse($stock->ipo_date)->format('d F Y') }}</div>
                    </div>
                    <div class="flex flex-row gap-2">
                        <div class="w-2/5">Jumlah Saham (Juta)</div>
                        <div class="w-3/5  text-green-400 ">{{ number_format($stock->report->last()->coststock->total_stock , 0,',','.') }}</div>
                    </div>
                    <div class="flex flex-row gap-2">
                        <div class="w-2/5">Kapitalisasi (Rp. Juta)</div>
                        <div class="w-3/5  text-green-400 ">{{ Number::format($stock->capitalization) }}</div>
                    </div>
                </div>
                <div class="md:w-1/2">
                    <div class="flex flex-row gap-2">
                        <div class="w-2/5">Sektor</div>
                        <div class="w-3/5  text-green-400 ">{{ $stock->sector->sector }}</div>
                    </div>
                    <div class="flex flex-row gap-2">
                        <div class="w-2/5">Industri</div>
                        <div class="w-3/5  text-green-400 ">{{ $stock->industry->industry }}</div>
                    </div>
                     <div class="flex flex-row gap-2">
                        <div class="w-2/5">Kurs Laporan</div>
                        <div class="w-3/5  text-green-400 ">{{ $stock->kurs_report }}</div>
                    </div>
                     <div class="flex flex-row gap-2">
                        <div class="w-2/5">Emiten Syariah</div>
                        <div class="w-3/5  @if($stock->sharia === 'true') text-green-400 @else text-red-400 @endif ">{{
                            ($stock->sharia === 'true') ? 'Ya' : 'Bukan'
                        }}</div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 grid-rows-7 lg:grid-rows-6 mt-6 text-xs md:text-sm">
                    <table class="col-span-3 md:col-span-2 lg:h-full row-span-2 rounded-lg shadow-md overflow-auto md:overflow-hidden bg-white p-2">
                        <thead class="text-white" style="background-image: linear-gradient(136deg, #009efd 0%, #f900fd 100%);">
                            <tr>
                                <th class="p-2">Neraca</th>
                                @foreach($periodes as $periode)
                                <th>{{ $periode }}</th>
                                @endforeach
                            </tr>   
                        </thead>
                        <tbody>
                            <tr class="text-green-500">
                                <th class="p-2">Aset</th>
                                @foreach($assets['total'] as $asset)
                                    <th>{{ $asset }}</th>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="p-2">Lancar</td>
                                @foreach($assets['current'] as $asset)
                                    <td>{{ $asset }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="p-2">Non-Lancar</td>
                                @foreach($assets['ncurrent'] as $asset)
                                    <td>{{ $asset }}</td>
                                @endforeach
                            </tr>
                            <tr class="font-semibold italic bg-teal-100">
                                <td class="p-2">Growth</td>
                                @foreach($assets['growth'] as $asset)
                                    <td>{{ $asset }}</td>
                                @endforeach
                            </tr>
                            <tr class="text-red-500">
                                <th class="p-2">Liabilitas</th>
                                @foreach($liabilities['total'] as $data)
                                    <th>{{ $data }}</th>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="p-2">Jangka Pendek</td>
                                @foreach($liabilities['current'] as $data)
                                    <td>{{ $data }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="p-2">Jangka Panjang</td>
                                @foreach($liabilities['ncurrent'] as $data)
                                    <td>{{ $data }}</td>
                                @endforeach
                            </tr>
                            <tr  class="font-semibold italic">
                                <td class="p-2">Growth</td>
                                @foreach($liabilities['growth'] as $data)
                                    <td>{{ $data }}</td>
                                @endforeach
                            </tr>
                            <tr class="text-indigo-500">
                                <th class="p-2">Ekuitas</th>
                                @foreach($equity['total'] as $data)
                                    <th>{{ $data }}</th>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="p-2">Pemilik entitas produk</td>
                                @foreach($equity['parent'] as $data)
                                    <td>{{ $data }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="p-2">Non Pengendali</td>
                                @foreach($equity['not_controller'] as $data)
                                    <td>{{ $data }}</td>
                                @endforeach
                            </tr>
                            <tr  class="font-semibold italic">
                                <td class="p-2">Growth</td>
                                @foreach($equity['growth'] as $data)
                                    <td>{{ $data }}</td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                    <div class="col-span-3 md:col-span-1 shadow-md bg-white rounded-lg w-full p-2">
                        <canvas style="height: 250px" id="chartAsset"></canvas>
                    </div>
                    <div class="col-span-3 md:col-span-1 rounded-lg shadow-md bg-white w-full p-2">
                        <canvas style="height: 250px" id="chartEquity"></canvas>
                    </div>
                    <table class="col-span-3 md:col-span-2 lg:h-full rounded-lg shadow-md overflow-auto md:overflow-hidden bg-white p-2">
                        <thead class="text-white" style="background-image: linear-gradient(136deg, #009efd 0%, #f900fd 100%);">
                            <tr>
                                <th class="p-2">Laba Rugi</th>
                                @foreach($periodes as $periode)
                                <th>{{ $periode }}</th>
                                @endforeach
                            </tr>   
                        </thead>
                        <tbody>
                            <tr>
                                <td class="p-2">Total Pendapatan</td>
                                @foreach($profits['revenue'] as $data)
                                    <td>{{ $data }}</td>
                                @endforeach
                            </tr>
                            <tr class="font-semibold italic bg-teal-100">
                                <td class="p-2">Growth</td>
                                @foreach($profits['revenue_growth'] as $data)
                                    <td>{{ $data }}</td>
                                @endforeach
                            </tr>
                            <tr class="text-gray-100 bg-gray-100">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>c</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="p-2">Total Laba Bersih</td>
                                @foreach($profits['net_profit'] as $data)
                                    <td>{{ $data }}</td>
                                @endforeach
                            </tr>
                            <tr class="font-semibold italic bg-teal-100">
                                <td class="p-2">Growth</td>
                                @foreach($profits['net_profit_growth'] as $data)
                                    <td>{{ $data }}</td>
                                @endforeach
                            </tr>
                    </table>
                    <div class="col-span-3 md:col-span-2 lg:col-span-1 rounded-lg shadow-md bg-white w-full p-2">
                        <canvas style="height: 250px" id="chartProfit"></canvas>
                    </div>
                    <table class="col-span-3 md:col-span-2 lg:h-full row-span-2 rounded-lg shadow-md overflow-auto md:overflow-hidden bg-white p-2">
                        <thead class="text-white" style="background-image: linear-gradient(136deg, #009efd 0%, #f900fd 100%);">
                            <tr>
                                <th class="p-2">Rasio Keuangan</th>
                                @foreach($periodes as $periode)
                                <th>{{ $periode }}</th>
                                @endforeach
                            </tr>   
                        </thead>
                        <tbody>
                            <tr>
                                <td class="p-2">Current Ratio (x)</td>
                                @foreach($ratios['cr'] as $data)
                                    <td>{{ $data }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="p-2">Dividen Saham (Rp)</td>
                                @foreach($ratios['dn'] as $data)
                                    <td>{{ $data }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="p-2">Dividen Yield</td>
                                @foreach($ratios['dy'] as $data)
                                    <td>{{ $data }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="p-2">Dividen Payout (%)</td>
                                @foreach($ratios['dp'] as $data)
                                    <td>{{ $data }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="p-2">Laba bersih / saham</td>
                                @foreach($ratios['np'] as $data)
                                    <td>{{ $data }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="p-2">Nilai Buku</td>
                                @foreach($ratios['bv'] as $data)
                                    <td>{{ $data }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="p-2">Debt to Asset Ratio (x)</td>
                                @foreach($ratios['dar'] as $data)
                                    <td>{{ $data }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="p-2">Debt to Equity Ratio (x)</td>
                                @foreach($ratios['der'] as $data)
                                    <td>{{ $data }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="p-2">Return of Assets (%)</td>
                                @foreach($ratios['roa'] as $data)
                                    <td>{{ $data }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="p-2">Return of Equity (%)</td>
                                @foreach($ratios['roe'] as $data)
                                    <td>{{ $data }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="p-2">Net Profit Margin (%)</td>
                                @foreach($ratios['npm'] as $data)
                                    <td>{{ $data }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="p-2">Price to Earning Ratio (x)</td>
                                @foreach($ratios['per'] as $data)
                                    <td>{{ $data }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="p-2">Price to Book Value (x)</td>
                                @foreach($ratios['pbv'] as $data)
                                    <td>{{ $data }}</td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                    <div class="col-span-3 md:col-span-1 rounded-lg shadow-md bg-white w-full p-2">
                        <canvas style="height: 250px" id="chartNetProfit"></canvas>
                    </div>
                    <div class="col-span-3 md:col-span-1 rounded-lg shadow-md bg-white w-full p-2">
                        <canvas style="height: 250px" id="chartPERPBV" ></canvas>
                    </div>
                    <table class="col-span-3 md:col-span-2 rounded-lg shadow-md overflow-auto md:overflow-hidden bg-white p-2">
                        <thead class="text-white" style="background-image: linear-gradient(136deg, #009efd 0%, #f900fd 100%);">
                            <tr>
                                <th class="p-2">Harga & Jumlah Saham</th>
                                @foreach($periodes as $periode)
                                <th>{{ $periode }}</th>
                                @endforeach
                            </tr>   
                        </thead>
                        <tbody>
                            <tr>
                                <td class="p-2">Harga</td>
                                @foreach($costs['cost'] as $data)
                                    <td>{{ $data }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="p-2">Jumlah Saham (Juta)</td>
                                @foreach($costs['total_stock'] as $data)
                                    <td>{{ $data }}</td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
            </div>



            @section('script')

            <script>
                    const data = JSON.parse(document.getElementById('dataJson').getAttribute('data-json'));

                    var chartAsset = document.getElementById('chartAsset').getContext('2d');
                    new Chart(chartAsset, {
                        type: 'bar',
                        data: {
                            labels: data.periodes,
                            datasets: [{
                                label: 'Asset',
                                data: data.asset,
                                backgroundColor: '#35e49c',
                            },
                            {
                                label: 'Liabilitas',
                                data: data.liability,
                                backgroundColor: '#ee609c',
                            }],
                        },
                        options: {
                            responsive : true,
                            maintainAspectRatio: false,
                            title: {
                                display: true,
                                text: 'Aset & Liabilitas',
                            },
                            legend: {
                                position: 'bottom',                        
                            },
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        display: false,
                                    },
                                    gridLines: {
                                        drawBorder: false,
                                    },
                                }],
                                xAxes: [{
                                    gridLines: {
                                        display: false,
                                    }
                                }]
                            },
                        }
                    });

                    var chartEquity = document.getElementById('chartEquity').getContext('2d');
                    new Chart(chartEquity, {
                        type: 'bar',
                        data: {
                            labels: data.periodes,
                            datasets: [{
                                data: data.equity,
                                backgroundColor: '#009efd',
                            }],
                        },
                        options: {
                            responsive : true,
                            maintainAspectRatio: false,
                            title: {
                                display: true,
                                text: 'Ekuitas',
                            },
                            legend: {
                                display: false,
                            },
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        display: false,
                                    },
                                    gridLines: {
                                        drawBorder: false,
                                    }
                                }],
                                xAxes: [{
                                    gridLines: {
                                        display: false,
                                    }
                                }]
                            },
                        }
                    });

                    var chartProfit = document.getElementById('chartProfit').getContext('2d');
                    new Chart(chartProfit, {
                        type: 'bar',
                        data: {
                            labels: data.periodes,
                            datasets: [{
                                data: data.revenue,
                                backgroundColor: '#18d0c5',
                            }],
                        },
                        options: {
                            responsive : true,
                            maintainAspectRatio: false,
                            title: {
                                display: true,
                                text: 'Pendapatan',
                            },
                            legend: {
                                display: false,
                            },
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        display: false,
                                    },
                                    gridLines: {
                                        drawBorder: false,
                                    }
                                }],
                                xAxes: [{
                                    gridLines: {
                                        display: false,
                                    }
                                }],
                            },
                        }
                    });

                    var chartNetProfit = document.getElementById('chartNetProfit').getContext('2d');
                    new Chart(chartNetProfit, {
                        type: 'bar',
                        data: {
                            labels: data.periodes,
                            datasets: [{
                                data: data.netProfit,
                                backgroundColor: '#7c50fd',
                            }],
                        },
                        options: {
                            responsive : true,
                            maintainAspectRatio: false,
                            title: {
                                display: true,
                                text: 'Laba (Rugi) Bersih',
                            },
                            legend: {
                                display: false,
                            },
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        stepSize: 1000000, 
                                        display: false,
                                    },
                                    gridLines: {
                                        drawBorder: false,
                                    }
                                }],
                                xAxes: [{
                                    gridLines: {
                                        display: false,
                                    }
                                }],
                            },
                        }
                    });



                    var chartPERPBV = document.getElementById('chartPERPBV').getContext('2d');
                    new Chart(chartPERPBV, {
                        type: 'line',
                        data: {
                            labels: data.periodes,
                            datasets: [{
                                label: 'PER',
                                data: data.per,
                                fill: false,
                                borderColor: 'skyblue',
                                lineTension: 0,
                                borderWidth: 2,
                                pointBackgroundColor: 'skyblue',
                                pointRadius: 2,
                            },
                            {
                                label: 'PBV',
                                data: data.pbv,
                                fill: false,
                                lineTension: 0,
                                borderColor: 'orange',
                                borderWidth: 2,
                                pointBackgroundColor: 'orange',
                                pointRadius: 2,
                            }],
                        },
                        options: {
                            responsive : true,
                            maintainAspectRatio: false,
                            title: {
                                display: true,
                                text: 'PER & PBV',
                            },
                            legend: {
                                position: 'bottom',                        
                            },
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        display: false,
                                    },
                                    gridLines: {
                                        drawBorder: false,
                                    }
                                }],
                                xAxes: [{
                                    gridLines: {
                                        display: false,
                                    }
                                }],
                            },
                        }
                    });
            </script>

            @endsection
        </div>
        @endif


    </div>







</x-app-layout>



