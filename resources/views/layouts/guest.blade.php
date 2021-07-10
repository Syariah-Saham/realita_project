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

        <link rel="shorcut icon" href="{{ asset('/asset/logo_warna_bulat.png') }}">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>
    </head>
        <div class="flex flex-col md:flex-row items-center h-screen">
            <div class="w-full hidden md:w-3/5 md:h-screen md:flex items-center" style="background: #ecfeff;">
                <img src="{{ asset('asset/auth/auth-illustration.svg') }}" alt="illustrasi" class="w-3/4 mx-auto">
            </div>

            <div class="font-sans pt-6 md:pt-2 text-gray-900 antialiased w-full md:w-2/5 md:h-screen">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
