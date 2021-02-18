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

	<div id="content" class="min-h-screen w-full right-0 fixed bg-gray-100"  style="transition: 1.35s;transition-timing-function: ease-in-out;">
	    @livewire('navigation-dropdown')

	    <!-- Page Content -->
	    <main class="overflow-y-auto h-screen px-1 md:px-4 pt-4 pb-20">
			@yield('body')
	    </main>
	</div>




	@livewireScripts

	<script src="{{ asset('vendor/chartjs/Chart.js') }}"></script>
	<script>
	    const btnSidebar = document.getElementById('btnSidebar');
	    const sidebar = document.querySelector('aside.main-sidebar');
	    const smallSidebar = document.querySelector('aside.small-sidebar');
	    const content = document.getElementById('content');

	    let status = window.sessionStorage.getItem('sidebar');
	    
	    if(!status) { window.sessionStorage.setItem('sidebar' , 'active') }
	    status = window.sessionStorage.getItem('sidebar');
	    if(status === 'nonactive') {
	        smallSidebar.style.transitionDelay = '1.2s';
	        smallSidebar.classList.remove('invisible');
	        btnSidebar.style.transform = "rotate(-540deg)";
	        content.classList.add('md:pl-10');
	        content.classList.remove('md:w-3/4');
	        sidebar.classList.add('invisible');
	    } else {
	        smallSidebar.style.transitionDelay = '1.2s';
	        smallSidebar.classList.add('invisible');
	        content.classList.remove('md:pl-10');
	        content.classList.add('md:w-3/4');
	        sidebar.style.transition = '0s;'
	        sidebar.classList.remove('invisible');
	        setTimeout(() => {
	            sidebar.style.transition = '1.2s;'
	        } , 2000);
	    }

	    btnSidebar.addEventListener('click' , () => {
	        if(!smallSidebar.classList.contains('invisible')) {
	            smallSidebar.style.transitionDelay = '0s';
	            btnSidebar.style.transform = "rotate(0deg)";
	            window.sessionStorage.setItem('sidebar' , 'active');
	        } else {
	            smallSidebar.style.transitionDelay = '1.2s';
	            btnSidebar.style.transform = "rotate(-540deg)";
	            window.sessionStorage.setItem('sidebar' , 'nonactive');
	        }
	        content.classList.toggle('md:pl-10');
	        sidebar.classList.toggle('invisible');
	        smallSidebar.classList.toggle('invisible');
	        content.classList.toggle('md:w-3/4');
	    });

	    
	</script>
	@yield('script')

</body>
</html>