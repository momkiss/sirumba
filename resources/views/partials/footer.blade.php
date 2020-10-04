<!-- footer -->
<footer class="footer site-footer">
    <div class="footer-top skin-bg-color">
        <div class="container">
            <div class="row d-flex white-color align-items-center">
                <div class="col-lg-8">
                    <div class="iconbox iconbox-style-6">
                        <div class="iconbox-inner d-flex">
                            <div class="iconbox-icon">
                                <i class="themifyicon ti-headphone-alt"></i>
                            </div>
                            <div class="iconbox-contents">
                                <div class="iconbox-title">
                                    <h2><strong>KRITIK DAN SARAN</strong></h2>
                                    <p>Masukkan kritik dan saran yang dengan cara mengklik tombol disamping.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-md-30 text-lg-right">
                <a href="{{ route('kontak') }}" class="btn btn-dark">Kritik dan Saran</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                <div class="footerlogo mb-4">
                    <img class="" src="{{ asset('frontend/images/logo-dark.png') }}" alt="">
                </div>
                <p class="mb-0">Dinas Perumahan dan Permukiman Kabupaten Banjar.</p>
                <div class="social-links-wrapper">
                    <ul class="social-icons">
                        <li><a href="#" class="tooltip-top" data-toggle="tooltip" data-placement="top"
                                data-tooltip="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" class="tooltip-top" data-toggle="tooltip" data-placement="top"
                                data-tooltip="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" class="tooltip-top" data-toggle="tooltip" data-placement="top"
                                data-tooltip="Flickr"><i class="fa fa-flickr"></i></a></li>
                        <li><a href="#" class="tooltip-top" data-toggle="tooltip" data-placement="top"
                                data-tooltip="LinkedIn"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 mt-sm-30">
                <h6 class="footer-widget-title">Website Terkait</h6>
                <ul class="list-unstyled footer-link-list">
                    <li><a href="https://www.pu.go.id" target="_blank">Kementerian Pekerjaan Umum dan Perumahan Rakyat</a></li>
                    <li><a href="https://banjarkab.go.id" target="_blank">Pemerintah Kabupaten Banjar</a></li>
                    <li><a href="http://pupr.banjarkab.go.id" target="_blank">Dinas Pekerjaan Umum dan Penataan Ruang</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 mt-md-30">
                <h6 class="footer-widget-title">Aplikasi</h6>
                <ul class="list-unstyled footer-link-list">
                    <li><a href="#">SIRUMBA</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 address-box mt-md-30">
                <h6 class="footer-widget-title">Kontak Kami</h6>
                <div class="d-flex">
                    <i class="optico-icon-location-pin"></i>
                    <p><strong>Jl. P. Hidayatullah No. 2</strong>
                        <br />Martapura - Kalimantan Selatan 70611</p>
                </div>
                <div class="d-flex">
                    <i class="optico-icon-link"></i>
                    <p>disperkimbanjar@banjarkab.go.id</p>
                </div>
                <div class="d-flex">
                    <i class="optico-icon-mobile"></i>
                    <p>(0511) 4721102</p>
                </div>
            </div>
        </div>
        <div class="bottom-footer">
            <div class="row">
                <div class="col-sm-6">
                    Copyright © 2020 <a href="">Pemerintah Kabupaten Banjar</a>. All rights reserved.
                </div>
                <div class="col-sm-6 text-lg-right text-md-right text-sm-left">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="#">About Us</a></li>
                        <li class="list-inline-item"><a href="#">Services</a></li>
                        <li class="list-inline-item"><a href="#">Privacy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer End -->
</div>
<!-- page wrapper End -->

<!-- Search Box Start Here -->
<div class="ts-search-overlay">
    <div class="ts-icon-close"></div>
    <div class="ts-search-outer">
        <div class="ts-search-logo"><img alt="optico" src="{{ asset('frontend/images/logo-white.png') }}" /></div>
        <form class="ts-site-searchform">
            <input type="search" class="form-control field searchform-s" name="s"
                placeholder="Type Word Then Press Enter">
            <button type="submit"><span class="optico-icon-search"></span></button>
        </form>
    </div>
</div>
<!-- Search Box End Here -->

<!-- JS
        ============================================ -->

<!-- jQuery JS -->
<script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
<!-- Popper JS -->
<script src="{{ asset('frontend/js/popper.min.js') }}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<!-- jquery Waypoints JS -->
<script src="{{ asset('frontend/js/jquery-waypoints.js') }}"></script>
<!-- jquery Appear JS -->
<script src="{{ asset('frontend/js/jquery.appear.js') }}"></script>
<!-- Numinate JS -->
<script src="{{ asset('frontend/js/numinate.min.js') }}"></script>
<!-- Slick JS -->
<script src="{{ asset('frontend/js/slick.min.js') }}"></script>
<!-- PrettyPhoto JS -->
<script src="{{ asset('frontend/js/jquery.prettyPhoto.js') }}"></script>
<!-- Circle Progress JS -->
<script src="{{ asset('frontend/js/circle-progress.js') }}"></script>
<!-- Event Move JS -->
<script src="{{ asset('frontend/js/jquery.event.move.js') }}"></script>
<!-- Twentytwenty JS -->
<script src="{{ asset('frontend/js/jquery.twentytwenty.js') }}"></script>
<!-- Scripts JS -->
<script src="{{ asset('frontend/js/scripts.js') }}"></script>
</body>

</html>