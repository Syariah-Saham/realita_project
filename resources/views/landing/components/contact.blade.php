<div class="px-4 md:px-0">
	<div class="contact mx-auto md:w-4/5 my-10 flex flex-col md:flex-row shadow-xl p-5 md:p-15 rounded-xl items-center gap-8">
		<div class="md:w-1/2">
			<img src="{{ asset('asset/landing/contact-illustration.svg') }}" alt="Hubungi Realita Syariah Saham Indonesia" class="mx-auto">
		</div>
		<div class="md:w-1/2 text-center">
			<h1 class="title-section text-xl md:text-3xl font-black">Hubungi <span style="text-transform: capitalize;">kami</span></h1>
			<form class="mt-6" action="{{ url('/contact') }}" method="post">
				@csrf
				<input type="text" name="email" class="form-input border-2 border-gray-300" placeholder="Masukkan Email ....">
				<input type="text" name="name" class="form-input border-2 border-gray-300" placeholder="Masukkan Nama ....">
				<textarea name="message" id="message" rows="6" class="form-input border-2 border-gray-300"></textarea>
				<button class="py-1 px-6 text-white uppercase font-bold rounded-full">Kirim</button>
			</form>
		</div>
	</div>
</div>