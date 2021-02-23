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
		$title = 'Komparasi Emiten';
	}else if(strpos(url()->current() ,'member/dictionary')) {
		$title = 'Kamus Fundamental';
	}else if(strpos(url()->current() ,'member/package')) {
		$title = 'Paket Rekap Saham';
	} else if(strpos(url()->current() ,'admin/dashboard')) {
		$title = 'Dashboard Admin';
	}else if(strpos(url()->current() ,'admin/stock')) {
		$title = 'Daftar Saham';
	}else if(strpos(url()->current() ,'admin/import')) {
		$title = 'Import Data';
	}else if(strpos(url()->current() ,'admin/dashboard')) {
		$title = 'Dashboard Admin';
	}else if(strpos(url()->current() ,'admin/package')) {
		$title = 'Paket Member';
	}else if(strpos(url()->current() ,'admin/payment')) {
		$title = 'Pembayaran Member';
	} else {
		$title = 'Judul Halaman';
	}
@endphp
<h1 class="font-black text-lg md:text-3xl mt-4 text-green-400">{{ $title }}</h1>