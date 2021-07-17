@extends('layouts.admin')
@section('title'  , 'Dashboard')
@section('dashboard' , 'active')
@section('body')

<div class="px-1 md:px-6 lg:px-8 my-4 mb-8">
	<h1 class="text-2xl font-bold text-gray-600 mb-2 mt-6">Dashboard</h1>
	<div class="flex flex-col md:flex-row gap-3 md:gap-8 mt-4 mb-8">
        <a href="{{ url('admin/package/5') }}" class="w-full transition duration-300 transform hover:translate-y-1 ease-in-out md:w-1/4">
            <div style="background-image: linear-gradient(136deg , #de11fd 0%, #35e49c 100%);" class="bg-gr shadow-md rounded-3xl flex flex-row items-center p-3 justify-between  text-white gap-3">
                <svg class="w-2/5 max-h-20 justify-center"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                <div class="w-3/5">
                	<h1 class="text-5xl font-bold">{{ $dataPackages[3] }}</h1>
	                <h3 class="font-semibold text-xl">Basic</h3>
                </div>
            </div>
        </a>
        <a href="{{ url('admin/package/3') }}" class="w-full transition duration-300 transform hover:translate-y-1 ease-in-out md:w-1/4">
            <div style="background-image: linear-gradient(136deg, #2af598 0%, #009efd 100%);" class="bg-gr shadow-md rounded-3xl flex flex-row items-center p-3 justify-between  text-white gap-3">
                <svg class="w-2/5 max-h-20 justify-center"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                <div class="w-3/5">
                	<h1 class="text-5xl font-bold">{{ $dataPackages[1] }}</h1>
	                <h3 class="font-semibold text-xl">Personal</h3>
                </div>
            </div>
        </a>
		<a href="{{ url('admin/package/4') }}" class="w-full transition duration-300 transform hover:translate-y-1 ease-in-out md:w-1/4">
			<div style="background-image: linear-gradient(136deg, #009efd 0%, #f900fd 100%);" class="bg-gr shadow-md rounded-3xl flex flex-row items-center p-3 justify-between  text-white gap-3">
                <svg class="w-2/5 max-h-20 justify-center"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                <div class="w-3/5">
                	<h1 class="text-5xl font-bold">{{ $dataPackages[2] }}</h1>
	                <h3 class="font-semibold text-xl">Expert</h3>
                </div>
			</div>
		</a>
		<a href="{{ url('admin/member') }}" class="w-full transition duration-300 transform hover:translate-y-1 ease-in-out md:w-1/4">
			<div style="background-image: linear-gradient(136deg, #009efd 0%, #f900fd 100%);" class="bg-gr shadow-md rounded-3xl flex flex-row items-center p-3 justify-between  text-white gap-3">
                <svg class="w-2/5 max-h-20 justify-center"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                <div class="w-3/5">
                	<h1 class="text-5xl font-bold">{{ $members->count() }}</h1>
	                <h3 class="font-semibold text-xl">Total Member</h3>
                </div>
			</div>
		</a>
	</div>

	<div class="mt-5">
		<canvas id="chart" data-json="{{ $chart->toJson() }}" class="bg-white mt-4 rounded-lg p-4 shadow-lg" style="height: 400px"></canvas>
		
	</div>
</div>

@endsection

@section('script')

<script>
	const data = JSON.parse(document.getElementById('chart').getAttribute('data-json'));

	let months   = [],
		free     = [],
		personal = [],
		expert   = [];
	for(let [key , value] of Object.entries(data)) {
		months.push(key);
		free.push(value.free);
		personal.push(value.personal);
		expert.push(value.expert);
	}

	var chartAsset = document.getElementById('chart').getContext('2d');
	new Chart(chartAsset, {
	    type: 'line',
	    data: {
	        labels: months,
	        datasets: [{
	            label: 'Free',
	            data: free,
	            borderColor:'#35e49c',
	            fill: false,
	        },
	        {
	            label: 'Personal',
	            data: personal,
	            borderColor: '#ee609c',
	            fill: false,
	        },
	        {
	            label: 'Expert',
	            data: expert,
	            borderColor: 'skyblue',
	            fill: false,
	        }],
	    },
	    options: {
	        responsive : true,
	        maintainAspectRatio: false,
	        title: {
	            display: true,
	            text: 'Grafik Perkembangan',
	        },
	        legend: {
	            position: 'bottom',                        
	        },
	    }
	});
</script>

@endsection
	