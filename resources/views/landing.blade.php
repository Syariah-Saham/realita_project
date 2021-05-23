<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Realita </title>

	<link rel="stylesheet" href="{{ asset('/css/app.css') }}">
	<link rel="shorcut icon" href="{{ asset('/asset/logo_warna_bulat.png') }}">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,600;0,700;0,800;0,900;1,400&display=swap" rel="stylesheet">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

	<style>
		html {
			scroll-behavior: smooth;
		}

		body {
			font-family: 'Nunito' , 'Arial' , 'Helvetica' , sans-serif;
			color: #60686d;
			scroll-behavior: smooth;
		}

		::-webkit-scrollbar {
		  width: 6px;
		  height: 10px;
		}

		::-webkit-scrollbar-track {
		  width: 6px;
		  background: #F9F9F9;
		}

		::-webkit-scrollbar-thumb {
		  background-color: #76c23a;
		  border-radius: 10px;
		}

		nav {
			transform: translateY(-120%);
			transition: .8s ease-in-out;
		}

		nav.active {
			transform: translateY(0%);
		}

		#btnSidebar {
			transform: translateY(-120%);
			transition: .8s ease-in-out;
		}

		#btnSidebar.show {
			transform: translateY(0%);
		}

		nav a , aside a { transition: .5s }

		nav a:hover  , aside a:hover {
			color: #76c23a;
		}

		aside {
			transform: translateX(-100%);
			transition: .8s ease-in-out;
			background: #f3ffead1;
		}

		.appear {
			transform: translate(0);
		}

		.banner {
			background-image: url('asset/landing/bg-banner.svg');
			background-size: cover;
			background-repeat: no-repeat;
			background-position: 0px -70px;
		}

		.banner a:hover {
			opacity: .8;
		}

		.btn-register {
			background: white;
			color: #76c23a;
		}

		.btn-register2 {
			color: white;
			background: #76c23a;
		}

		.btn-register2:hover {
			background: white;
			color: #76c23a;
			box-shadow: 2px 2px 5px #76c23a;
		}

		.text-second {
			color: #76c23a;
		}

		button {
			background-color: #76c23a;
		}


		.title-section span {
			color: #76c23a;
			text-transform: uppercase;
		}

		input {
			display: block;
		}

		input  , textarea {
			margin: 6px auto;
			width: 100%;
			outline: none;
		}

		.section-2 {
			background-image: url('asset/landing/bg-section.svg');
			background-size: cover;
			background-repeat: no-repeat;
			padding: 50px 15px;
			padding-top: 70px;
			min-height: 300px;
		}

		.footer h2 {
			color: #76c23a;
		}

		.footer .link a {
			display: block;
		}

		footer {
			background: #76c23a;
			color: white;
		}

		@media (max-width: 400px) {
			.banner {
				background-position: 0px 0px;
			    padding-bottom: 40px;
			}

			.section-2 {
				background-position-x: -600px;
			}
		}
	</style>
