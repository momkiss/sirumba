@extends('partials.master')

@section('content')
 <!-- page content -->
<div class="page-content">

    <!-- Contact -->
    <section class="section-mdt bg-lightgrey">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12">
                    <div class="section-title text-center">
                        <h4 class="subheading skincolor">PEMERINTAH KABUPATEN BANJAR</h4>
                        <h2><strong>DINAS PERUMAHAN DAN PERMUKIMAN <br>KABUPATEN BANJAR</strong></h2>
                        <p>"Terwujudnya Masyarakat Kabupaten Banjar yang Sejahtera dan Barokah"</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="iconbox iconbox-style-7">
                        <div class="iconbox-inner d-flex">
                            <div class="iconbox-icon skincolor">
                                <i class="optico-icon optico-icon-headphone-alt"></i>
                            </div>
                            <div class="iconbox-inner">
                                <div class="iconbox-contents">
                                    <div class="iconbox-title">
                                        <h2>Telp.</h2>
                                    </div>
                                    <div class="iconbox-desc">
                                        <p>(0511) 4721102</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-sm-30">
                    <div class="iconbox iconbox-style-7">
                        <div class="iconbox-inner d-flex">
                            <div class="iconbox-icon skincolor">
                                <i class="optico-icon optico-icon-location-pin"></i>
                            </div>
                            <div class="iconbox-inner">
                                <div class="iconbox-contents">
                                    <div class="iconbox-title">
                                        <h2>Alamat</h2>
                                    </div>
                                    <div class="iconbox-desc">
                                        <p>Jl. P. Hidayatullah No. 2
                                        Martapura <br>Kalimantan Selatan 70611</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-sm-30">
                    <div class="iconbox iconbox-style-7">
                        <div class="iconbox-inner d-flex">
                            <div class="iconbox-icon skincolor">
                                <i class="optico-icon optico-icon-mail"></i>
                            </div>
                            <div class="iconbox-inner">
                                <div class="iconbox-contents">
                                    <div class="iconbox-title">
                                        <h2>Email</h2>
                                    </div>
                                    <div class="iconbox-desc">
                                        <p>disperkimbanjar@banjarkab.go.id</p>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- appointment -->
            <div class="row  box-shadow-02 bg-white contact-appointment">
                <div class="col-lg-4 appointment-image">
                </div>
                <div class="col-lg-8 appointment-inner">
                    <h3>Hubungi 0511 - 4721102 (Darurat)</h3>
                    <p>your personal case manager will ensure thate you receive the best possible care</p>
                    <div class="contact-form">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <input id="name" type="text" class="form-control" placeholder="Nama lengkap"
                                        name="nama">
                                </div>
                                <div class="form-group col-lg-6">
                                    <input id="email" class="form-control" placeholder="Email" name="email"
                                        type="email" value="" aria-required="true">
                                </div>
                                <div class="form-group col-lg-6">
                                    <input id="phone" type="text" class="form-control" placeholder="Kontak / No. HP"
                                        name="kontak">
                                </div>
                                <div class="form-group col-lg-6">
                                    <input id="subject" type="text" class="form-control" placeholder="Judul"
                                        name="subject">
                                </div>
                                <div class="form-group col-lg-12">
                                    <textarea id="comment" class="form-control" placeholder="Pesan" name="pesan"
                                        cols="45" rows="5" aria-required="true"></textarea>
                                </div>
                                <div class="form-group col-lg-12">
                                    <a href="#" class="btn">KIRIM PESAN</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- appointment end -->
        </div>
    </section>
    <!-- Contact End -->

    <!-- Map -->
    <section>
        <div class="map-box overflow-hidden">
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                    <div class="col-md-12">
                        <div class="contact-map">
                            <iframe
                                src="https://maps.google.com/maps?q=codeless%20technol&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Map end -->
</div>
<!-- page content End -->   
@endsection
