@extends('layouts.master')
@section('content')
<div class="col-md-12">
    <div class="panel">
        <div class="panel-heading nopaddingbottom">
            <h3 class="panel-title">EDIT PENGEMBANG</h3>
            <p>Form untuk mengubah data pengembang.</p>
        </div>
        <div class="panel-body">
           <hr>
        <div class="col-md-12">
                  @php
                    if ($pengembang->alamat_kecamatan != "" && $pengembang->alamat_kelurahan != "") {
                        $aktif = "active";
                    }

                    if ($pengembang->alamat_kecamatan == "" && $pengembang->alamat_kelurahan == "") {
                        $aktif2 = "active";
                    }
                @endphp
            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-success">
                <li class="{{ $aktif ?? "" }}"><a href="#tab-lokal" data-toggle="tab"><strong>Kabupaten Banjar</strong></a></li>
                <li class="{{ $aktif2 ?? "" }}"><a href="#tab-luar" data-toggle="tab"><strong>Luar Wilayah</strong></a></li>
            </ul>

      
            <div class="tab-content mb20">
            <div class="tab-pane {{ $aktif ?? "" }}" id="tab-lokal">
                
                    @if ($pengembang->alamat_kecamatan != "" && $pengembang->alamat_kelurahan != "")
                    <form action="{{ route('pengembang.update', $pengembang->id) }}" method="POST"  style="display: block; margin-top: 0em !important" id="form-pengembang-update">
                        @method('PATCH')
                        @csrf
                        <div class="col-sm-3 mt20">
                            <div class="form-group">
                                <label class="control-label center-block"><strong>Nama Perusahaan</strong></label>
                            <input type="text" class="form-control" placeholder="Isikan nama lengkap pengembang" name="nama_perusahaan" value="{{ $pengembang->nama_perusahaan }}">
                            </div>
                        </div>
                        <div class="col-sm-3 mt20">
                            <div class="form-group">
                                <label class="control-label center-block"><strong>Direktur</strong></label>
                                <input type="text" class="form-control" placeholder="Isikan nama direktur" name="direktur" value="{{ $pengembang->direktur }}">
                            </div>
                        </div>
                        <div class="col-sm-3 mt20">
                            <div class="form-group">
                                <label class="control-label center-block"><strong>Nomor KTP</strong></label>
                                <input type="text" class="form-control" placeholder="Isikan no.KTP direktur" name="no_ktp" value="{{ $pengembang->no_ktp }}">
                            </div>
                        </div>

                        <div class="col-sm-3 mt20">
                            <div class="form-group">
                                <label class="control-label center-block"><strong>No.Telp</strong></label>
                                <input type="text" class="form-control" placeholder="Isikan kontak/telp perusahaan" name="telp" value="{{ $pengembang->telp }}">
                            </div>
                        </div>
                        <div class="col-sm-3 mt20">
                            <div class="form-group">
                                <label class="control-label center-block"><strong>Kecamatan</strong></label>
                                <select class="form-control select2 kecamatan" style="width: 100%"
                                    data-placeholder="Pilih kecamatan alamat pengembang" name="alamat_kecamatan">
                                    @foreach ($kecamatan as $k)
                                        <option value="{{ $k->id }}" data-kode="{{ $k->kode }}" @if ($k->id == $pengembang->alamat_kecamatan_id)
                                            selected
                                        @endif>{{ $k->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3 mt20">
                            <div class="form-group">
                                <label class="control-label center-block"><strong>Kelurahan</strong></label>
                                <select class="form-control kelurahan" style="width: 100%" data-placeholder="Kelurahan"
                                    name="alamat_kelurahan">
                                    @foreach ($kelurahan as $kel)
                                    <option value="{{ $kel->id }}" @if ($kel->id == $pengembang->alamat_kelurahan_id)
                                        selected
                                    @endif>{{ $kel->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3 mt20">
                            <div class="form-group">
                                <label class="control-label center-block"><strong>Jalan</strong></label>
                                <input type="text" class="form-control" placeholder="Isikan nama jalan alamat perusahaan" name="alamat_jalan" value="{{ $pengembang->alamat_jalan }}">
                            </div>
                        </div>
                        <div class="col-sm-1 mt20">
                            <div class="form-group">
                                <label class="control-label center-block"><strong>RT/RW</strong></label>
                                <input type="text" class="form-control" placeholder="RT/RW" name="alamat_rt" value="{{ $pengembang->alamat_rt }}">
                            </div>
                        </div>

                        <div class="col-sm-2 mt20">
                            <div class="form-group">
                                <label class="control-label center-block"><strong>Kode Pos</strong></label>
                                <input type="text" class="form-control" placeholder="Kode Pos" name="kode_pos" value="{{ $pengembang->kode_pos }}">
                            </div>
                        </div>


                        <div class="col-md-12">
                            <hr>
                            <div class="col-sm-12 col-sm-offset-5">
                                <button class="btn btn-success btn-quirk btn-wide mr5" type="submit">UPDATE</button>
                            </div>
                        </div>

                    </form>
                    @endif
                </div>

            <div class="tab-pane {{ $aktif2 ?? "" }}" id="tab-luar">
                @if ($pengembang->alamat_kecamatan == "" && $pengembang->alamat_kelurahan == "")
                    <form action="{{ route('pengembang.update', $pengembang->id) }}" method="POST"
                        style="display: block; margin-top: 0em !important" id="form-pengembang-update">
                        @method('PATCH')
                        @csrf
                        <div class="col-sm-3 mt20">
                            <div class="form-group">
                                <label class="control-label center-block"><strong>Nama Perusahaan</strong></label>
                                <input type="text" class="form-control" placeholder="Isikan nama lengkap pengembang" name="nama_perusahaan"
                                    value="{{ $pengembang->nama_perusahaan }}">
                            </div>
                        </div>
                        <div class="col-sm-3 mt20">
                            <div class="form-group">
                                <label class="control-label center-block"><strong>Direktur</strong></label>
                                <input type="text" class="form-control" placeholder="Isikan nama direktur" name="direktur"
                                    value="{{ $pengembang->direktur }}">
                            </div>
                        </div>
                        <div class="col-sm-3 mt20">
                            <div class="form-group">
                                <label class="control-label center-block"><strong>Nomor KTP</strong></label>
                                <input type="text" class="form-control" placeholder="Isikan no.KTP direktur" name="no_ktp"
                                    value="{{ $pengembang->no_ktp }}">
                            </div>
                        </div>
                    
                        <div class="col-sm-3 mt20">
                            <div class="form-group">
                                <label class="control-label center-block"><strong>No.Telp</strong></label>
                                <input type="text" class="form-control" placeholder="Isikan kontak/telp perusahaan" name="telp"
                                    value="{{ $pengembang->telp }}">
                            </div>
                        </div>
                        <div class="col-sm-3 mt20">
                            <div class="form-group">
                                <label class="control-label center-block"><strong>Kecamatan</strong></label>
                                <input type="text" class="form-control" placeholder="Isikan kontak/telp perusahaan"
                                    name="alamat_kecamatan_luar" value="{{ $pengembang->alamat_kecamatan_luar }}">
                            </div>
                        </div>
                        <div class="col-sm-3 mt20">
                            <div class="form-group">
                                <label class="control-label center-block"><strong>Kelurahan</strong></label>
                                <input type="text" class="form-control" placeholder="Isikan kontak/telp perusahaan"
                                    name="alamat_kelurahan_luar" value="{{ $pengembang->alamat_kelurahan_luar }}">
                            </div>
                        </div>
                        <div class="col-sm-3 mt20">
                            <div class="form-group">
                                <label class="control-label center-block"><strong>Jalan</strong></label>
                                <input type="text" class="form-control" placeholder="Isikan nama jalan alamat perusahaan"
                                    name="alamat_jalan" value="{{ $pengembang->alamat_jalan }}">
                            </div>
                        </div>
                        <div class="col-sm-1 mt20">
                            <div class="form-group">
                                <label class="control-label center-block"><strong>RT/RW</strong></label>
                                <input type="text" class="form-control" placeholder="RT/RW" name="alamat_rt"
                                    value="{{ $pengembang->alamat_rt }}">
                            </div>
                        </div>
                        <div class="col-sm-2 mt20">
                            <div class="form-group">
                                <label class="control-label center-block"><strong>Kode Pos</strong></label>
                                <input type="text" class="form-control" placeholder="Kode Pos" name="kode_pos"
                                    value="{{ $pengembang->kode_pos }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr>
                            <div class="col-sm-12 col-sm-offset-5">
                                <button class="btn btn-success btn-quirk btn-wide mr5" type="submit">UPDATE</button>
                            </div>
                        </div>
                    </form>
                @endif
                 
            </div>
        </div>
    </div>
</div>

@endsection