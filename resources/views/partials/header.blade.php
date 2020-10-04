<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dinas Perumahan dan Pemukiman Kabupaten Banjar</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/images/favicon.ico') }}">

    <!-- CSS
        ============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="{{ asset('frontend/css/fontawesome.css') }}">
    <!-- Flaticon -->
    <link rel="stylesheet" href="{{ asset('frontend/css/flaticon.css') }}">
    <!-- optico Icons -->
    <link rel="stylesheet" href="{{ asset('frontend/css/optico-icons.css') }}">
    <!-- Themify Icons -->
    <link rel="stylesheet" href="{{ asset('frontend/css/themify-icons.css') }}">
    <!-- Slick -->
    <link rel="stylesheet" href="{{ asset('frontend/css/slick.css') }}">
    <!-- Slick Theme -->
    <link rel="stylesheet" href="{{ asset('frontend/css/slick-theme.css') }}">
    <!-- Pretty Photo -->
    <link rel="stylesheet" href="{{ asset('frontend/css/prettyPhoto.css') }}">
    <!-- Twentytwenty -->
    <link rel="stylesheet" href="{{ asset('frontend/css/twentytwenty.css') }}">
    <!-- Shortcode CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/shortcode.css') }}">
    <!-- Base CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/base.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
</head>

<body>

    <!-- page wrapper -->
    <div class="page-wrapper">

        <!-- Header Main Area -->
        <header class="site-header header-style-1">
            <div class="pre-header">
                <div class="container">
                    <div class="d-flex justify-content-between  align-items-center">
                        <div class="pre-header-left">
                            <ul class="top-contact">
                                <li><i class="optico-icon-home"></i>Dinas Perumahan dan Permukiman Kabupaten
                                    Banjar</li>
                            </ul>
                        </div>
                        <div class="pre-header-right">
                            <ul class="social-icons d-inline">
                                <li><a target="_blank" href="#" data-tooltip="Facebook"><i
                                            class="optico-icon-facebook"></i></a></li>
                                <li><a target="_blank" href="#" data-tooltip="Twitter"><i
                                            class="optico-icon-twitter"></i></a></li>
                                <li><a target="_blank" href="#" data-tooltip="Flickr"><i
                                            class="optico-icon-flickr"></i></a></li>
                                <li><a target="_blank" href="#" data-tooltip="LinkedIn"><i
                                            class="optico-icon-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="site-header-menu">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex align-items-center">
                                <div class="site-branding flex-grow-1">
                                    <a href="{{ url('/') }}">
                                        <img class="logo-img" alt="optico"
                                            src="{{ asset('frontend/images/logo-dark.png') }}">
                                    </a>
                                </div>
                                <div class="site-navigation ml-auto">
                                    <nav class="main-menu navbar-expand-xl navbar-light">
                                        <div class="navbar-header">
                                            <!-- Togg le Button -->
                                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                                data-target="#navbarSupportedContent"
                                                aria-controls="navbarSupportedContent" aria-expanded="false"
                                                aria-label="Toggle navigation">
                                                <span class="fa fa-bars"></span>
                                            </button>
                                        </div>
                                        <div class="collapse navbar-collapse clearfix" id="navbarSupportedContent">
                                            <ul class="navigation clearfix">
                                                <li class="dropdown active"><a href="{{ url('/') }}">Beranda</a></li>
                                                <li class="dropdown">
                                                    <a href="#">Profil</a>
                                                    <ul>
                                                        <li><a href="about.html">Sambutan Kepala Dinas</a></li>
                                                        <li><a href="treatments.html">Struktur Organisasi</a></li>
                                                        <li><a href="our-doctors.html">Visi dan Misi</a></li>
                                                        <li><a href="doctor-single.html">Motto</a></li>
                                                        <li><a href="faq.html">Maklumat Pelayanan</a></li>
                                                    </ul>
                                                </li>
                                                <li class="dropdown">
                                                    <a href="">Pelayanan</a>
                                                    <ul>
                                                        <li><a href="">Rekomendasi Ijin Mendirikan
                                                                Bangunan</a></li>
                                                        <li><a href="">Ijin Mendirikan Lokasi
                                                                Pemakaman</a></li>
                                                        <li><a href="">Perbaikan Penerangan Jalan
                                                                Umum</a></li>
                                                        <li><a href="">Rekomendasi Ijin Penebangan
                                                                Pohon</a></li>
                                                    </ul>
                                                </li>
                                                <li class="dropdown">
                                                    <a href="#">Informasi Publik</a>
                                                    <ul>
                                                        <li><a href="">SAKIP</a></li>
                                                        <li><a href="">Unduhan</a></li>
                                                    </ul>
                                                </li>
                                            <li><a href="{{ route('kontak') }}">Kontak</a></li>
                                            </ul>
                                        </div>
                                    </nav>
                                </div>
                                <div class="menu-right-box d-flex align-items-center">
                                    <a href="#" class="search-btn"><i class="optico-icon-search-1"></i></a>
                                    <div class="header-button">
                                        <a href="{{ route('login') }}" class="btn btn-outline">SIRUMBA</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header Main Area End Here -->