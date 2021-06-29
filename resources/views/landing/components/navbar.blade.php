<nav class="navbar z-30 shadow-md h-12 w-full fixed bg-white flex flex-row justify-between items-center px-10">
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