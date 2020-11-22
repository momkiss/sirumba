<div class="leftpanel">
    <div class="leftpanelinner">

        <!-- ################## LEFT PANEL PROFILE ################## -->

        <div class="media leftpanel-profile">
            <div class="media-left">
                <a href="#">
                    <img src="{{ asset('images/photos/loggeduser.png') }}" alt="" class="media-object img-circle">
                </a>
            </div>
            <div class="media-body">
                <h4 class="media-heading">Administrator <a data-toggle="collapse" data-target="#loguserinfo"
                        class="pull-right"><i class="fa fa-angle-down"></i></a></h4>
                <span>DISPERKIM</span>
            </div>
        </div><!-- leftpanel-profile -->

        <ul class="nav nav-tabs nav-justified nav-sidebar">
            <li class="tooltips active" data-toggle="tooltip" title="Main Menu"><a data-toggle="tab"
                    data-target="#mainmenu"><i class="tooltips fa fa-ellipsis-h"></i></a></li>
            <li class="tooltips" data-toggle="tooltip" title="Log Out"><a href=""><i
                        class="fa fa-sign-out"></i></a></li>
        </ul>

        <div class="tab-content">

            <!-- ################# MAIN MENU ################### -->
            <div class="tab-pane active" id="mainmenu">
                <h5 class="sidebar-title">Beranda</h5>
                <ul class="nav nav-pills nav-stacked nav-quirk">
                <li class="active"><a href="{{ route('home') }}"><i class="fa fa-home"></i><span>Dashboard</span></a></li>
                </ul>
                <ul class="nav nav-pills nav-stacked nav-quirk">
                    <li class="nav-parent"><a href="{{ route('permohonan.index') }}"><i class="fa fa-newspaper-o"></i><span>Permohonan</span></a>
                       <ul class="children">
                            <li><a href="{{ route('permohonan.index') }}">Pendataan </a></li>
                            <li><a href="{{ route('permohonan.rekap') }}">Rekap</a></li>
                        </ul>
                    </li>
                </ul>

                <ul class="nav nav-pills nav-stacked nav-quirk">
                    <li>
                        <a href="{{ route('pengembang.index') }}"><i class="fa fa-building"></i> <span>Pengembang</span></a>
                    </li>
                </ul>

                <h5 class="sidebar-title">Laporan</h5>
                <ul class="nav nav-pills nav-stacked nav-quirk">
                    <li class="nav-parent"><a href="#"><i class="fa fa-file-text-o"></i><span>Laporan</span></a>
                        <ul class="children">
                        <li><a href="{{ route('laporan.index') }}">Per Tanggal</a></li>
                        <li><a href="{{ route('laporan.perkecamatan') }}">Per Kecamatan </a></li>
                        <li><a href="{{ route('laporan.perpengembang') }}">Per Pengembang </a></li>
                        </ul>
                    </li>
                </ul>

                <h5 class="sidebar-title">Berita</h5>
                    <ul class="nav nav-pills nav-stacked nav-quirk">
                        <li class="nav-parent">
                            <a href=""><i class="fa fa-gear"></i> <span>Berita</span></a>
                            <ul class="children">
                                <li><a href="{{ route('posts') }}">Post</a></li>
                                <li><a href="{{ route('page.index') }}">Halaman Statis</a></li>
                                <li><a href="{{ route('categories') }}">Kategori</a></li>
                                <li><a href="{{ route('tags') }}">Tag</a></li>
                                <li><a href="{{ route('posts.trashed')}}">All trashed posts</a></li>
                                <li><a href="{{ route('galeri.index') }}">Galeri</a></li>
                                <li><a href="{{ route('slider.index') }}">Slider</a></li>
                            </ul>
                        </li>
                    </ul>

                <h5 class="sidebar-title">Pengaturan</h5>
                <ul class="nav nav-pills nav-stacked nav-quirk">
                    <li class="nav-parent">
                        <a href=""><i class="fa fa-gear"></i> <span>Master Data</span></a>
                        <ul class="children">
                            {{-- <li><a href="{{ route('identitas.index') }}">Identitas</a></li> --}}
                            <li><a href="{{ route('jenis-konstruksi.index') }}">Jenis Konstruksi</a></li>
                            <li><a href="{{ route('jenis-bangunan.index') }}">Jenis Bangunan</a></li>
                            <li><a href="{{ route('kecamatan.index') }}">Kecamatan</a></li>
                            <li><a href="{{ route('kelurahan.index') }}">Kelurahan</a></li>
                            <li><a href="{{ route('jenis-perumahan.index') }}">Jenis Perumahan</a></li>
                            <li><a href="{{ route('jenisberkas.index') }}">Jenis Berkas</a></li>
                            <li><a href="{{ route('tipe-rumah.index') }}">Tipe Rumah</a></li>
                            <li><a href="{{ route('opd.index') }}">OPD</a></li>
                            <li><a href="{{ route('users.index') }}">Pengguna</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- tab-pane -->

        </div><!-- tab-content -->

    </div><!-- leftpanelinner -->
</div><!-- leftpanel -->