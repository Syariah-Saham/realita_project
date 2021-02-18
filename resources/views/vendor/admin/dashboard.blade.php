@extends('layouts.admin')
@section('title'  , 'Dashboard')
@section('dashboard' , 'active')
@section('body')

<h1 class="text-2xl font-bold text-gray-600 mb-2 mt-6">Dashboard</h1>
	<div class="flex flex-col md:flex-row gap-8 mt-4 mb-8">
        <a href="{{ url('member/report') }}" class="w-full transition duration-300 transform hover:translate-y-1 ease-in-out md:w-1/4">
            <div style="background-image: linear-gradient(136deg , #de11fd 0%, #35e49c 100%);" class="bg-gr shadow-md rounded-3xl flex flex-row items-center p-3 justify-between  text-white gap-3">
                <svg class="w-2/5 max-h-20 justify-center" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <div class="w-3/5">
                	<h1 class="text-6xl font-bold">21</h1>
	                <h3 class="font-semibold text-2xl">Free</h3>
                </div>
            </div>
        </a>
        <a href="{{ url('member/screening') }}" class="w-full transition duration-300 transform hover:translate-y-1 ease-in-out md:w-1/4">
            <div style="background-image: linear-gradient(136deg, #2af598 0%, #009efd 100%);" class="bg-gr shadow-md rounded-3xl flex flex-row items-center p-3 justify-between  text-white gap-3">
                <svg class="w-2/5 max-h-20 justify-center" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <div class="w-3/5">
                	<h1 class="text-6xl font-bold">21</h1>
	                <h3 class="font-semibold text-2xl">Personal</h3>
                </div>
            </div>
        </a>
		<a href="{{ url('member/compare') }}" class="w-full transition duration-300 transform hover:translate-y-1 ease-in-out md:w-1/4">
			<div style="background-image: linear-gradient(136deg, #009efd 0%, #f900fd 100%);" class="bg-gr shadow-md rounded-3xl flex flex-row items-center p-3 justify-between  text-white gap-3">
				<svg class="w-2/5 max-h-20 justify-center" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <div class="w-3/5">
                	<h1 class="text-6xl font-bold">21</h1>
	                <h3 class="font-semibold text-2xl">Expert</h3>
                </div>
			</div>
		</a>
		<a href="{{ url('member/compare') }}" class="w-full transition duration-300 transform hover:translate-y-1 ease-in-out md:w-1/4">
			<div style="background-image: linear-gradient(136deg, #009efd 0%, #f900fd 100%);" class="bg-gr shadow-md rounded-3xl flex flex-row items-center p-3 justify-between  text-white gap-3">
				<svg class="w-2/5 max-h-20 justify-center" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <div class="w-3/5">
                	<h1 class="text-6xl font-bold">101</h1>
	                <h3 class="font-semibold text-2xl">Total Member</h3>
                </div>
			</div>
		</a>
	</div>

<table class="w-full bg-white rounded-xl overflow-hidden">
	<thead class="bg-gr text-white">
		<tr>
			<th class="p-2">#</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Aksi</th>
		</tr>
	</thead>

	<tbody>
		@forelse($members as $member)
			<tr class="text-center">
				<td class="p-2">{{ $loop->iteration }}</td>
				<td class="text-left">{{ $member->name }}</td>
				<td class="text-left">{{ $member->email }}</td>
				<td class="col-badge">
					<form action="{{ url('admin/member/'.$member->id.'/status') }}" method="post">
						@csrf
						@method('put')
						<input type="hidden" name="status" value="confirmed">
						<button class="badge bg-green">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
							  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
							</svg>
						</button>
					</form>
					<form action="{{ url('admin/member/'.$member->id.'/status') }}" method="post">
						@csrf
						@method('put')
						<input type="hidden" name="status" value="rejected">
						<button class="badge bg-red">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
							  <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
							</svg>
						</button>
					</form>
				</td>
			</tr>
		@empty
			<tr>
				<td colspan="5">Tidak ada member</td>
			</tr>
		@endforelse
	</tbody>
</table>

@endsection
	