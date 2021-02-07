<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,600;0,700;0,800;0,900;1,400&display=swap" rel="stylesheet">
	<link rel="icon" href="{{ asset('asset/logo_warna_bulat.png') }}">


	<!-- Styles -->
	<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
	<link rel="stylesheet" href="{{ asset('vendor/chartjs/Chart.css') }}">

	@livewireStyles

	<!-- Scripts -->
	<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>
</head>
<body>
	
        @include('vendor.admin.components.sidebar')

	<div class="min-h-screen w-full md:w-3/4 right-0 fixed bg-gray-100">
	    @livewire('navigation-dropdown')

	    <!-- Page Content -->
	    <main class="overflow-y-auto h-screen px-4">
			@yield('body')
	    </main>
	</div>




	@livewireScripts

	<script src="{{ asset('vendor/chartjs/Chart.js') }}"></script>

	@yield('script')

</body>
</html>