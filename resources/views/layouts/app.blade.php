<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="application-name" content="Realita">
        <meta name="title" content="Realita | Laporan Emiten Rekap Lima Tahun">
        <meta name="description" content="REALITA adalah Rekap Laporan Keuangan Lima Tahunan. Data-data yang disajikan berdasarkan laporan keuangan resmi yang dikeluarkan oleh perusahaan tercatat di Bursa Efek Indonesia. Jadi, selama 5 tahun ke belakang, laporan keungan dari berbagai perusahaan tercatat disajikan di sini.">
        <meta name="author" content="PT Syariah Saham Indonesia">
        
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,600;0,700;0,800;0,900;1,400&display=swap" rel="stylesheet">
        <link rel="icon" href="{{ asset('asset/logo_warna_bulat.png') }}">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/chartjs/Chart.css') }}">

        @livewireStyles
        <style>
            button:focus {
                outline: 1px solid #dddddd;
            }
        </style>

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>
    </head>
    <body class="font-sans antialiased bg-gray-100">
        @include('vendor.member.components.sidebar')
        
        <div id="content" class="min-h-screen right-0 fixed bg-gray-100">
            @livewire('navigation-dropdown')

            <!-- Page Content -->
            <main class="overflow-y-auto h-screen pb-20 lg:pb-10 w-full">
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts

        <script src="{{ asset('vendor/chartjs/Chart.js') }}"></script>
        <script>
            const btnSidebar = document.getElementById('btnSidebar');
            const sidebar = document.querySelector('aside.main-sidebar');
            const smallSidebar = document.querySelector('aside.small-sidebar');
            const content = document.getElementById('content');
            const btnCloses = document.querySelectorAll('.btnModalClose');
            const modals = document.querySelectorAll('.modal');

            window.addEventListener('load' , () => {
                modals.forEach(elememt => {
                        elememt.style.opacity = 1;
                        elememt.style.transform = 'translateY(0%)';
                })
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

            btnCloses.forEach(btn => {
                btn.addEventListener('click' , () => {
                    let modal = btn.parentElement.parentElement;
                    modal.style.transform = 'translateY(10%)';
                    modal.style.opacity = 0;
                    setTimeout(() => {
                        modal.parentElement.removeChild(modal);
                    },1000);
                })
            })

            
        </script>
        @yield('script')
    </body>
</html>
