@extends('layouts.master')
@section('content')
<div class="col-md-12">
    <div class="panel">
        <div class="panel-heading nopaddingbottom">
            <h3 class="panel-title">TAMBAH PENGEMBANG</h3>
            <p>Form untuk menambah data pengembang.</p>
        </div>
<div class="panel-body">

<hr>
<div class="col-md-12">            
    <!-- Nav tabs -->
    <ul class="nav nav-tabs nav-success">
        <li class="active"><a href="#tab-lokal" data-toggle="tab"><strong>Kabupaten Banjar</strong></a></li>
        <li><a href="#tab-luar" data-toggle="tab"><strong>Luar Kabupaten</strong></a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content mb20">
        <div class="tab-pane active" id="tab-lokal">
            <form action="{{ route('pengembang.store') }}" method="POST" style="display: block; margin-top: 0em !important" id="form-pengembang-tambah">
                @csrf
            <div class="col-sm-3 mt20">
                <div class="form-group">
                    <label class="control-label center-block"><strong>Nama Perusahaan</strong></label>
                    <input type="text" class="form-control" placeholder="Isikan nama lengkap pengembang" name="nama_perusahaan" >
                </div>
            </div>
            <div class="col-sm-3 mt20">
                    <div class="form-group">
                        <label class="control-label center-block"><strong>Direktur</strong></label>
                        <input type="text" class="form-control" placeholder="Isikan nama direktur" name="direktur">
                    </div>
                </div>
                <div class="col-sm-3 mt20">
                    <div class="form-group">
                        <label class="control-label center-block"><strong>Nomor KTP</strong></label>
                        <input type="text" class="form-control" placeholder="Isikan no.KTP direktur" name="no_ktp">
                    </div>
                </div>
            <div class="col-sm-3 mt20">
                <div class="form-group">
                    <label class="control-label center-block"><strong>No.Telp</strong></label>
                    <input type="text" class="form-control" placeholder="Isikan kontak/telp perusahaan" name="telp" >
                </div>
            </div>
            <div class="col-sm-3 mt20">
                <div class="form-group">
                    <label class="control-label center-block"><strong>Kecamatan</strong></label>
                    <select  class="form-control select2 kecamatan" style="width: 100%" data-placeholder="Pilih kecamatan alamat pengembang" name="alamat_kecamatan">
                        <option value="">---</option>
                        @foreach ($kecamatan as $k)
                    
                        <option value="{{ $k->id }}" data-kode="{{ $k->kode }}">{{ $k->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-3 mt20">
                <div class="form-group">
                    <label class="control-label center-block"><strong>Kelurahan</strong></label>
                    <select  class="form-control kelurahan" style="width: 100%" data-placeholder="Kelurahan" name="alamat_kelurahan">
                        <option value="">---</option>
                        @foreach ($kelurahan as $kel)
                        <option value="{{ $kel->id }}">{{ $kel->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-3 mt20">
                    <div class="form-group">
                        <label class="control-label center-block"><strong>Jalan</strong></label>
                        <input type="text" class="form-control" placeholder="Isikan nama jalan alamat perusahaan" name="alamat_jalan" >
                    </div>
                </div>
            <div class="col-sm-1 mt20">
                <div class="form-group">
                    <label class="control-label center-block"><strong>RT/RW</strong></label>
                    <input type="text" class="form-control" placeholder="RT/RW" name="alamat_rt" > 
                </div>
            </div>

            <div class="col-sm-2 mt20">
                <div class="form-group">
                    <label class="control-label center-block"><strong>Kode Pos</strong></label>
                    <input type="text" class="form-control" placeholder="Kode Pos" name="kode_pos" >
                </div>
            </div>
        
            
            <div class="col-md-12">
                <hr>
                <div class="col-sm-12 col-sm-offset-5">
                    <button class="btn btn-success btn-quirk btn-wide mr5" type="submit">SIMPAN</button>
                </div>
            </div>
        </form>
        </div>
        <div class="tab-pane" id="tab-luar">
            <form action="{{ route('pengembang.store') }}" method="POST" style="display: block; margin-top: 0em !important" id="form-pengembang-tambah">
                @csrf
            <div class="col-sm-3 mt20">
                <div class="form-group">
                    <label class="control-label center-block"><strong>Nama Perusahaan</strong></label>
                    <input type="text" class="form-control" placeholder="Isikan nama lengkap pengembang" name="nama_perusahaan" >
                </div>
            </div>
            <div class="col-sm-3 mt20">
                    <div class="form-group">
                        <label class="control-label center-block"><strong>Direktur</strong></label>
                        <input type="text" class="form-control" placeholder="Isikan nama direktur" name="direktur">
                    </div>
                </div>
                <div class="col-sm-3 mt20">
                    <div class="form-group">
                        <label class="control-label center-block"><strong>Nomor KTP</strong></label>
                        <input type="text" class="form-control" placeholder="Isikan no.KTP direktur" name="no_ktp">
                    </div>
                </div>
            <div class="col-sm-3 mt20">
                <div class="form-group">
                    <label class="control-label center-block"><strong>No.Telp</strong></label>
                    <input type="text" class="form-control" placeholder="Isikan kontak/telp perusahaan" name="telp" >
                </div>
            </div>
            <div class="col-sm-3 mt20">
                <div class="form-group">
                    <label class="control-label center-block"><strong>Kecamatan</strong></label>
                    <input type="text" class="form-control" placeholder="Isikan kontak/telp perusahaan" name="alamat_kecamatan_luar">
                </div>
            </div>
            <div class="col-sm-3 mt20">
                <div class="form-group">
                    <label class="control-label center-block"><strong>Kelurahan</strong></label>
                  <input type="text" class="form-control" placeholder="Isikan kontak/telp perusahaan" name="alamat_kelurahan_luar">
                </div>
            </div>
            <div class="col-sm-3 mt20">
                    <div class="form-group">
                        <label class="control-label center-block"><strong>Jalan</strong></label>
                        <input type="text" class="form-control" placeholder="Isikan nama jalan alamat perusahaan" name="alamat_jalan_luar" >
                    </div>
                </div>
            <div class="col-sm-1 mt20">
                <div class="form-group">
                    <label class="control-label center-block"><strong>RT/RW</strong></label>
                    <input type="text" class="form-control" placeholder="RT/RW" name="alamat_rt" > 
                </div>
            </div>

            <div class="col-sm-2 mt20">
                <div class="form-group">
                    <label class="control-label center-block"><strong>Kode Pos</strong></label>
                    <input type="text" class="form-control" placeholder="Kode Pos" name="kode_pos" >
                </div>
            </div>
        
            
            <div class="col-md-12">
                <hr>
                <div class="col-sm-12 col-sm-offset-5">
                    <button class="btn btn-success btn-quirk btn-wide mr5" type="submit">SIMPAN</button>
                </div>
            </div>
        </form>
        </div>

      
    </div>
</div><!-- col-md-6 -->

    </div>
    </div>
</div>

@endsection