</head>
<body id="home">


	{{-- Navbar --}}
		<nav class="navbar z-30 shadow-md h-12 w-screen fixed bg-white flex flex-row justify-between items-center px-10">
			<div class="w-full md:w-1/3">
				<img src="{{ asset('/asset/logo_warna.png') }}" alt="logo warna" class="h-10">
			</div>
			<div class="md:w-2/3 hidden md:flex justify-end items-center gap-14">
				<a class="font-semibold" href="#about">REALITA</a>
				<a class="font-semibold" href="#feature">FITUR</a>
				<a class="font-semibold" href="#price">HARGA</a>
				<a class="font-semibold" href="#testimoni">TESTIMONI</a>
				<a class="font-semibold" href="{{ url('/login') }}">MASUK</a>
				<a class="font-semibold btn-register2 py-2 px-6 rounded-full px-6" href="{{ url('register') }}">DAFTAR</a>
			</div>
		</nav>
		<div id="btnSidebar" class="icon md:hidden text-green-500 fixed z-50 right-0 mr-8 mt-1">
			<svg class="h-10 w-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
			  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
			</svg>
		</div>
	{{-- End Navbar --}}




	{{-- Sidebar --}}
		<aside class="sidebar fixed z-30 bg-white h-screen w-screen pt-6 md:hidden">
			<img src="{{ asset('asset/logo_warna.png') }}" alt="syariah saham warna" class="h-20 block mx-auto">
			<div class="list mt-8 w-4/5 mx-auto pb-6 border-b-2 border-gray-300 text-center">
				<a href="#about" class="block font-semibold text-lg my-2">REALITA</a>
				<a href="#feature" class="block font-semibold text-lg my-2">FITUR</a>
				<a href="#price" class="block font-semibold text-lg my-2">HARGA</a>
				<a href="#testimoni" class="block font-semibold text-lg my-2">TESTIMONI</a>
				<a href="{{ url('/login') }}" class="block font-semibold text-lg my-2">MASUK</a>
				<a href="{{ url('/register') }}" class="block font-semibold btn-register3 bg-white py-2 px-6 rounded-full w-3/5 mx-auto text-lg my-2">DAFTAR</a>
			</div>
			<p class="text-sm text-gray-400 mt-4 text-center">&copy; 2021 . All right reserved.</p>
		</aside>
	{{-- End Sidebar --}}




	{{-- Banner --}}
	<div class="banner text-white pb-40 lg:pb-20">
		<header class="h-20 hidden px-10 md:flex flex-row justify-between items-center">
			<div class="w-1/3">
				<img class="h-16" src="{{ asset('/asset/logo_putih.png') }}" alt="logo syariah saham">
			</div>
			<div class="w-2/3 hidden justify-end items-center lg:flex gap-14">
				<a class="font-bold" href="#about">REALITA</a>
				<a class="font-bold" href="#feature">FITUR</a>
				<a class="font-bold" href="#price">HARGA</a>
				<a class="font-bold" href="#testimoni">TESTIMONI</a>
				<a class="font-bold" href="{{ url('/login') }}">MASUK</a>
				<a class="font-bold btn-register rounded-full py-2 px-6 px-6 transition duration-200" href="{{ url('register') }}">DAFTAR</a>
			</div>
		</header>
		<div class="flex flex-col-reverse gap-10 md:flex-row px-4 md:px-10 py-10 md:py-36">
			<div class="w-full text-center md:text-left md:w-1/2" data-aos="fade-right">
				<h1 class="text-3xl md:text-6xl font-black">REALITA</h1>
				<h2 class="text-xl md:text-4xl font-bold">SOLUSI INVESTASI</h2>
				<p class="font-light mt-4 text-sm md:text-lg">Sejak kami meluncurkan produk laporan keuangan pertama kali di tahun 2016, alhaldulillah sudah banyak investor menggunakan data kami, baik untuk kepentingan analisis maupun sekedar tugas kuliah. Fitur terbaru dari kami menyediakan data laporan keuangan 5 tahun terakhir. Semoga produk ini dapat membantu para investor dalam menganalisis keuangan suatu perusahaan.</p>
			</div>
			<div class="w-full pt-10 md:pt-0 md:w-1/2" data-aos="fade-left">
				<img src="{{ asset('asset/landing/banner-illustration.svg') }}" alt="banner illustration">
			</div>
		</div>
	</div>
	{{-- end bannner --}}
















	{{-- About --}}
		<div id="about" class="about flex flex-col md:flex-row px-3 md:px-15 py-20 items-center">
			<div class="md:w-1/2" data-aos="fade-right">
				<img src="{{ asset('asset/landing/about-illustration.svg') }}" class="w-4/5 mx-auto" alt="about illustration">
			</div>
			<div class="mt-6 md:mt-0 md:w-1/2" data-aos="fade-left">
				<h1 class="title-section text-center text-xl md:text-3xl font-black mb-2 md:mb-5">Apa itu <span>Realita</span></h1>
				<div class="w-4/5 mx-auto text-sm md:text-md">
					<p class="mb-5 text-justify" style="text-indent: 50px">REALITA adalah Rekap Laporan Keuangan Lima Tahunan. Data-data yang disajikan berdasarkan laporan keuangan resmi yang dikeluarkan oleh perusahaan tercatat di Bursa Efek Indonesia. Jadi, selama 5 tahun ke belakang, laporan keungan dari berbagai perusahaan tercatat disajikan di sini.</p>
					<p class="text-justify" style="text-indent: 50px">Dalam REALITA ini banyak fitur menarik yang bisa dianalisis lebih lanjut oleh para investor.</p>
				</div>
			</div>
		</div>
	{{-- End About --}}










	{{-- Feature --}}
		<div id="feature" class="feature section-2 text-center">
			<div class="text-white">
				<h1 class="text-center text-xl md:text-3xl font-black">Fitur di Realita</h1>
			</div>
			<div class="flex flex-col md:flex-row gap-4 my-8 w-full md:w-4/5 justify-center mx-auto">
				<div class="md:w-1/4 bg-white p-8 rounded-xl shadow-lg" data-aos="fade-up" data-aos-delay="200">
					<img src="{{ asset('asset/landing/laporan_keuangan.svg') }}" alt="fitur 1" class="w-4/5 my-5 mx-auto">
					<h3 class="font-bold text-lg md:text-2xl text-second">Laporan Keuangan</h3>
					<p class="text-sm md:text-md">Lorem ipsum dolor sit, amet, consectetur adipisicing elit. Porro esse voluptatem ipsum, vel, ratione quasi.</p>
				</div>
				<div class="md:w-1/4 bg-white p-8 rounded-xl shadow-lg" data-aos="fade-up" data-aos-delay="400">
					<img src="{{ asset('asset/landing/screening_saham.svg') }}" alt="fitur 1" class="w-4/5 my-5 mx-auto">
					<h3 class="font-bold text-lg md:text-2xl text-second">Screening Fundamental</h3>
					<p class="text-sm md:text-md">Lorem ipsum dolor sit, amet, consectetur adipisicing elit. Porro esse voluptatem ipsum, vel, ratione quasi.</p>
				</div>
				<div class="md:w-1/4 bg-white p-8 rounded-xl shadow-lg" data-aos="fade-up" data-aos-delay="600">
					<img src="{{ asset('asset/landing/comparasi.svg') }}" alt="fitur 1" class="w-4/5 my-5 mx-auto">
					<h3 class="font-bold text-lg md:text-2xl text-second">Komparasi Emiten</h3>
					<p class="text-sm md:text-md">Lorem ipsum dolor sit, amet, consectetur adipisicing elit. Porro esse voluptatem ipsum, vel, ratione quasi.</p>
				</div>
				<div class="md:w-1/4 bg-white p-8 rounded-xl shadow-lg" data-aos="fade-up" data-aos-delay="800">
					<img src="{{ asset('asset/landing/comparasi.svg') }}" alt="fitur 1" class="w-4/5 my-5 mx-auto">
					<h3 class="font-bold text-lg md:text-2xl text-second">Realita</h3>
					<p class="text-sm md:text-md">Lorem ipsum dolor sit, amet, consectetur adipisicing elit. Porro esse voluptatem ipsum, vel, ratione quasi.</p>
				</div>
			</div>
		</div>
	{{-- About Feature --}}









	{{-- Benefit --}}
		<div class="benefit px-3 md:px-10 py-20">
			<div class="text-center">
				<h1 class="title-section text-xl md:text-3xl font-black">Manfaat dari <span>realita</span></h1>
			</div>
			<div class="flex flex-col md:flex-row gap-8 mx-auto justify-between w-full md:w-4/5 my-6">
				<div class="w-full md:w-1/2 shadow-lg flex flex-row items-center gap-4 py-3 px-3 md:px-6 mb-2" data-aos="fade-right">
					<img src="{{ asset('asset/logo_warna_bulat.png') }}" class="w-16" alt="sample icon">
					<div>
						<h3 class="font-bold text-md md:text-lg -mb-1">Rasio Lengkap</h3>
						<p class="text-xs md:text-sm">File rekap ini menyajikan puluhan rasio keuangan yang paling dibutuhkan para investor</p>
					</div>
				</div>
				<div class="w-full md:w-1/2 shadow-lg flex flex-row items-center gap-4 py-3 px-3 md:px-6 mb-2" data-aos="fade-left">
					<img src="{{ asset('asset/logo_warna_bulat.png') }}" class="w-16" alt="sample icon">
					<div>
						<h3 class="font-bold text-md md:text-lg -mb-1">Nilai Wajar</h3>
						<p class="text-xs md:text-sm">Analisis fundamental pada akhirnya adalah menakar nilai wajar suatu saham. Di file rekap ini, data nilai wajar disajikan berikut margin of ssafety (MoS) dari harga terkini.</p>
					</div>
				</div>
			</div>
			<div class="flex flex-col md:flex-row gap-8 mx-auto justify-between w-full md:w-4/5 my-6">
				<div class="w-full md:w-1/2 shadow-lg flex flex-row items-center gap-4 py-3 px-3 md:px-6 mb-2" data-aos="fade-right" data-aos-delay="200">
					<img src="{{ asset('asset/logo_warna_bulat.png') }}" class="w-16" alt="sample icon">
					<div>
						<h3 class="font-bold text-md md:text-lg -mb-1">Analisis Perbandingan</h3>
						<p class="text-xs md:text-sm">Bingung memilih saham mana dalam industri atau grup yang sama? Fitur <b class="text-green-400">Comparison</b> menjawab kebutuhan ini dengan fasilitas membandingkan sampai lima saham.</p>
					</div>
				</div>
				<div class="w-full md:w-1/2 shadow-lg flex flex-row items-center gap-4 py-3 px-3 md:px-6 mb-2" data-aos="fade-left" data-aos-delay="200">
					<img src="{{ asset('asset/logo_warna_bulat.png') }}" class="w-16" alt="sample icon">
					<div>
						<h3 class="font-bold text-md md:text-lg -mb-1">Sumber Data Primer</h3>
						<p class="text-xs md:text-sm">Bagi para peminat riset, file rekap ini dientri manual dari sumber data primer laporan keuangan emiten, bukan grabbing data secara online atau sumber berita sekunder lainnya.</p>
					</div>
				</div>
			</div>
		</div>
	{{-- End Benefit --}}









	{{-- Testimoni --}}
		<div id="testimoni" class="testimoni section-2 text-center">
			<div class="text-white">
				<h1 class="text-center text-xl md:text-3xl font-black">Testimoni Pengguna Realita</h1>
			</div>
			<div class="flex flex-col md:flex-row gap-12 my-8 w-full md:w-4/5 justify-center mx-auto">
				<div class="md:w-1/3 bg-white p-8 rounded-xl shadow-lg" data-aos="fade-up" data-aos-delay="200">
					<img src="{{ asset('asset/landing/user.jpg') }}" alt="fitur 1" class="w-4/5 my-5 mx-auto rounded-full">
					<h3 class="font-bold text-lg md:text-2xl text-second">Pengguna Realita</h3>
					<h2 class="text-xs md:text-md italic">Investor Saham</h2>
					<p class="pt-3 text-sm md:text-md">Lorem ipsum dolor sit, amet, consectetur adipisicing elit. Porro esse voluptatem ipsum, vel, ratione quasi.</p>
				</div>
				<div class="md:w-1/3 bg-white p-8 rounded-xl shadow-lg" data-aos="fade-up" data-aos-delay="400">
					<img src="{{ asset('asset/landing/user.jpg') }}" alt="fitur 1" class="w-4/5 my-5 mx-auto rounded-full">
					<h3 class="font-bold text-lg md:text-2xl text-second">Pengguna Realita</h3>
					<h2 class="text-xs md:text-md italic">Investor Saham</h2>
					<p class="pt-3 text-sm md:text-md">Lorem ipsum dolor sit, amet, consectetur adipisicing elit. Porro esse voluptatem ipsum, vel, ratione quasi.</p>
				</div>
				<div class="md:w-1/3 bg-white p-8 rounded-xl shadow-lg" data-aos="fade-up" data-aos-delay="600">
					<img src="{{ asset('asset/landing/user.jpg') }}" alt="fitur 1" class="w-4/5 my-5 mx-auto rounded-full">
					<h3 class="font-bold text-lg md:text-2xl text-second">Pengguna Realita</h3>
					<h2 class="text-xs md:text-md italic">Investor Saham</h2>
					<p class="pt-3 text-sm md:text-md">Lorem ipsum dolor sit, amet, consectetur adipisicing elit. Porro esse voluptatem ipsum, vel, ratione quasi.</p>
				</div>
			</div>
		</div>
	{{-- End Testimoni --}}









	{{-- Price --}}
		<div id="price" class="price px-3 md:px-10 py-20">
			<div class="text-center">
				<h1 class="title-section text-xl md:text-3xl font-black">Harga <span>realita</span></h1>
			</div>
			<div class="flex flex-col md:flex-row gap-6 my-8 w-full md:w-4/5 justify-center mx-auto">
				@foreach($packages as $package)
		            <div class="w-full md:w-1/3 bg-white rounded-xl shadow-lg text-center p-4 py-6" data-aos="fade-up">
		                <h2 class="text-3xl font-bold  text-teal-400">{{ $package->name }}</h2>
		                <p class="text-sm md:text-lg">{{ $package->description }}</p>
		                <div class="my-3">
		                    <h1 class="text-2xl md:text-4xl mt-2 font-bold text-indigo-500">Rp{{ number_format($package->current_price , 0,',','.') }}</h1>
		                    <s class="text-xl text-gray-300">Rp{{ number_format($package->original_price , 0,',','.') }}</s>
		                </div>
		                <ul class="text-left text-sm md:text-lg my-2">
		                    <li class="my-1 flex flex-row">
	                            <img src="{{ asset('asset/dashboard/list-bullets.svg') }}" alt="illustrasi" class="inline-block h-4 md:h-6 transform translate-y-0.5 mr-2">
	                            <span>
	                                Free akses laporan keuangan maksimal {{ $package->report }} emiten / bulan
	                            </span></li>
	                        @if(Str::contains($package->name , 'Gratis'))
	                            <li class="my-1 flex flex-row">
	                                <img src="{{ asset('asset/dashboard/list-bullets.svg') }}" alt="illustrasi" class="inline-block h-4 md:h-6 transform translate-y-0.5 mr-2">
	                                <span>
	                                    Free screening ratio PBV dan PER Emiten
	                                </span>
	                            </li>
	                        @elseif(Str::contains($package->name , 'Expert'))
	                            <li class="my-1 flex flex-row">
	                                <img src="{{ asset('asset/dashboard/list-bullets.svg') }}" alt="illustrasi" class="inline-block h-4 md:h-6 transform translate-y-0.5 mr-2">
	                                <span>
	                                    Free screening fundamental (All ratio)
	                                </span>
	                            </li>
	                        @else
	                            <li class="my-1 flex flex-row">
	                                <img src="{{ asset('asset/dashboard/list-bullets.svg') }}" alt="illustrasi" class="inline-block h-4 md:h-6 transform translate-y-0.5 mr-2">
	                                <span>
	                                    Free screening fundamental (Maksimal {{ $package->screening }} ratio)
	                                </span>
	                            </li>
	                        @endif
	                        <li class="my-1 flex flex-row">
	                            <img src="{{ asset('asset/dashboard/list-bullets.svg') }}" alt="illustrasi" class="inline-block h-4 md:h-6 transform translate-y-0.5 mr-2">
	                            <span>
	                                Free fitur comparasi emiten up to {{ $package->compare }} emiten
	                            </span>
	                        </li>
		                </ul>
		                <div class="flex-row mt-2">
		                	<a href="{{ url('member/package/'.$package->id.'/buy') }}" class="btn text-white bg-green-400 rounded-full py-1 px-4 uppercase font-bold mx-3">Beli</a>
		                </div>
		            </div>
				@endforeach
			</div>
		</div>
	{{-- End Price --}}









	{{-- FAQ --}}
		<div class="faq flex flex-col-reverse md:flex-row px-4 md:px-15 py-20 items-center">
			<div class="md:w-1/2">
				<div class="text-center">
					<h1 class="title-section text-center text-xl md:text-3xl font-black">FAQ <span>Realita</span></h1>
				</div>
				<div class="md:w-4/5 mx-auto mt-4 md:mt-8">
					<div class="shadow-lg rounded py-4 px-8 mb-4" data-aos="fade-up">
						<p class="text-sm md:text-lg">Lorem ipsum dolor sit amet consectetur.</p>
					</div>
					<div class="shadow-lg rounded py-4 px-8 mb-4" data-aos="fade-up">
						<p class="text-sm md:text-lg">Lorem ipsum dolor sit amet consectetur.</p>
					</div>
					<div class="shadow-lg rounded py-4 px-8 mb-4" data-aos="fade-up">
						<p class="text-sm md:text-lg">Lorem ipsum dolor sit amet consectetur.</p>
					</div>
					<div class="shadow-lg rounded py-4 px-8 mb-4" data-aos="fade-up">
						<p class="text-sm md:text-lg">Lorem ipsum dolor sit amet consectetur.</p>
					</div>
				</div>
			</div>
			<div class="mb-10 md:mb-0 md:w-1/2" data-aos="fade-left">
				<img src="{{ asset('asset/landing/faq-illustration.svg') }}" class="mx-auto w-4/5" alt="about illustration">
			</div>
		</div>
	{{-- End FAQ --}}






	{{-- Contact --}}
		<div class="px-4 md:px-0">
			<div class="contact mx-auto md:w-4/5 my-10 flex flex-col md:flex-row shadow-xl p-5 md:p-15 rounded-xl items-center gap-8">
				<div class="md:w-1/2">
					<img src="{{ asset('asset/landing/contact-illustration.svg') }}" alt="illustration" class="mx-auto">
				</div>
				<div class="md:w-1/2 text-center">
					<h1 class="title-section text-xl md:text-3xl font-black">Hubungi <span>kami</span></h1>
					<p class="text-sm md:text-md">Lorem, ipsum dolor sit, amet consectetur adipisicing.</p>
					<form class="mt-6">
						<input type="text" class="form-input border-2 border-gray-300" placeholder="Masukkan Email ....">
						<input type="text" class="form-input border-2 border-gray-300" placeholder="Masukkan Nama ....">
						<textarea name="message" id="message" rows="6" class="form-input border-2 border-gray-300"></textarea>
						<button class="py-1 px-6 text-white uppercase font-bold rounded-full">Kirim</button>
					</form>
				</div>
			</div>
		</div>
	{{-- End Contact --}}





	{{-- footer --}}
		<div class="footer mt-20 border-t-2 border-gray-300 pt-8">
			<div class="text-center">
				<img src="{{ asset('asset/logo_warna.png') }}" alt="logo syariah saham" class="h-20 mx-auto">
			</div>
			<div class="flex flex-col md:flex-row gap-12 px-15 justify-center">
				<div class="md:w-2/4">
					<h2 class="text-lg font-bold">Tentang Kami</h2>
					<p>Syariah Saham adalah komunitas saham syariah pertama di Indonesia. Kami hadir dengan Visi "Memasyarakatkan Saham Syariah dan Mensyariahkan Saham Masyarakat".</p>
					<p>Office : Perkantoran Tanjung Mas Raya, Blok B1 Nomor 44, Tanjung Barat, Jagakarsa, Jakarta Selatan 12530.</p>
				</div>
				<div class="md:w-1/4">
					<h2 class="text-lg font-bold">Layanan</h2>
					<div class="link">
						<a href="{{ url('/member/report') }}">Laporan Keuangan</a>
						<a href="{{ url('/member/screening') }}">Screening Fundamental</a>
						<a href="{{ url('/member/compare') }}">Komparasi Emiten</a>
						<a href="{{ url('/member/compare') }}">Realita</a>
						<a href="{{ route('login') }}">Login</a>
						<a href="{{ route('register') }}">Daftar</a>
					</div>
				</div>
				<div class="md:w-1/4">
					<h2 class="text-lg font-bold">Halaman</h2>
					<div class="link">
						<a href="#about">Apa itu Realita</a>
						<a href="#benefit">Manfaat Realita</a>
						<a href="#feature">Fitur Realita</a>
						<a href="#testimoni">Testimoni</a>
						<a href="#faq">FAQ</a>
					</div>
				</div>
			</div>
		</div>
		<footer class="py-5 px-10 mt-8 text-center">
			<p class="text-xs md:text-sm">&copy; {{ date('Y') }} PT Syariah Saham. All rights reserved.</p>
		</footer>
	{{-- end footer --}}





	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

	<script>
		const btnSidebar = document.getElementById('btnSidebar');
		const sidebar = document.querySelector('aside');
		const menus = document.querySelectorAll('aside a');

		AOS.init({
			// Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
			  offset: 120, // offset (in px) from the original trigger point
			  delay: 0, // values from 0 to 3000, with step 50ms
			  duration: 1000, // values from 0 to 3000, with step 50ms
			  easing: 'ease-out-back', // default easing for AOS animations
		});

		const handleSidebar = () => {
			if(!btnSidebar.classList.contains('active')) {
				btnSidebar.innerHTML = `<svg class="h-10 w-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
				</svg>`;

				btnSidebar.classList.add('active');
				sidebar.classList.add('appear');
			} else {
				btnSidebar.innerHTML = `<svg class="h-10 w-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
				</svg>`;

				btnSidebar.classList.remove('active');
				sidebar.classList.remove('appear');
			}
		} 

		btnSidebar.addEventListener('click' , (e) => {
			handleSidebar();
		})

		menus.forEach(btn => {
			btn.addEventListener('click' , () => {
				handleSidebar();
			})
		})

		window.addEventListener('scroll' , () => {
			if(window.pageYOffset > 150 ) {
				document.querySelector('nav').classList.add('active');
				btnSidebar.classList.add('show')
			} else {
				document.querySelector('nav').classList.remove('active');
				btnSidebar.classList.remove('show')
			}
		})
	</script>



</body>
</html>