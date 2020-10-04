@extends('partials.master')

@section('content')
   <!-- page content -->
<div class="page-content">

    <!-- Banner -->
    <section class="home-banner home-slider-first">
        <div id="Bannerslider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="img-fluid" src="{{ asset('frontend/images/banner/banner-01.png') }}" alt="..." />
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-6 col-lg-7 col-md-7 col-sm-8  col-8">
                                    {{-- <span class="shapewrapper-inner anim-1">EYE CARE SPECIALIST</span> --}}
                                    <h1 class="anim-2">Penataan <br /><strong>Perumahan Masyarakat</strong></h1>
                                    <div class="tagline anim-3 d-none d-sm-block">Kabupaten Banjar</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="img-fluid" src="{{ asset('frontend/images/banner/banner-02.png') }}" alt="...">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-6 col-lg-7 col-md-7  col-sm-8 col-8">
                                    {{-- <span class="shapewrapper-inner anim-1">EYE CARE SPECIALIST</span> --}}
                                    <h1 class="anim-2">Peningkatan dan Pengelolaan<br /><strong>Penerangan Jalan
                                            Umum</strong></h1>
                                    <div class="tagline anim-3 d-none d-sm-block">Kabupaten Banjar</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#Bannerslider" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#Bannerslider" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </section>
    <!-- Banner End -->
    <!-- Blog -->
    <section class="section-md bg-white pt-md-70 pb-md-40 pt-sm-50 pb-sm-20 pt-xs-40 pb-xs-10">
        <div class="container">
            <div class="row">
                @foreach ($articles as $article)
                <!-- Blog 01 -->
                <div class="col-lg-4">
                    <div class="blog-box blog-style-2 mb-4">
                        <div class="blog-thumbnail">
                            <img src="{{ asset($article->featured) }}" class="img-fluid" alt="">
                        </div>
                        <div class="blog-content">
                            <div class="blog-entry-meta">
                                <ul class="list-inline">
                                    <li class="blog-category"><a class="url fn n"
                                            href="#">{{ $article->category->name ?? "" }}</a></li>
                                    <li class="blog-date"><i class="optico-icon-clock"></i><a
                                            href="#">{{ $article->created_at->format('j F Y') }}</a></li>
                                </ul>
                            </div>
                            <h4 class="blog-box-title"><a
                                    href="{{ route('post.single', $article->slug) }}">{{ ucwords(strtolower($article->title)) }}</a>
                            </h4>
                            <div class="blog-desc">
                                <p>{!! \Illuminate\Support\Str::limit($article->content ?? '', 300,'...') !!}</p>
                            </div>
                            <div class="link-btn">
                                <a class="skincolor" href="{{ route('post.single', $article->slug) }}">Selengkapnya ...<i
                                        class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Blog end -->
    <!-- Counter -->
    <section class="bg-lightgrey section-smt">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="counter counter-style-1">
                        <div class="fld-contents">
                            <h4 class="counter-contents">
                                <span data-appear-animation="animateDigits" data-from="0" data-to="{{ $jumlah_pengembang }}" data-interval="1"
                            data-before="" data-before-style="" data-after="" data-after-style="">{{ $jumlah_pengembang }}</span>
                            </h4>
                            <h6 class="counter-title">
                                <span>Developer/Pengembang</span>
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="counter counter-style-1">
                        <div class="fld-contents">
                            <h4 class="counter-contents">
                                <span data-appear-animation="animateDigits" data-from="0" data-to="{{ $jumlah_perumahan }}" data-interval="1"
                                    data-before="" data-before-style="" data-after="" data-after-style="">{{ $jumlah_perumahan }}</span>
                            </h4>
                            <h6 class="counter-title">
                                <span>Perumahan</span>
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="counter counter-style-1">
                        <div class="fld-contents">
                            <h4 class="counter-contents">
                                <span data-appear-animation="animateDigits" data-from="0" data-to="{{ $jumlah_permohonan }}" data-interval="1"
                                    data-before="" data-before-style="" data-after="" data-after-style="">{{ $jumlah_permohonan }}</span>
                            </h4>
                            <h6 class="counter-title">
                                <span>Jumlah Permohonan</span>
                            </h6>
                        </div>
                    </div>
                </div>
          
            </div>
        </div>
    </section>
    <!-- Counter end -->

    <!-- Welcome -->
    {{-- <section class="bg-lightgrey welcome-company">
        <div class="container">
            <div class="row align-items-lg-center align-items-md-end">
                <div class="col-md-12 col-lg-6">
                    <img src="{{ asset('frontend/images/img-01-new.png') }}" class="img-fluid" alt="" />
                </div>
                <div class="col-md-12 col-lg-6 mt-sm-30 pb-50">
                    <div class="section-title mt-md-50">
                        <h4 class="subheading skincolor">WELCOME TO OPHTHMOLOGIST</h4>
                        <h2>WE PRESERVE, ENHANCE, AND <strong>PROTECT YOUR VISION</strong></h2>
                    </div>
                    <p>You are nothing without your eyes, <a class="opt-underline-dotted" href="#">consectetur
                            adipisicing elit,</a> sed do eiusmod tempor incididunt ut labore et dolore magna
                        aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                    <p><a class="opt-underline-dotted" href="#">Care your eyes,</a> sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua Ut enim.</p>
                    <div class="sing-owner d-flex">
                        <div class="sing">
                            <img src="{{ asset('frontend/images/signature.png') }}" class="img-fluid" alt="" />
                        </div>
                        <div class="owner-author">
                            <h4 class="owner-name">Mitchell Newman</h4>
                            <h6 class="owner-postion">Owner, Lead Optometrist</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Welcome end -->

    <!-- Our Service -->
    <section class="section-md">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="section-title text-center">
                        <h4 class="subheading skincolor">GALERI</h4>
                        <h2>DOKUMENTASI<strong><br /> KEGIATAN</strong></h2>
                    </div>
                </div>
            </div>
            <div class="row pt-3">
                @foreach ($galeri as $glr)
                  <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="service-box service-style-1">
                        <div class="service-thumbnail">
                            <div class="service-thumbnail-inner">
                            <img src="{{ asset($glr->link) }}" class="img-fluid" alt="{{ $glr->nama }}">
                            </div>
                        </div>
                        <div class="service-content">
                            <div class="service-inner">
                                <h3 class="service-box-title"><a href="">{{ $glr->nama }}</a></h3>
                                <div class="service-desc">
                                <p>{{ $glr->keterangan }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
                @endforeach
            </div>
        </div>
    </section>
    <!-- Our Service end -->

    <!-- Post & Testimonial -->
    <section class="section-md bg-lightgrey">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="our-blog pr-3 mr-4 mr-md-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-title">
                                    <h4 class="subheading skincolor">BERITA POPULER</h4>
                                    <h2>BERITA YANG SERING<strong><br /> DILIHAT</strong></h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">

                                @foreach ($populer  as $pop)
                                    <div class="blog-box blog-style-3 d-flex mb-4">
                                        <div class="blog-thumbnail">
                                        <img src="{{ asset($pop->featured) }} " class="img-fluid" alt="{{ $pop->title }}">
                                        </div>
                                        <div class="blog-content">
                                            <div class="blog-entry-meta">
                                                <ul class="list-inline">
                                                <li class="blog-category"><a class="url fn n" href="#">{{ $pop->category->name ?? "Belum ada kategori" }}</a>
                                                    </li>
                                                <li class="blog-date"><i class="optico-icon-clock"></i><a href="#">{{ $pop->created_at->format('j F Y') }}</a></li>
                                                </ul>
                                            </div>
                                        <h4 class="blog-box-title"><a href="{{ route('post.single', $pop->slug) }}">{{ \Illuminate\Support\Str::limit($pop->title,200,'...') }}</a></h4>
                                            <div class="blog-desc">
                                                <p></p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Post & Testimonial end -->

    <!-- Client -->
    <div class="client-style section-md">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="slick-carousel dots-right" data-autoplay="true" data-dots="false" data-arrows="false"
                        data-slides="3" data-tslides="3" data-islides="1">
                        <div class="text-center " data-tooltip="Client 1">
                            <img class="logo-img" alt="KEMENTERIAN PUPR"
                                src="{{ asset('frontend/images/client/logo_kementerian_pu.png') }}" />
                        </div>
                        <div class="text-center " data-tooltip="Client 2">
                            <img class="logo-img" alt="LITBANG PU"
                                src="{{ asset('frontend/images/client/litbang_pu.png') }}" />
                        </div>
                        <div class="text-center " data-tooltip="Client 3">
                            <img class="logo-img" alt="DISPERKIM KALSEL"
                                src="{{ asset('frontend/images/client/disperkim_kalsel.png') }}" />
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Client end -->
</div>
<!-- page content End --> 
@endsection
