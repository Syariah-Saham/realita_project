<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Realita </title>

	<link rel="stylesheet" href="{{ asset('/css/app.css') }}">
	<link rel="shorcut icon" href="{{ asset('/asset/logo_warna.png') }}">

	<style>
		html {
			scroll-behavior: smooth;
		}

		body {
			font-family: 'Nunito' , 'Arial' , 'Helvetica' , sans-serif;
			color: #60686d;
			scroll-behavior: smooth;
		}

		.banner {
			background-image: url('asset/landing/bg-banner.svg');
			background-size: cover;
			background-repeat: no-repeat;
		}

		.banner a:hover {
			opacity: .8;
		}

		.text-second {
			color: #76c23a;
		}

		button {
			background-color: #76c23a;
		}

		.cost h2 {
			color: #c8c900;
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
	</style>
</head>
<body id="home">


	{{-- Banner --}}
	<div class="banner text-white">
		<nav class="h-20 px-10 flex flex-row justify-between items-center">
			<div class="w-1/3">
				<img class="h-16" src="{{ asset('/asset/logo_putih.png') }}" alt="logo syariah saham">
			</div>
			<div class="w-2/3 justify-end flex gap-10">
				<a class="font-bold text-xl" href="#about">REALITA</a>
				<a class="font-bold text-xl" href="#feature">FITUR</a>
				<a class="font-bold text-xl" href="#price">HARGA</a>
				<a class="font-bold text-xl" href="#testimoni">TESTIMONI</a>
				<a class="font-bold text-xl" href="{{ url('/login') }}">MASUK</a>
				<a class="font-bold text-xl" href="{{ url('register') }}">DAFTAR</a>
			</div>
		</nav>
		<div class="flex flex-row px-10 py-28">
			<div class="w-1/2">
				<h1 class="text-6xl font-black">REALITA</h1>
				<h2 class="text-4xl font-bold">SOLUSI INVESTASI</h2>
				<p class="text-lg">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatibus quibusdam quam molestias, vel, error perspiciatis. Necessitatibus ut corrupti libero impedit maxime dignissimos voluptatibus!</p>
			</div>
			<div class="w-1/2">
				<img src="{{ asset('asset/landing/banner-illustration.svg') }}" alt="banner illustration">
			</div>
		</div>
	</div>
	{{-- end bannner --}}
















	{{-- About --}}
		<div id="about" class="about flex flex-row px-15 py-20 items-center">
			<div class="w-1/2">
				<img src="{{ asset('asset/landing/about-illustration.svg') }}" class="mx-auto" alt="about illustration">
			</div>
			<div class="w-1/2">
				<h1 class="title-section text-center text-3xl font-black mb-5">Apa itu <span>Realita</span></h1>
				<div class="w-4/5 mx-auto">
					<p class="mb-5 text-justify" style="text-indent: 50px">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ducimus doloremque veniam sint tenetur deserunt dicta quae, odit voluptatibus commodi rem voluptatem quia placeat reprehenderit explicabo fugit debitis perferendis similique dolor.</p>
					<p class="text-justify" style="text-indent: 50px">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Incidunt nihil, unde amet sed nostrum atque mollitia quasi iusto natus rem accusantium sit modi voluptatum accusamus. Perferendis aliquid dicta nisi impedit!</p>
				</div>
			</div>
		</div>
	{{-- End About --}}










	{{-- Feature --}}
		<div id="feature" class="feature section-2 text-center">
			<div class="text-white">
				<h1 class="text-center text-3xl font-black">Fitur di Realita</h1>
				<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos, in?</p>
			</div>
			<div class="flex flex-row gap-12 my-8 w-4/5 justify-center mx-auto">
				<div class="w-1/3 bg-white p-8 rounded shadow-lg">
					<img src="{{ asset('asset/landing/fitur-1.jpg') }}" alt="fitur 1" class="w-4/5 my-5 mx-auto">
					<h3 class="font-bold text-2xl text-second">Laporan Keuangan</h3>
					<p>Lorem ipsum dolor sit, amet, consectetur adipisicing elit. Porro esse voluptatem ipsum, vel, ratione quasi.</p>
				</div>
				<div class="w-1/3 bg-white p-8 rounded shadow-lg">
					<img src="{{ asset('asset/landing/fitur-2.jpg') }}" alt="fitur 1" class="w-4/5 my-5 mx-auto">
					<h3 class="font-bold text-2xl text-second">Screener Fundamental</h3>
					<p>Lorem ipsum dolor sit, amet, consectetur adipisicing elit. Porro esse voluptatem ipsum, vel, ratione quasi.</p>
				</div>
				<div class="w-1/3 bg-white p-8 rounded shadow-lg">
					<img src="{{ asset('asset/landing/fitur-3.jpg') }}" alt="fitur 1" class="w-4/5 my-5 mx-auto">
					<h3 class="font-bold text-2xl text-second">Comparasion</h3>
					<p>Lorem ipsum dolor sit, amet, consectetur adipisicing elit. Porro esse voluptatem ipsum, vel, ratione quasi.</p>
				</div>
			</div>
		</div>
	{{-- About Feature --}}









	{{-- Benefit --}}
		<div class="benefit px-10 py-20">
			<div class="text-center">
				<h1 class="title-section text-3xl font-black">Manfaat dari <span>realita</span></h1>
				<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Incidunt, nemo?</p>
			</div>
			<div class="flex flex-row gap-8 mx-auto justify-between w-4/5 my-6">
				<div class="w-1/2">
					<div class="shadow-lg flex flex-row items-center gap-4 py-3 px-6 mb-2">
						<img src="{{ asset('asset/landing/icon_sample.jpg') }}" class="w-16" alt="sample icon">
						<div>
							<h3 class="font-bold text-lg -mb-1">Lorem, ipsum, dolor.</h3>
							<p class="text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
						</div>
					</div>
					<div class="shadow-lg flex flex-row items-center gap-4 py-3 px-6 mb-2">
						<img src="{{ asset('asset/landing/icon_sample.jpg') }}" class="w-16" alt="sample icon">
						<div>
							<h3 class="font-bold text-lg -mb-1">Lorem, ipsum, dolor.</h3>
							<p class="text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
						</div>
					</div>
					<div class="shadow-lg flex flex-row items-center gap-4 py-3 px-6 mb-2">
						<img src="{{ asset('asset/landing/icon_sample.jpg') }}" class="w-16" alt="sample icon">
						<div>
							<h3 class="font-bold text-lg -mb-1">Lorem, ipsum, dolor.</h3>
							<p class="text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
						</div>
					</div>
					<div class="shadow-lg flex flex-row items-center gap-4 py-3 px-6 mb-2">
						<img src="{{ asset('asset/landing/icon_sample.jpg') }}" class="w-16" alt="sample icon">
						<div>
							<h3 class="font-bold text-lg -mb-1">Lorem, ipsum, dolor.</h3>
							<p class="text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
						</div>
					</div>
				</div>
				<div class="w-1/2">
					<div class="shadow-lg flex flex-row items-center gap-4 py-3 px-6 mb-2">
						<img src="{{ asset('asset/landing/icon_sample.jpg') }}" class="w-16" alt="sample icon">
						<div>
							<h3 class="font-bold text-lg -mb-1">Lorem, ipsum, dolor.</h3>
							<p class="text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
						</div>
					</div>
					<div class="shadow-lg flex flex-row items-center gap-4 py-3 px-6 mb-2">
						<img src="{{ asset('asset/landing/icon_sample.jpg') }}" class="w-16" alt="sample icon">
						<div>
							<h3 class="font-bold text-lg -mb-1">Lorem, ipsum, dolor.</h3>
							<p class="text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
						</div>
					</div>
					<div class="shadow-lg flex flex-row items-center gap-4 py-3 px-6 mb-2">
						<img src="{{ asset('asset/landing/icon_sample.jpg') }}" class="w-16" alt="sample icon">
						<div>
							<h3 class="font-bold text-lg -mb-1">Lorem, ipsum, dolor.</h3>
							<p class="text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
						</div>
					</div>
					<div class="shadow-lg flex flex-row items-center gap-4 py-3 px-6 mb-2">
						<img src="{{ asset('asset/landing/icon_sample.jpg') }}" class="w-16" alt="sample icon">
						<div>
							<h3 class="font-bold text-lg -mb-1">Lorem, ipsum, dolor.</h3>
							<p class="text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	{{-- End Benefit --}}









	{{-- Testimoni --}}
		<div id="testimoni" class="testimoni section-2 text-center">
			<div class="text-white">
				<h1 class="text-center text-3xl font-black">Testimoni Pengguna Realita</h1>
				<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos, in?</p>
			</div>
			<div class="flex flex-row gap-12 my-8 w-4/5 justify-center mx-auto">
				<div class="w-1/3 bg-white p-8 rounded shadow-lg">
					<img src="{{ asset('asset/landing/user.jpg') }}" alt="fitur 1" class="w-4/5 my-5 mx-auto rounded-full">
					<h3 class="font-bold text-2xl text-second">Pengguna Realita</h3>
					<h2 class="italic">Investor Saham</h2>
					<p class="pt-3">Lorem ipsum dolor sit, amet, consectetur adipisicing elit. Porro esse voluptatem ipsum, vel, ratione quasi.</p>
				</div>
				<div class="w-1/3 bg-white p-8 rounded shadow-lg">
					<img src="{{ asset('asset/landing/user.jpg') }}" alt="fitur 1" class="w-4/5 my-5 mx-auto rounded-full">
					<h3 class="font-bold text-2xl text-second">Pengguna Realita</h3>
					<h2 class="italic">Investor Saham</h2>
					<p class="pt-3">Lorem ipsum dolor sit, amet, consectetur adipisicing elit. Porro esse voluptatem ipsum, vel, ratione quasi.</p>
				</div>
				<div class="w-1/3 bg-white p-8 rounded shadow-lg">
					<img src="{{ asset('asset/landing/user.jpg') }}" alt="fitur 1" class="w-4/5 my-5 mx-auto rounded-full">
					<h3 class="font-bold text-2xl text-second">Pengguna Realita</h3>
					<h2 class="italic">Investor Saham</h2>
					<p class="pt-3">Lorem ipsum dolor sit, amet, consectetur adipisicing elit. Porro esse voluptatem ipsum, vel, ratione quasi.</p>
				</div>
			</div>
		</div>
	{{-- End Testimoni --}}









	{{-- Price --}}
		<div id="price" class="price px-10 py-20">
			<div class="text-center">
				<h1 class="title-section text-3xl font-black">Harga <span>realita</span></h1>
				<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Incidunt, nemo?</p>
			</div>
			<div class="flex flex-row gap-12 my-8 w-4/5 justify-center mx-auto">
				<div class="w-1/3 bg-white p-8 rounded shadow-lg">
					<div class="text-center">
						<h3 class="font-bold text-2xl text-second">Paket Gratis</h3>
						<h2>Lorem, ipsum dolor sit amet.</h2>
						<div class="cost flex flex-row justify-center items-center gap-2">
							<p>Rp</p>
							<h2 class="font-bold text-5xl">1.000.000</h2>
						</div>
					</div>
					<ul class="pt-3">
						<li class="flex flex-row gap-2 items-center mb-3">
							<img src="{{ asset('asset/landing/list-icon.svg') }}" class="h-6" alt="icon list">
							<p>Lorem ipsum dolor sit amet.</p>
						</li>
						<li class="flex flex-row gap-2 items-center mb-3">
							<img src="{{ asset('asset/landing/list-icon.svg') }}" class="h-6" alt="icon list">
							<p>Lorem ipsum dolor sit amet.</p>
						</li>
						<li class="flex flex-row gap-2 items-center mb-3">
							<img src="{{ asset('asset/landing/list-icon.svg') }}" class="h-6" alt="icon list">
							<p>Lorem ipsum dolor sit amet.</p>
						</li>
						<li class="flex flex-row gap-2 items-center mb-3">
							<img src="{{ asset('asset/landing/list-icon.svg') }}" class="h-6" alt="icon list">
							<p>Lorem ipsum dolor sit amet.</p>
						</li>
						<li class="flex flex-row gap-2 items-center mb-3">
							<img src="{{ asset('asset/landing/list-icon.svg') }}" class="h-6" alt="icon list">
							<p>Lorem ipsum dolor sit amet.</p>
						</li>
						<li class="flex flex-row gap-2 items-center mb-3">
							<img src="{{ asset('asset/landing/list-icon.svg') }}" class="h-6" alt="icon list">
							<p>Lorem ipsum dolor sit amet.</p>
						</li>
						<li class="flex flex-row gap-2 items-center mb-3">
							<img src="{{ asset('asset/landing/list-icon.svg') }}" class="h-6" alt="icon list">
							<p>Lorem ipsum dolor sit amet.</p>
						</li>
					</ul>
				</div>
				<div class="w-1/3 bg-white p-8 rounded shadow-lg">
					<div class="text-center">
						<h3 class="font-bold text-2xl text-second">Paket Gratis</h3>
						<h2>Lorem, ipsum dolor sit amet.</h2>
						<div class="cost flex flex-row justify-center items-center gap-2">
							<p>Rp</p>
							<h2 class="font-bold text-5xl">1.000.000</h2>
						</div>
					</div>
					<ul class="pt-3">
						<li class="flex flex-row gap-2 items-center mb-3">
							<img src="{{ asset('asset/landing/list-icon.svg') }}" class="h-6" alt="icon list">
							<p>Lorem ipsum dolor sit amet.</p>
						</li>
						<li class="flex flex-row gap-2 items-center mb-3">
							<img src="{{ asset('asset/landing/list-icon.svg') }}" class="h-6" alt="icon list">
							<p>Lorem ipsum dolor sit amet.</p>
						</li>
						<li class="flex flex-row gap-2 items-center mb-3">
							<img src="{{ asset('asset/landing/list-icon.svg') }}" class="h-6" alt="icon list">
							<p>Lorem ipsum dolor sit amet.</p>
						</li>
						<li class="flex flex-row gap-2 items-center mb-3">
							<img src="{{ asset('asset/landing/list-icon.svg') }}" class="h-6" alt="icon list">
							<p>Lorem ipsum dolor sit amet.</p>
						</li>
						<li class="flex flex-row gap-2 items-center mb-3">
							<img src="{{ asset('asset/landing/list-icon.svg') }}" class="h-6" alt="icon list">
							<p>Lorem ipsum dolor sit amet.</p>
						</li>
						<li class="flex flex-row gap-2 items-center mb-3">
							<img src="{{ asset('asset/landing/list-icon.svg') }}" class="h-6" alt="icon list">
							<p>Lorem ipsum dolor sit amet.</p>
						</li>
						<li class="flex flex-row gap-2 items-center mb-3">
							<img src="{{ asset('asset/landing/list-icon.svg') }}" class="h-6" alt="icon list">
							<p>Lorem ipsum dolor sit amet.</p>
						</li>
					</ul>
				</div>
				<div class="w-1/3 bg-white p-8 rounded shadow-lg">
					<div class="text-center">
						<h3 class="font-bold text-2xl text-second">Paket Gratis</h3>
						<h2>Lorem, ipsum dolor sit amet.</h2>
						<div class="cost flex flex-row justify-center items-center gap-2">
							<p>Rp</p>
							<h2 class="font-bold text-5xl">1.000.000</h2>
						</div>
					</div>
					<ul class="pt-3">
						<li class="flex flex-row gap-2 items-center mb-3">
							<img src="{{ asset('asset/landing/list-icon.svg') }}" class="h-6" alt="icon list">
							<p>Lorem ipsum dolor sit amet.</p>
						</li>
						<li class="flex flex-row gap-2 items-center mb-3">
							<img src="{{ asset('asset/landing/list-icon.svg') }}" class="h-6" alt="icon list">
							<p>Lorem ipsum dolor sit amet.</p>
						</li>
						<li class="flex flex-row gap-2 items-center mb-3">
							<img src="{{ asset('asset/landing/list-icon.svg') }}" class="h-6" alt="icon list">
							<p>Lorem ipsum dolor sit amet.</p>
						</li>
						<li class="flex flex-row gap-2 items-center mb-3">
							<img src="{{ asset('asset/landing/list-icon.svg') }}" class="h-6" alt="icon list">
							<p>Lorem ipsum dolor sit amet.</p>
						</li>
						<li class="flex flex-row gap-2 items-center mb-3">
							<img src="{{ asset('asset/landing/list-icon.svg') }}" class="h-6" alt="icon list">
							<p>Lorem ipsum dolor sit amet.</p>
						</li>
						<li class="flex flex-row gap-2 items-center mb-3">
							<img src="{{ asset('asset/landing/list-icon.svg') }}" class="h-6" alt="icon list">
							<p>Lorem ipsum dolor sit amet.</p>
						</li>
						<li class="flex flex-row gap-2 items-center mb-3">
							<img src="{{ asset('asset/landing/list-icon.svg') }}" class="h-6" alt="icon list">
							<p>Lorem ipsum dolor sit amet.</p>
						</li>
					</ul>
				</div>
			</div>
		</div>
	{{-- End Price --}}









	{{-- FAQ --}}
		<div class="faq flex flex-row px-15 py-20 items-center">
			<div class="w-1/2">
				<div class="text-center">
					<h1 class="title-section text-center text-3xl font-black">FAQ <span>Realita</span></h1>
					<p>Lorem, ipsum dolor sit, amet consectetur adipisicing.</p>
				</div>
				<div class="w-4/5 mx-auto mt-8">
					<div class="shadow-lg rounded py-4 px-8 mb-4">
						<p>Lorem ipsum dolor sit amet consectetur.</p>
					</div>
					<div class="shadow-lg rounded py-4 px-8 mb-4">
						<p>Lorem ipsum dolor sit amet consectetur.</p>
					</div>
					<div class="shadow-lg rounded py-4 px-8 mb-4">
						<p>Lorem ipsum dolor sit amet consectetur.</p>
					</div>
					<div class="shadow-lg rounded py-4 px-8 mb-4">
						<p>Lorem ipsum dolor sit amet consectetur.</p>
					</div>
				</div>
			</div>
			<div class="w-1/2">
				<img src="{{ asset('asset/landing/faq-illustration.svg') }}" class="mx-auto" alt="about illustration">
			</div>
		</div>
	{{-- End FAQ --}}






	{{-- Contact --}}
		<div class="contact mx-auto w-4/5 my-10 flex flex-row shadow-xl p-15 items-center gap-8">
			<div class="w-1/2">
				<img src="{{ asset('asset/landing/contact-illustration.svg') }}" alt="illustration" class="mx-auto">
			</div>
			<div class="w-1/2 text-center">
				<h1 class="title-section text-3xl font-black">Hubungi <span>kami</span></h1>
				<p>Lorem, ipsum dolor sit, amet consectetur adipisicing.</p>
				<form class="mt-6">
					<input type="text" class="form-input border-2 border-gray-300" placeholder="Masukkan Email ....">
					<input type="text" class="form-input border-2 border-gray-300" placeholder="Masukkan Nama ....">
					<textarea name="message" id="message" rows="6" class="form-input border-2 border-gray-300"></textarea>
					<button class="py-1 px-6 text-white uppercase font-bold rounded-full">Kirim</button>
				</form>
			</div>
		</div>
	{{-- End Contact --}}





	{{-- footer --}}
		<div class="footer mt-20 border-t-2 border-gray-300 pt-8">
			<div class="text-center">
				<img src="{{ asset('asset/logo_warna.png') }}" alt="logo syariah saham" class="h-20 mx-auto">
			</div>
			<div class="flex flex-row gap-6 px-15 justify-center">
				<div class="w-1/3">
					<h2 class="text-lg font-bold">Tentang Kami</h2>
					<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aperiam, error.</p>
				</div>
				<div class="w-1/3">
					<h2 class="text-lg font-bold">Fitur</h2>
					<div class="link">
						<a href="">Apa itu Realita</a>
						<a href="">Manfaat Realita</a>
						<a href="">Fitur Realita</a>
						<a href="">Testimoni</a>
						<a href="">FAQ</a>
					</div>
				</div>
				<div class="w-1/3">
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
		<footer class="py-5 px-10 mt-8">
			<p class="text-sm">&copy; 2021 Rekap Saham. All rights reserved.</p>
		</footer>
	{{-- end footer --}}







</body>
</html>