@php
	function status($path) {
		$url = url()->current();
		return strpos($url , $path);
	}
	if(status('user/profile')) {
		$profile = true;
	} else if(status('member/dashboard')) {
		$dashboard = true;
	} else if(status('member/screening')) {
		$screening = true;
	} else if(status('member/report')) {
		$report = true;
	} else if(status('member/compare')) {
		$compare = true;
	}
@endphp
<aside>
	<div class="brand">
		<img src="{{ asset('asset/logo_warna.png') }}" alt="logo syariah saham" class="h-15 mt-8 mx-auto">
	</div>

	<div class="list-menu">
		<a href="{{ url('dashboard') }}" class="@if(isset($dashboard)) active @endif">
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
			  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
			</svg>
			<span>Dashboard</span>
		</a>
		<a href="{{ url('member/report') }}" class="@if(isset($report)) active @endif">
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
			  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
			</svg>
			<span>Laporan Keuangan</span>
		</a>
		<a href="{{ url('member/screening') }}" class="@if(isset($screening)) active @endif">
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
			  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
			</svg>
			<span>Screening Fundamental</span>
		</a>
		<a href="{{ url('member/compare') }}" class="@if(isset($compare)) active @endif">
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
			  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
			</svg>
			<span>Comparison Emiten</span>
		</a>
		<a href="{{ url('user/profile') }}" class="@if(isset($profile)) active @endif">
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
			  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
			</svg>
			<span>Profile</span>
		</a>
		<form method="POST" action="{{ route('logout') }}">
		    @csrf
		    <a href="{{ route('logout') }}"
		                        onclick="event.preventDefault();
		                                    this.closest('form').submit();">
		    	<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
		    	  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
		    	</svg>
		    	<span>Keluar</span>
		    </a>
		</form>

	</div>
</aside>