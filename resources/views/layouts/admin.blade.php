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
	<style>
		button:focus {
			outline: 1px solid #dddddd;
		}
	</style>

	@livewireStyles

	<!-- Scripts -->
	<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>
</head>
<body>
	
        @include('vendor.admin.components.sidebar')

	<div id="content" class="min-h-screen right-0 fixed bg-gray-100 w-full" >
	    @livewire('navigation-dropdown')

	    <!-- Page Content -->
	    <main class="overflow-y-auto h-screen px-3 md:px-0 md:pl-10 pt-5 pb-20 lg:pb-10 w-full">
			@yield('body')
	    </main>
	</div>




	@livewireScripts

	<script src="{{ asset('vendor/chartjs/Chart.js') }}"></script>
	 <script>
	    const modals       = document.querySelectorAll('.modal');
	    const badgesDelete = document.querySelectorAll('button.badge-delete');
	    const btnModals    = document.querySelectorAll('.btn-modal');

	    const openModal = (modal) => {
	        modal.style.pointerEvents = 'all';
	        modal.style.transform = 'translate(50% , 0)';
	        modal.style.opacity = 1;
	    }

	    const closeModal = (modal) => {
	        modal.style.transform = 'translate(50% , -20%)';
	        modal.style.opacity = 0;
	        setTimeout(() => {
	            modal.style.pointerEvents = 'none';
	        },200);
	    }

	    badgesDelete.forEach(btn => {
	        btn.addEventListener('click' , () => {
	            let action = btn.getAttribute('data-action');
	            let modal = document.getElementById('modal-delete');
	            modal.setAttribute('action' , action);
	            openModal(modal);
	        })
	    })

	    btnModals.forEach(btn => {
	        btn.addEventListener('click' , () => {
	            let target = btn.getAttribute('data-target');
	            let element = document.querySelector(`.modal${target}`);
	            openModal(element);
	        });
	    })

	    modals.forEach(modal => {
	        let btnClose = modal.querySelector('button.close');
	        btnClose.addEventListener('click' , () => {
	            closeModal(modal);
	        })
	    });
	</script>
	<script>
	    const btnSidebar = document.getElementById('btnSidebar');
	    const sidebar = document.querySelector('aside.main-sidebar');
	    const smallSidebar = document.querySelector('aside.small-sidebar');
	    const content = document.getElementById('content');

		window.addEventListener('load' , () => {
			sidebar.style.transition = '1.2s ease-in-out';
			content.style.transition = '1.35s ease-in-out';
		})
		
	    let status = window.sessionStorage.getItem('sidebar');
	    
	    if(!status) { window.sessionStorage.setItem('sidebar' , 'active') }
		if(window.innerWidth <= 600) {
			window.sessionStorage.setItem('sidebar' , 'nonactive');
		}
	    status = window.sessionStorage.getItem('sidebar');
	    if(status === 'nonactive') {
	        smallSidebar.style.transitionDelay = '1.2s';
	        smallSidebar.classList.remove('invisible');
	        btnSidebar.style.transform = "rotate(-540deg)";
	        content.classList.add('md:pl-10');
			content.classList.add('w-full');
			content.classList.remove('md:w-3/4');
			sidebar.classList.add('invisible');
	    } else {
	        smallSidebar.style.transitionDelay = '1.2s';
	        smallSidebar.classList.add('invisible');
	        content.classList.remove('md:pl-10');
	        content.classList.add('md:w-3/4');
			content.classList.remove('w-full');
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
			content.classList.toggle('w-full');
	    });

	    
	</script>
	@yield('script')

</body>
</html>