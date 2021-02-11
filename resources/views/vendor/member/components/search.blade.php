@php
	if(strpos(url()->current() ,'user/profile')) {
		$title = "Profile";
	} else if(strpos(url()->current() ,'member/dashboard')) {
		$title = "Dashboard";
	} else if(strpos(url()->current() ,'member/screening')) {
		$title = "Screening Fundamental";
	} else if(strpos(url()->current() ,'member/report')) {
		$title = "Laporan Keuangan";
	} else if(strpos(url()->current() ,'member/compare')) {
		$title = 'Comparasi Emiten';
	} else {
		$title = 'Judul Halaman';
	}
@endphp
<h1 class="font-black text-lg md:text-3xl mt-4 text-green-400">{{ $title }}</h1>