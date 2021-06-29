<div class="footer mt-20 border-t-2 text-sm md:text-base border-gray-300 pt-8">
	<div class="text-center">
		<img src="{{ asset('asset/logo_warna.png') }}" alt="logo syariah saham" class="h-20 mx-auto">
	</div>
	<div class="flex flex-col md:flex-row gap-5 md:gap-12 px-6 md:px-15 justify-center">
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
	<p class="text-xs md:text-sm">&copy;Copyright {{ date('Y') }} by PT. Syariah Saham Indonesia. All rights reserved.</p>
</footer>