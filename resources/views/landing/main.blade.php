<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="application-name" content="Realita">
	<meta name="title" content="Realita | Laporan Emiten Rekap Lima Tahun">
	<meta name="description" content="REALITA adalah Rekap Laporan Keuangan Lima Tahunan. Data-data yang disajikan berdasarkan laporan keuangan resmi yang dikeluarkan oleh perusahaan tercatat di Bursa Efek Indonesia. Jadi, selama 5 tahun ke belakang, laporan keungan dari berbagai perusahaan tercatat disajikan di sini.">
	<meta name="author" content="PT Syariah Saham Indonesia">
	<title>Realita | Laporan Emiten Rekap Lima Tahun</title>

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
		@include('landing.components.navbar')
	{{-- End Navbar --}}




	{{-- Sidebar --}}
		@include('landing.components.sidebar')
	{{-- End Sidebar --}}




	{{-- Banner --}}
		@include('landing.components.banner')
	{{-- end bannner --}}
















	{{-- About --}}
		@include('landing.components.about')
	{{-- End About --}}










	{{-- Feature --}}
		@include('landing.components.feature')
	{{-- About Feature --}}









	{{-- Benefit --}}
		@include('landing.components.benefit')
	{{-- End Benefit --}}









	{{-- Testimoni --}}
		@include('landing.components.testimoni')
	{{-- End Testimoni --}}









	{{-- Price Package --}}
		@include('landing.components.package')
	{{-- End Price --}}









	{{-- FAQ --}}
		@include('landing.components.faq')
	{{-- End FAQ --}}






	{{-- Contact --}}
		@include('landing.components.contact')
	{{-- End Contact --}}





	{{-- footer --}}
		@include('landing.components.footer')
	{{-- end footer --}}





	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<script src="{{ asset('js/landing.js') }}"></script>



</body>
</html>