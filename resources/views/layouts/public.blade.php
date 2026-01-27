<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    {{-- Dynamic Meta Tags for SEO --}}
    <title>@yield('meta_title', 'Masjid Merah Baiturrahman - Sistem Informasi Manajemen')</title>
    <meta name="description" content="@yield('meta_description', 'Sistem Informasi Manajemen Masjid Merah Baiturrahman. Menjadi yayasan Islam profesional dan terpercaya yang melayani umat di bidang keagamaan dan sosial.')">
    <meta name="keywords" content="@yield('meta_keywords', 'masjid merah, baiturrahman, depok, mekar jaya, sistem informasi masjid, kegiatan masjid, keuangan masjid')">
    <meta name="author" content="Masjid Merah Baiturrahman">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="@yield('canonical_url', url()->current())">

    {{-- Open Graph Tags (Facebook) --}}
    <meta property="og:site_name" content="Masjid Merah Baiturrahman">
    <meta property="og:title" content="@yield('og_title', 'Masjid Merah Baiturrahman')">
    <meta property="og:description" content="@yield('og_description', 'Sistem Informasi Manajemen Masjid Merah Baiturrahman')">
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="@yield('og_image', asset('images/hero-masjid.jpg'))">
    <meta property="og:locale" content="id_ID">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('meta_title', 'Masjid Merah Baiturrahman')">
    <meta name="twitter:description" content="@yield('meta_description', 'Sistem Informasi Manajemen Masjid Merah Baiturrahman')">
    <meta name="twitter:image" content="@yield('og_image', asset('images/hero-masjid.jpg'))">

    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('images/logo-masjid.png') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/logo-masjid.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo-masjid.png') }}">

    {{-- CSS Libraries --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.cdnfonts.com/css/gotham" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">

    {{-- Custom Styles --}}
    @include('layouts.public-styles')
    @stack('styles')
</head>
<body>
    <div id="preloader">
        <div class="spinner"></div>
    </div>

    <div class="page-transition">
    
    @include('layouts.public-navbar')

    @yield('content')

    @include('layouts.public-footer')
    
    </div>

    {{-- JavaScript Libraries --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Custom Scripts --}}
    @include('layouts.public-scripts')
    @stack('scripts')
</body>
</html>
