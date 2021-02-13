@php
	function path($path) {
		$url = url()->current();
		return strpos($url, $path);
	}
	if(path('user/profile')) {
		$profile = true;
	} else if(path('admin/dashboard')) {
		$dashboard = true;
	} else if(path('admin/admin')) {
		$admin = true;
	} else if(path('admin/stock')) {
		$stock = true;
	} else if(path('admin/report')) {
		$report = true;
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
		<a href="{{ url('admin/stock') }}" class="@if(isset($stock)) active @endif">
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
			  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
			</svg>
			<span>Saham</span>
		</a>
		<a href="{{ url('admin/report') }}" class="@if(isset($report)) active @endif">
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
			  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
			</svg>
			<span>Laporan Keuangan</span>
		</a>
		<a href="{{ url('admin/admin') }}" class="@if(isset($admin)) active @endif">
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
			  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
			</svg>
			<span>Admin</span>
		</a>
		<a href="{{ url('user/profile') }}">
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
			  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
			</svg>
			<span>Member</span>
		</a>
		<a href="{{ url('user/profile') }}">
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