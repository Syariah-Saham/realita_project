@php
	$url = url()->current();
	if(strpos($url, 'user/profile')) {
		$profile = true;
	} else if(strpos($url , 'member/dashboard')) {
		$dashboard = true;
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