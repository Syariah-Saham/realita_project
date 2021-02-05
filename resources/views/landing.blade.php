<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Realita </title>

	<link rel="stylesheet" href="{{ asset('/css/app.css') }}">

	<style>
		body {
			font-family: 'Nunito' , 'Arial' , 'Helvetica' , sans-serif;
			color: #60686d;
		}

		.banner {
			background-image: url('asset/landing/bg-banner.svg');
			background-size: cover;
			background-repeat: no-repeat;
		}

		.text-second {
			color: #76c23a;
		}

		.title-section span {
			color: #76c23a;
			text-transform: uppercase;
		}

		.section-2 {
			background-image: url('asset/landing/bg-section.svg');
			background-size: cover;
			background-repeat: no-repeat;
			padding: 50px 15px;
			min-height: 300px;
		}
	</style>
</head>
<body>


	{{-- Banner --}}
	<div class="banner text-white">
		<nav class="h-20 px-10 flex flex-row justify-between items-center">
			<div class="w-1/3">
				<img class="h-16" src="{{ asset('/asset/logo_putih.png') }}" alt="logo syariah saham">
			</div>
			<div class="w-2/3 justify-end flex gap-10">
				<a class="font-bold text-xl" href="">REALITA</a>
				<a class="font-bold text-xl" href="">FITUR</a>
				<a class="font-bold text-xl" href="">HARGA</a>
				<a class="font-bold text-xl" href="">TESTIMONI</a>
				<a class="font-bold text-xl" href="">MASUK</a>
				<a class="font-bold text-xl" href="">DAFTAR</a>
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
		<div class="about flex flex-row px-15 py-20 items-center">
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
		<div class="feature section-2 text-center">
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










</body>
</html>