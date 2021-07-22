@extends('layouts.admin')
@section('title'  , 'Detail Saham')
@section('body')


@if(isset($data))
        <div class="result-report my-6 pt-6">
            @php
                $style = ($stock->sharia === 'true')  ? ['text-green-400' , 'bg-gr'] : ['text-red-400' , 'bg-red-400'];
            @endphp
            <h1 class="text-center font-bold text-2xl bg-white p-2 rounded shadow-lg block w-48 mx-auto">Kode Saham <span class="text-white block w-full rounded mt-2 text-4xl py-2 font-black {{ $style[1] }}">{{ $stock->code_issuers }}</span></h1>
            <div id="dataJson" data-json="{{ $json }}"></div>
            <div class="flex flex-col md:flex-row gap-2 shadow-md bg-white p-4 mt-4">
                <div class="md:w-1/2">
                    <div class="flex flex-row gap-2">
                        <div class="w-2/5">Nama Emiten</div>
                        <div class="w-3/5 {{ $style[0] }} font-bold">{{ $stock->name }}</div>
                    </div>
                    <div class="flex flex-row gap-2">
                        <div class="w-2/5">Tanggal IPO</div>
                        <div class="w-3/5  {{ $style[0] }} ">{{ Carbon::parse($stock->ipo_date)->format('d F Y') }}</div>
                    </div>
                    <div class="flex flex-row gap-2">
                        <div class="w-2/5">Jumlah Saham (Juta)</div>
                        <div class="w-3/5  {{ $style[0] }} ">{{ number_format($stock->report->last()->coststock->total_stock , 0,',','.') }}</div>
                    </div>
                    <div class="flex flex-row gap-2">
                        <div class="w-2/5">Kapitalisasi (Rp. Juta)</div>
                        <div class="w-3/5  {{ $style[0] }} ">{{ Number::format($stock->capitalization) }}</div>
                    </div>
                </div>
                <div class="md:w-1/2">
                    <div class="flex flex-row gap-2">
                        <div class="w-2/5">Sektor</div>
                        <div class="w-3/5  {{ $style[0] }} ">{{ $stock->sector->sector }}</div>
                    </div>
                    <div class="flex flex-row gap-2">
                        <div class="w-2/5">Industri</div>
                        <div class="w-3/5  {{ $style[0] }} ">{{ $stock->industry->industry }}</div>
                    </div>
                     <div class="flex flex-row gap-2">
                        <div class="w-2/5">Kurs Laporan</div>
                        <div class="w-3/5  {{ $style[0] }} ">{{ $stock->kurs_report }}</div>
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
                        <thead class="text-white text-right text-base" style="background-image: linear-gradient(136deg, #009efd 0%, #f900fd 100%);">
                            <tr>
                                <th class="p-2 text-center">Neraca</th>
                                @foreach($periodes as $periode)
                                <th class="pr-2">{{ $periode }}</th>
                                @endforeach
                            </tr>   
                        </thead>
                        <tbody>
                            <tr class="text-green-500 text-left">
                                <th class="p-2">Aset</th>
                                @foreach($assets['total'] as $asset)
                                    <th class="text-right pr-2">{{ $asset }}</th>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="p-2">Lancar</td>
                                @foreach($assets['current'] as $asset)
                                    <td class="text-right pr-2">{{ $asset }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="p-2">Non-Lancar</td>
                                @foreach($assets['ncurrent'] as $asset)
                                    <td class="text-right pr-2">{{ $asset }}</td>
                                @endforeach
                            </tr>
                            <tr class="font-semibold italic bg-teal-100">
                                <td class="p-2">Growth</td>
                                @foreach($assets['growth'] as $asset)
                                    @if((float)$asset > 0) 
                                        <td class="text-green-500 text-right pr-2">+{{ $asset }}</td>
                                    @elseif((float)$asset < 0)
                                        <td class="text-red-500 text-right pr-2">{{ $asset }}</td>
                                    @elseif((float)$asset == 0)
                                        <td class="text-right pr-2">{{ $asset }}</td>
                                    @endif
                                @endforeach
                            </tr>
                            <tr class="text-red-500 text-left">
                                <th class="p-2">Liabilitas</th>
                                @foreach($liabilities['total'] as $data)
                                    <th class="text-right pr-2">{{ $data }}</th>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="p-2">Jangka Pendek</td>
                                @foreach($liabilities['current'] as $data)
                                    <td class="text-right pr-2">{{ $data }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="p-2">Jangka Panjang</td>
                                @foreach($liabilities['ncurrent'] as $data)
                                    <td class="text-right pr-2">{{ $data }}</td>
                                @endforeach
                            </tr>
                            <tr  class="font-semibold italic bg-teal-100">
                                <td class="p-2">Growth</td>
                                @foreach($liabilities['growth'] as $data)
                                    @if((float)$data > 0) 
                                        <td class="text-green-500 text-right pr-2">+{{ $data }}</td>
                                    @elseif((float)$data < 0)
                                        <td class="text-red-500 text-right pr-2">{{ $data }}</td>
                                    @elseif((float)$data == 0)
                                        <td class="text-right pr-2">{{ $data }}</td>
                                    @endif
                                @endforeach
                            </tr>
                            <tr class="text-indigo-500 text-left">
                                <th class="p-2">Ekuitas</th>
                                @foreach($equity['total'] as $data)
                                    <th class="text-right pr-2">{{ $data }}</th>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="p-2">Pemilik entitas induk</td>
                                @foreach($equity['parent'] as $data)
                                    <td class="text-right pr-2">{{ $data }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="p-2">Non Pengendali</td>
                                @foreach($equity['not_controller'] as $data)
                                    <td class="text-right pr-2">{{ $data }}</td>
                                @endforeach
                            </tr>
                            <tr  class="font-semibold italic bg-teal-100">
                                <td class="p-2">Growth</td>
                                @foreach($equity['growth'] as $data)
                                    @if((float)$data > 0) 
                                        <td class="text-green-500 text-right pr-2">+{{ $data }}</td>
                                    @elseif((float)$data < 0)
                                        <td class="text-red-500 text-right pr-2">{{ $data }}</td>
                                    @elseif((float)$data == 0)
                                        <td class="text-right pr-2">{{ $data }}</td>
                                    @endif
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
                        <thead class="text-white text-right text-base" style="background-image: linear-gradient(136deg, #009efd 0%, #f900fd 100%);">
                            <tr>
                                <th class="p-2 text-center">Laba Rugi</th>
                                @foreach($periodes as $periode)
                                <th class="pr-2">{{ $periode }}</th>
                                @endforeach
                            </tr>   
                        </thead>
                        <tbody>
                            <tr>
                                <td class="p-2">Total Pendapatan</td>
                                @foreach($profits['revenue'] as $data)
                                    <td class="text-right pr-2">{{ $data }}</td>
                                @endforeach
                            </tr>
                            <tr class="font-semibold italic bg-teal-100">
                                <td class="p-2">Growth</td>
                                @foreach($profits['revenue_growth'] as $data)
                                    @if((float)$data > 0) 
                                        <td class="text-green-500 text-right pr-2">+{{ $data }}</td>
                                    @elseif((float)$data < 0)
                                        <td class="text-red-500 text-right pr-2">{{ $data }}</td>
                                    @elseif((float)$data == 0)
                                        <td class="text-right pr-2">{{ $data }}</td>
                                    @endif
                                @endforeach
                            </tr>
                            <tr class="text-gray-100 bg-gray-100">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>-</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="p-2">Total Laba Bersih</td>
                                @foreach($profits['net_profit'] as $data)
                                    <td class="text-right pr-2">{{ $data }}</td>
                                @endforeach
                            </tr>
                            <tr class="font-semibold italic bg-teal-100">
                                <td class="p-2">Growth</td>
                                @foreach($profits['net_profit_growth'] as $data)
                                    @if((float)$data > 0) 
                                        <td class="text-green-500 text-right pr-2">+{{ $data }}</td>
                                    @elseif((float)$data < 0)
                                        <td class="text-red-500 text-right pr-2">{{ $data }}</td>
                                    @elseif((float)$data == 0)
                                        <td class="text-right pr-2">{{ $data }}</td>
                                    @endif
                                @endforeach
                            </tr>
                    </table>
                    <div class="col-span-3 md:col-span-2 lg:col-span-1 rounded-lg shadow-md bg-white w-full p-2">
                        <canvas style="height: 250px" id="chartProfit"></canvas>
                    </div>
                    <table class="col-span-3 md:col-span-2 lg:h-full row-span-2 rounded-lg shadow-md overflow-auto md:overflow-hidden bg-white p-2">
                        <thead class="text-white text-right text-base" style="background-image: linear-gradient(136deg, #009efd 0%, #f900fd 100%);">
                            <tr>
                                <th class="p-2 text-center">Rasio Keuangan</th>
                                @foreach($periodes as $periode)
                                <th class="pr-2">{{ $periode }}</th>
                                @endforeach
                            </tr>   
                        </thead>
                        <tbody>
                            <tr>
                                <td class="p-2">Current Ratio (x)</td>
                                @foreach($ratios['cr'] as $data)
                                    <td class="text-right pr-2">{{ $data }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="p-2">Dividend Saham (Rp)</td>
                                @foreach($ratios['dn'] as $data)
                                    <td class="text-right pr-2">{{ $data }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="p-2">Dividend Yield (%)</td>
                                @foreach($ratios['dy'] as $data)
                                    <td class="text-right pr-2">{{ $data }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="p-2">Dividend Payout (%)</td>
                                @foreach($ratios['dp'] as $data)
                                    <td class="text-right pr-2">{{ $data }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="p-2">Laba bersih / saham</td>
                                @foreach($ratios['np'] as $data)
                                    <td class="text-right pr-2">{{ $data }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="p-2">Nilai Buku</td>
                                @foreach($ratios['bv'] as $data)
                                    <td class="text-right pr-2">{{ $data }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="p-2">Debt to Asset Ratio (x)</td>
                                @foreach($ratios['dar'] as $data)
                                    <td class="text-right pr-2">{{ $data }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="p-2">Debt to Equity Ratio (x)</td>
                                @foreach($ratios['der'] as $data)
                                    <td class="text-right pr-2">{{ $data }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="p-2">Return on Assets (%)</td>
                                @foreach($ratios['roa'] as $data)
                                    <td class="text-right pr-2">{{ $data }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="p-2">Return on Equity (%)</td>
                                @foreach($ratios['roe'] as $data)
                                    <td class="text-right pr-2">{{ $data }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="p-2">Net Profit Margin (%)</td>
                                @foreach($ratios['npm'] as $data)
                                    <td class="text-right pr-2">{{ $data }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="p-2">Price to Earning Ratio (x)</td>
                                @foreach($ratios['per'] as $data)
                                    <td class="text-right pr-2">{{ $data }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="p-2">Price to Book Value (x)</td>
                                @foreach($ratios['pbv'] as $data)
                                    <td class="text-right pr-2">{{ $data }}</td>
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
                    <div class="col-span-3 md:col-span-2">
                        <table class="w-full rounded-lg shadow-md overflow-auto md:overflow-hidden bg-white  p-2">
                            <thead class="text-white text-right text-base" style="background-image: linear-gradient(136deg, #009efd 0%, #f900fd 100%);">
                                <tr>
                                    <th class="p-2 text-center">Harga & Jumlah Saham</th>
                                    @foreach($periodes as $periode)
                                    <th class="pr-2">{{ $periode }}</th>
                                    @endforeach
                                </tr>   
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="p-2">Harga</td>
                                    @foreach($costs['cost'] as $data)
                                        <td class="text-right pr-2">{{ $data }}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td class="p-2">Jumlah Saham (Juta)</td>
                                    @foreach($costs['total_stock'] as $data)
                                        <td class="text-right pr-2">{{ $data }}</td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
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


@endsection