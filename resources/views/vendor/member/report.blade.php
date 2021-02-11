<x-app-layout>

    <div class="py-6 pb-12 px-3 lg:px-8">
        <form action="" class="flex flex-col items-center justify-center">
            <img src="{{ asset('asset/landing/laporan_keuangan.svg') }}" alt="illustrasi" class="w-1/3">
            <h1  class="text-2xl font-bold text-gray-600">Cari Laporan Keuangan</h1>
            <div class="w-54">
                <input type="text" class="form-input rounded-full px-8" placeholder="Ketik kode emiten...">
            </div>
        </form>



        <div class="result-report border-t-2 border-gray-300 my-6 pt-6">
            <h1 class="text-center font-bold text-center text-2xl bg-white p-2 rounded shadow-lg block w-48 mx-auto">Kode Saham <span class="text-white bg-green-400 block w-full rounded mt-2 text-4xl py-2 font-black">BBRI</span></h1>
            <div class="flex flex-col md:flex-row gap-2 shadow-md bg-white p-4 mt-4">
                <div class="md:w-1/2">
                    <div class="flex flex-row gap-2">
                        <div class="w-2/5">Nama Emiten</div>
                        <div class="w-3/5 text-green-400 font-bold">PT Bank Rakyat Indonesia Tbk</div>
                    </div>
                    <div class="flex flex-row gap-2">
                        <div class="w-2/5">Tanggal IPO</div>
                        <div class="w-3/5  text-green-400 ">28 Mei 2003</div>
                    </div>
                    <div class="flex flex-row gap-2">
                        <div class="w-2/5">Jumlah Saham (Juta)</div>
                        <div class="w-3/5  text-green-400 ">29.019.291</div>
                    </div>
                    <div class="flex flex-row gap-2">
                        <div class="w-2/5">Kapitalisasi (Rp. Juta)</div>
                        <div class="w-3/5  text-green-400 ">15.049.02910</div>
                    </div>
                </div>
                <div class="md:w-1/2">
                    <div class="flex flex-row gap-2">
                        <div class="w-2/5">Sektor</div>
                        <div class="w-3/5  text-green-400 ">Keuangan</div>
                    </div>
                    <div class="flex flex-row gap-2">
                        <div class="w-2/5">Industri</div>
                        <div class="w-3/5  text-green-400 ">Pinjaman dan perbankan</div>
                    </div>
                     <div class="flex flex-row gap-2">
                        <div class="w-2/5">Kurs Laporan</div>
                        <div class="w-3/5  text-green-400 ">Rp. Penuh</div>
                    </div>
                     <div class="flex flex-row gap-2">
                        <div class="w-2/5">Emiten Syariah</div>
                        <div class="w-3/5  text-green-400 ">Yes</div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 grid-rows-7 lg:grid-rows-6 mt-6 text-xs md:text-sm">
                    <table class="col-span-3 md:col-span-2 lg:h-full row-span-2 rounded-lg shadow-md overflow-auto md:overflow-hidden bg-white p-2">
                        <thead class="bg-green-500 text-white">
                            <tr>
                                <th class="p-2">Neraca</th>
                                <th>2015</th>
                                <th>2016</th>
                                <th>2017</th>
                                <th>2018</th>
                                <th>2019</th>
                            </tr>   
                        </thead>
                        <tbody>
                            <tr class="text-green-500">
                                <th class="p-2">Aset</th>
                                <th>8.000.000</th>
                                <th>8.000.000</th>
                                <th>8.000.000</th>
                                <th>8.000.000</th>
                                <th>8.000.000</th>
                            </tr>
                            <tr>
                                <td class="p-2">Lancar</td>
                                <td>7.000.000</td>
                                <td>7.000.000</td>
                                <td>7.000.000</td>
                                <td>7.000.000</td>
                                <td>7.000.000</td>
                            </tr>
                            <tr>
                                <td class="p-2">Non-Lancar</td>
                                <td>6.000.000</td>
                                <td>6.000.000</td>
                                <td>6.000.000</td>
                                <td>6.000.000</td>
                                <td>6.000.000</td>
                            </tr>
                            <tr class="font-semibold italic bg-teal-100">
                                <td class="p-2">Growth</td>
                                <td>30%</td>
                                <td>30%</td>
                                <td>30%</td>
                                <td>30%</td>
                                <td>30%</td>
                            </tr>
                            <tr class="text-red-500">
                                <th class="p-2">Liabilitas</th>
                                <th>2.000.000</th>
                                <th>2.000.000</th>
                                <th>2.000.000</th>
                                <th>2.000.000</th>
                                <th>2.000.000</th>
                            </tr>
                            <tr>
                                <td class="p-2">Jangka Pendek</td>
                                <td>1.000.000</td>
                                <td>1.000.000</td>
                                <td>1.000.000</td>
                                <td>1.000.000</td>
                                <td>1.000.000</td>
                            </tr>
                            <tr>
                                <td class="p-2">Jangka Panjang</td>
                                <td>1.000.000</td>
                                <td>1.000.000</td>
                                <td>1.000.000</td>
                                <td>1.000.000</td>
                                <td>1.000.000</td>
                            </tr>
                            <tr  class="font-semibold italic">
                                <td class="p-2">Growth</td>
                                <td>20%</td>
                                <td>20%</td>
                                <td>20%</td>
                                <td>20%</td>
                                <td>20%</td>
                            </tr>
                            <tr class="text-indigo-500">
                                <th class="p-2">Ekuitas</th>
                                <th>7.000.000</th>
                                <th>7.000.000</th>
                                <th>7.000.000</th>
                                <th>7.000.000</th>
                                <th>7.000.000</th>
                            </tr>
                            <tr>
                                <td class="p-2">Pemilik entitas produk</td>
                                <td>7.000.000</td>
                                <td>7.000.000</td>
                                <td>7.000.000</td>
                                <td>7.000.000</td>
                                <td>7.000.000</td>
                            </tr>
                            <tr>
                                <td class="p-2">Non Pengendali</td>
                                <td>3.000</td>
                                <td>3.000</td>
                                <td>3.000</td>
                                <td>3.000</td>
                                <td>3.000</td>
                            </tr>
                            <tr  class="font-semibold italic">
                                <td class="p-2">Growth</td>
                                <td>20%</td>
                                <td>20%</td>
                                <td>20%</td>
                                <td>20%</td>
                                <td>20%</td>
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
                        <thead class="bg-green-500 text-white">
                            <tr>
                                <th class="p-2">Laba Rugi</th>
                                <th>2015</th>
                                <th>2016</th>
                                <th>2017</th>
                                <th>2018</th>
                                <th>2019</th>
                            </tr>   
                        </thead>
                        <tbody>
                            <tr>
                                <td class="p-2">Total Pendapatan</td>
                                <td>8.000.000</td>
                                <td>8.000.000</td>
                                <td>8.000.000</td>
                                <td>8.000.000</td>
                                <td>8.000.000</td>
                            </tr>
                            <tr class="font-semibold italic bg-teal-100">
                                <td class="p-2">Growth</td>
                                <td>15%</td>
                                <td>15%</td>
                                <td>15%</td>
                                <td>15%</td>
                                <td>15%</td>
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
                                <td>8.000.000</td>
                                <td>8.000.000</td>
                                <td>8.000.000</td>
                                <td>8.000.000</td>
                                <td>8.000.000</td>
                            </tr>
                            <tr class="font-semibold italic bg-teal-100">
                                <td class="p-2">Growth</td>
                                <td>15%</td>
                                <td>15%</td>
                                <td>15%</td>
                                <td>15%</td>
                                <td>15%</td>
                            </tr>
                    </table>
                    <div class="col-span-3 md:col-span-2 lg:col-span-1 rounded-lg shadow-md bg-white w-full p-2">
                        <canvas style="height: 250px" id="chartProfit"></canvas>
                    </div>
                    <table class="col-span-3 md:col-span-2 lg:h-full row-span-2 rounded-lg shadow-md overflow-auto md:overflow-hidden bg-white p-2">
                        <thead class="bg-green-500 text-white">
                            <tr>
                                <th class="p-2">Rasio Keuangan</th>
                                <th>2015</th>
                                <th>2016</th>
                                <th>2017</th>
                                <th>2018</th>
                                <th>2019</th>
                            </tr>   
                        </thead>
                        <tbody>
                            <tr>
                                <td class="p-2">Current Ratio (x)</td>
                                <td>5,42</td>
                                <td>5,42</td>
                                <td>5,42</td>
                                <td>5,42</td>
                                <td>5,42</td>
                            </tr>
                            <tr>
                                <td class="p-2">Dividen Saham (Rp)</td>
                                <td>21.00</td>
                                <td>21.00</td>
                                <td>21.00</td>
                                <td>21.00</td>
                                <td>21.00</td>
                            </tr>
                            <tr>
                                <td class="p-2">Dividen Yield</td>
                                <td>5,42%</td>
                                <td>5,42%</td>
                                <td>5,42%</td>
                                <td>5,42%</td>
                                <td>5,42%</td>
                            </tr>
                            <tr>
                                <td class="p-2">Dividen Payout (%)</td>
                                <td>5,42%</td>
                                <td>5,42%</td>
                                <td>5,42%</td>
                                <td>5,42%</td>
                                <td>5,42%</td>
                            </tr>
                            <tr>
                                <td class="p-2">Laba bersih / saham</td>
                                <td>29,59</td>
                                <td>29,59</td>
                                <td>29,59</td>
                                <td>29,59</td>
                                <td>29,59</td>
                            </tr>
                            <tr>
                                <td class="p-2">Nilai Buku</td>
                                <td>154,84</td>
                                <td>154,84</td>
                                <td>154,84</td>
                                <td>154,84</td>
                                <td>154,84</td>
                            </tr>
                            <tr>
                                <td class="p-2">Debt to Asset Ratio (%)</td>
                                <td>0,11</td>
                                <td>0,11</td>
                                <td>0,11</td>
                                <td>0,11</td>
                                <td>0,11</td>
                            </tr>
                            <tr>
                                <td class="p-2">Debt to Equity Ratio (%)</td>
                                <td>0,11</td>
                                <td>0,11</td>
                                <td>0,11</td>
                                <td>0,11</td>
                                <td>0,11</td>
                            </tr>
                            <tr>
                                <td class="p-2">Return of Assets (%)</td>
                                <td>17,08%</td>
                                <td>17,08%</td>
                                <td>17,08%</td>
                                <td>17,08%</td>
                                <td>17,08%</td>
                            </tr>
                            <tr>
                                <td class="p-2">Return of Equity (%)</td>
                                <td>17,08%</td>
                                <td>17,08%</td>
                                <td>17,08%</td>
                                <td>17,08%</td>
                                <td>17,08%</td>
                            </tr>
                            <tr>
                                <td class="p-2">Net Profit Margin (%)</td>
                                <td>17,08%</td>
                                <td>17,08%</td>
                                <td>17,08%</td>
                                <td>17,08%</td>
                                <td>17,08%</td>
                            </tr>
                            <tr>
                                <td class="p-2">Price to Earning Ratio (%)</td>
                                <td>7,27</td>
                                <td>7,27</td>
                                <td>7,27</td>
                                <td>7,27</td>
                                <td>7,27</td>
                            </tr>
                            <tr>
                                <td class="p-2">Price to Book Value (%)</td>
                                <td>7,27</td>
                                <td>7,27</td>
                                <td>7,27</td>
                                <td>7,27</td>
                                <td>7,27</td>
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
                        <thead class="bg-green-500 text-white">
                            <tr>
                                <th class="p-2">Harga & Jumlah Saham</th>
                                <th>2015</th>
                                <th>2016</th>
                                <th>2017</th>
                                <th>2018</th>
                                <th>2019</th>
                            </tr>   
                        </thead>
                        <tbody>
                            <tr>
                                <td class="p-2">Harga</td>
                                <td>215</td>
                                <td>215</td>
                                <td>215</td>
                                <td>215</td>
                                <td>215</td>
                            </tr>
                            <tr>
                                <td class="p-2">Jumlah Saham (Juta)</td>
                                <td>42.322</td>
                                <td>42.322</td>
                                <td>42.322</td>
                                <td>42.322</td>
                                <td>42.322</td>
                            </tr>
                        </tbody>
                    </table>
            </div>
            
        </div>


    </div>






    @section('script')

    <script>
            var chartAsset = document.getElementById('chartAsset').getContext('2d');
            new Chart(chartAsset, {
                type: 'bar',
                data: {
                    labels: ['2015', '2016', '2017', '2018', '2019'],
                    datasets: [{
                        label: 'Asset',
                        data: [6500000, 7200000, 7500000, 8200000, 8000000],
                        backgroundColor: '#76c23a',
                    },
                    {
                        label: 'Liabilitas',
                        data: [6500000, 7200000, 7500000, 8200000, 8000000],
                        backgroundColor: 'salmon',
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
                                stepSize: 1000000, 
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
                    labels: ['2015', '2016', '2017', '2018', '2019'],
                    datasets: [{
                        label: 'Asset',
                        data: [6500000, 7200000, 7500000, 8200000, 8000000],
                        backgroundColor: 'skyblue',
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
                        }]
                    },
                }
            });

            var chartProfit = document.getElementById('chartProfit').getContext('2d');
            new Chart(chartProfit, {
                type: 'bar',
                data: {
                    labels: ['2015', '2016', '2017', '2018', '2019'],
                    datasets: [{
                        data: [6500000, 7200000, 7500000, 8200000, 8000000],
                        backgroundColor: 'lightgreen',
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

            var chartNetProfit = document.getElementById('chartNetProfit').getContext('2d');
            new Chart(chartNetProfit, {
                type: 'bar',
                data: {
                    labels: ['2015', '2016', '2017', '2018', '2019'],
                    datasets: [{
                        data: [6500000, 7200000, 7500000, 8200000, 8000000],
                        backgroundColor: 'indigo',
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
                    labels: ['2015', '2016', '2017', '2018', '2019'],
                    datasets: [{
                        label: 'PER',
                        data: [7, 14, 12, 15, 17],
                        fill: false,
                        borderColor: 'skyblue',
                        lineTension: 0,
                        borderWidth: 2,
                        pointBackgroundColor: 'skyblue',
                        pointRadius: 2,
                    },
                    {
                        label: 'PBV',
                        data: [1.2, 1.5, 1.18, 2, 3],
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

</x-app-layout>



