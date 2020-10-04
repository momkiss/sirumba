<header>
    <div class="headerpanel">

        <div class="logopanel">
        <img src="{{ asset('images/logo.png') }}" alt="" width="40" class="pull-left"><h2 style="font-weight:bold" class="pull-left"><a href="{{ url('/') }}">{{ env('APP_NAME') }}</a></h2>
        </div><!-- logopanel -->

        <div class="headerbar">

            <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>

            <div class="searchpanel">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                    </span>
                </div><!-- input-group -->
            </div>

            <div class="header-right">
                <ul class="headermenu">
                    <li>
                        <div class="btn-group">
                            <button type="button" class="btn btn-logged" data-toggle="dropdown">
                                <img src="{{ asset('images/photos/loggeduser.png') }}" alt="" />
                                Administrator
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="profile.html"><i class="glyphicon glyphicon-user"></i>Profil</a>
                                </li>
                                <li><a href="#"><i class="glyphicon glyphicon-cog"></i> Pengaturan akun</a></li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="glyphicon glyphicon-log-out"></i>
                                        &nbsp;&nbsp;Log Out
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>

                        {{--  <button id="chatview" class="btn btn-chat alert-notice">  --}}
                        <button id="chatview" class="btn btn-chat" data-toggle="modal" data-target="#modal-copyright">
                            <span class="badge-alert"></span>
                            <i class="fa fa-copyright"></i>
                        </button>
                    </li>
                   
                    <!-- Modal -->
                    <div class="modal fade" id="modal-copyright" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content" style="border: 0 !important">
                                <div class="modal-body" style="padding: 0 !important">
                                        <div class="profile-left">
                                            <div class="profile-left-heading">
                                                <a class="profile-photo" href=""><img alt="" src="../images/photos/profilepic.png" class="img-circle img-responsive"></a>
                                                <h2 class="profile-name"><strong>NURUL HIDAYATI, S.T M.T</strong></h2>
                                                <h4 class="profile-designation"><strong>KEPALA SEKSI PENYEDIAAN PERUMAHAN UMUM</strong></h4>
                                            </div>
                                            <div class="profile-left-body">
                                                <h4 class="panel-title">Tentang</h4>
                                                <p style="text-align: justify">SIRUMBA adalah sebuah Sistem Informasi berbasis online yang diprakarsai/inovasi oleh Kepala Seksi Penyediaan Perumahan Umum, Nurul Hidayati, S.T M.T
                                                untuk Dinas Perumahan dan Permukiman Kabupaten Banjar</p>
                                        
                                                <hr class="fadeout">
                                        
                                                <h4 class="panel-title">Alamat</h4>
                                                <p><i class="glyphicon glyphicon-map-marker mr5"></i> Martapura</p>
                                                                                
                                                <hr class="fadeout">
                                        
                                                <h4 class="panel-title">Kontak</h4>
                                                <p><i class="glyphicon glyphicon-phone mr5"></i> +62 8**********</p>
                                        
                                                <hr class="fadeout">
                                        
                                                <h4 class="panel-title">SOSIAL MEDIA</h4>
                                                <ul class="list-inline profile-social">
                                                    <li><a href=""><i class="fa fa-facebook-official"></i></a></li>
                                                    <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                                                    <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer" style="border: 0 !important; padding: 15px; background-color:#d9534f">
                                    <button type="button" class="btn btn-sm btn-warning" data-dismiss="modal"><span class="fa fa-close"></span> Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>


                </ul>
            </div><!-- header-right -->
        </div><!-- headerbar -->
    </div><!-- header-->
</header>