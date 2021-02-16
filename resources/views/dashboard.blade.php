<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl px-4 sm:px-6 lg:px-8 pb-10">

        	<h1 class="text-2xl font-bold text-gray-600">Fitur Kami</h1>
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
        				<h3 class="font-bold text-2xl">Comparison Emiten</h3>
        			</div>
        		</a>
        	</div>

        	<h1 class="text-2xl font-bold text-gray-600 mb-2">Laporan</h1>
        	<div class="flex flex-col md:flex-row gap-6">
        		<div class="w-full p-3 md:w-1/3 bg-white rounded-lg shadow-lg">
		        	<canvas id="chartDonught" class="w-full"></canvas>
        		</div>
        		<div class="w-full p-3 md:w-2/3 bg-white rounded-lg shadow-lg">
					<canvas id="chartBar"></canvas>
        		</div>
        	</div>
        </div>
    </div>



    @section('script')

    <script>
    		var ctx = document.getElementById('chartBar').getContext('2d');
    		new Chart(ctx, {
    		    type: 'line',
    		    data: {
    		        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni'],
    		        datasets: [{
    		            label: 'Diagram Batang',
    		            data: [12, 19, 3, 5, 2, 3],
    		            backgroundColor: '#76c23a82',
    		        }]
    		    },
    		    options: {
    		        scales: {
    		            yAxes: [{
    		                ticks: {
    		                    beginAtZero: true
    		                }
    		            }]
    		        }
    		    }
    		});


    		var ctx2 = document.getElementById('chartDonught').getContext('2d');
    		new Chart(ctx2, {
    		    type: 'doughnut',
    		    data: {
    		        labels: ['nilai 1', 'nilai 2'],
    		        datasets: [{
    		            label: 'Diagram Lingkaran',
    		            data: [70, 30],
    		            backgroundColor: [
    		                '#76c23a',
    		                'white',
    		            ],
                        borderWidth: 0,
    		        }]
    		    },
    		    options: {
                    responsive : true,
                    maintainAspectRatio: false,
    		    }
    		});
    </script>

    @endsection

</x-app-layout>



