@extends('layouts.master')
@section('content')
                <div class="row">
                        <div class="col-md-12 panel-statistics">
                            <div class="col-sm-4">
                                <div class="panel panel-danger-full panel-updates">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-xs-7 col-lg-8">
                                                <h4 class="panel-title text-warning">Permohonan</h4>
                                                <h3>{{ $permohonan }}</h3>
                                                <div class="progress">
                                                    <div style="width: 100%" aria-valuemax="100" aria-valuemin="0"
                                                        aria-valuenow="100" role="progressbar"
                                                        class="progress-bar progress-bar-warning">
                                                        <span class="sr-only"></span>
                                                    </div>
                                                </div>
                                                <p>Jumlah permohonan tahun ini</p>
                                            </div>
                                            <div class="col-xs-5 col-lg-4 text-right">
                                                <input type="text" value="{{ $permohonan }}" class="dial-warning">
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- panel -->
                            </div><!-- col-sm-6 -->

                            <div class="col-sm-4">
                                <div class="panel panel-success-full panel-updates">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-xs-7 col-lg-8">
                                                <h4 class="panel-title text-success">Pengembang</h4>
                                                <h3>{{ $pengembang }}</h3>
                                                <div class="progress">
                                                    <div style="width: 100%" aria-valuemax="100" aria-valuemin="0"
                                                        aria-valuenow="100" role="progressbar"
                                                        class="progress-bar progress-bar-info">
                                                        <span class="sr-only"></span>
                                                    </div>
                                                </div>
                                                <p>Jumlah Pengembang Perumahan</p>
                                            </div>
                                            <div class="col-xs-5 col-lg-4 text-right">
                                                <input type="text" value="{{ $pengembang }}" class="dial-info">
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- panel -->
                            </div><!-- col-sm-6 -->

                            <div class="col-sm-4">
                                <div class="panel panel-updates">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-xs-7 col-lg-8">
                                                <h4 class="panel-title text-danger">Perumahan</h4>
                                                <h3>{{ $perumahan }}</h3>
                                                <div class="progress">
                                                    <div style="width: q00%" aria-valuemax="100" aria-valuemin="0"
                                                        aria-valuenow="q00" role="progressbar"
                                                        class="progress-bar progress-bar-danger">
                                                        <span class="sr-only"></span>
                                                    </div>
                                                </div>
                                                <p>Jumlah Perumahan</p>
                                            </div>
                                            <div class="col-xs-5 col-lg-4 text-right">
                                                <input type="text" value="{{ $perumahan }}" class="dial-danger">
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- panel -->
                            </div><!-- col-sm-6 -->

                        </div><!-- row -->
                    
                    <div class="col-md-12 col-lg-12 dash-left">

                        <div class="row panel-quick-page">
                                        <div class="col-xs-4 col-sm-5 col-md-4 page-user">
                                            <div class="panel" onclick="(function(){ location.href = BASE_URL+'/admin/permohonan';return false;})();return false;">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">Permohonan</h4>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="page-icon"><i class="icon ion-person-stalker"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4 page-products">
                                            <div class="panel" onclick="(function(){ location.href = BASE_URL+'/admin/post';return false;})();return false;">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">Berita</h4>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="page-icon"><i class="fa fa-newspaper-o"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-4 col-sm-5 col-md-4 page-events">
                                            <div class="panel" onclick="(function(){ location.href = BASE_URL+'/galeri';return false;})();return false;">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">Galeri</h4>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="page-icon"><i class="fa fa-image"></i></div>
                                                </div>
                                            </div>
                                        </div>
            
                                        <div class="col-xs-4 col-sm-5 col-md-2 page-reports">
                                            <div class="panel">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">Post</h4>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="page-icon"><i class="fa fa-edit"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-2 page-statistics">
                                            <div class="panel" onclick="(function(){ location.href = BASE_URL+'/admin/laporan';return false;})();return false;">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">Laporan</h4>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="page-icon"><i class="fa fa-list"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4 page-support">
                                            <div class="panel"  onclick="(function(){ location.href = BASE_URL+'/admin/permohonan/rekap';return false;})();return false;">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">Rekap</h4>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="page-icon"><i class="fa fa-file-text-o"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-2 page-privacy">
                                            <div class="panel" onclick="(function(){ location.href = BASE_URL+'/admin/users';return false;})();return false;">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">Pengguna</h4>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="page-icon"><i class="fa fa-user"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-2 page-settings">
                                            <div class="panel">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">Master Data</h4>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="page-icon"><i class="icon ion-gear-a"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- row -->


  


         

                    </div><!-- col-md-9 -->
                    {{-- <div class="col-md-3 col-lg-4 dash-right">
                        <div class="row">
                            <div class="col-sm-5 col-md-12 col-lg-6">
                                <div class="panel panel-danger panel-weather">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">Pemberitahuan</h4>
                                    </div>
                                    <div class="panel-body inverse">
                                        <div class="row mb10">
                                            <div class="col-xs-6">
                                                <h2 class="today-day">Monday</h2>
                                                <h3 class="today-date">July 13, 2015</h3>
                                            </div>
                                            <div class="col-xs-6">
                                                <i class="wi wi-hail today-cloud"></i>
                                            </div>
                                        </div>
                                        <p class="nomargin">Thunderstorm in the area of responsibility this afternoon
                                            through this evening.</p>
                                        <div class="row mt10">
                                            <div class="col-xs-7">
                                                <strong>Temperature:</strong> (Celcius) 19
                                            </div>
                                            <div class="col-xs-5">
                                                <strong>Wind:</strong> 30+ mph
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- col-md-12 -->
                        </div><!-- row -->
                    </div><!-- col-md-3 --> --}}
                </div><!-- row -->

 @endsection