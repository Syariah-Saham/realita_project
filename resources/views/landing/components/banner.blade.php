<div class="banner text-white pb-40 lg:pb-20">
	<header class="h-20 hidden px-10 md:flex flex-row justify-between items-center">
		<div class="w-1/3">
			<img class="h-16" src="{{ asset('/asset/logo_putih.png') }}" alt="Realita Syariah Saham Indonesia">
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
			<h2 class="text-xl md:text-4xl font-bold">Solusi Nyata Investasi Anda</h2>
			<p class="font-light mt-4 text-sm md:text-lg">Sejak kami meluncurkan produk laporan keuangan pertama kali di tahun 2016, alhamdulillah sudah banyak investor menggunakan data kami, baik untuk kepentingan analisis maupun sekedar tugas kuliah. Fitur terbaru dari kami menyediakan data laporan keuangan 5 tahun terakhir. Semoga produk ini dapat membantu para investor dalam menganalisis keuangan suatu perusahaan.</p>
		</div>
		<div class="w-full pt-10 md:pt-0 md:w-1/2" data-aos="fade-left">
			<img src="{{ asset('asset/landing/banner-illustration.svg') }}" alt="Banner Realita Syariah Saham Indonesia">
		</div>
	</div>
</div>