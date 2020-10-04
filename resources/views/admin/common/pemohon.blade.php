@if ($form == "edit") 
<div class="panel-body">
    <form action="{{ route('permohonan.update', $pemohon->id) }}" method="POST" style="display: block; margin-top: 0em !important" id="form-update-permohonan">
    @csrf
    <div class="row mb20">
        <div class="col-sm-3 pull-right">
            <label><strong>Pengembang</strong></label>
            <div class="input-group">
                <select name="pengembang_id" class="form-control" >
                    @foreach ($pengembang as $pen)
                        <option value="{{ $pen->id }}" @if ($pen->id == $pemohon->pengembang_id ?? "")
                            selected
                        @endif>{{ $pen->nama_perusahaan }}</option>
                    @endforeach
                </select>
            <span class="input-group-addon" onclick="location.href = '{{ route('pengembang.create') }}';"><i class="glyphicon glyphicon-plus"></i></span>
            </div>
        </div>
        <div class="col-sm-3 pull-right">
                <div class="form-group">
                    <label class="control-label center-block"><strong>Tahun</strong></label>
                        @php
                            $currently_selected = $pemohon->tahun;
                            $earliest_year = 1990;
                            $latest_year = date('Y');
                            print '<select name="tahun" class="form-control select2">';
                                foreach ( range( $latest_year, $earliest_year ) as $i ) {
                                print '<option  value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
                                }
                                print '</select>';
                        @endphp
                </div>
        </div>
    <div class="col-md-12">
        <hr>
    </div>
    <div class="col-sm-3 mt20">
        <div class="form-group">
            <label class="control-label center-block"><strong>Nama Pemohon *</strong></label>
            <input type="text" class="form-control" placeholder="Isikan nama lengkap pengembang" name="nama_lengkap_pengembang" value="{{ isset($pemohon->nama_lengkap_pengembang) ? $pemohon->nama_lengkap_pengembang : "" }}">
        </div>
    </div>
    <div class="col-sm-3 mt20">
        <div class="form-group">
            <label class="control-label center-block"><strong>Pekerjaan</strong></label>
            <input type="text" class="form-control" placeholder="Isikan pekerjaan pengembang" name="pekerjaan" value="{{ isset($pemohon->pekerjaan) ? $pemohon->pekerjaan : "" }}">
        </div>
    </div>
        <div class="col-sm-3 mt20">
        <div class="form-group">
            <label class="control-label center-block"><strong>Jabatan</strong></label>
            <input type="text" class="form-control" placeholder="Isikan jabatan pengembang" name="jabatan" value="{{ isset($pemohon->jabatan) ? $pemohon->jabatan : "" }}">
        </div>
    </div>
    <div class="col-sm-3 mt20">
        <div class="form-group">
            <label class="control-label center-block"><strong>No.Telp./HP.</strong></label>
            <input type="text" class="form-control" placeholder="Isikan nomor HP pengembang" name="telp" value="{{ isset($pemohon->telp) ? $pemohon->telp : "" }}">
        </div>
    </div>
    <div class="col-sm-3 mt20">
        <div class="form-group">
            <label class="control-label center-block"><strong>Jalan</strong></label>
            <input type="text" class="form-control" placeholder="Isikan nama jalan alamat pemohon" name="alamat_jalan_pengembang" value="{{ isset($pemohon->alamat_jalan_pengembang) ? $pemohon->alamat_jalan_pengembang : "" }}">
        </div>
    </div>
    <div class="col-sm-3 mt20">
        <div class="form-group">
            <label class="control-label center-block"><strong>Kelurahan</strong></label>
            <input type="text" class="form-control" placeholder="Isikan nama kelurahan alamat pemohon" name="alamat_kelurahan_pengembang" value="{{ isset($pemohon->alamat_kelurahan_pengembang) ? $pemohon->alamat_kelurahan_pengembang : "" }}">
        </div>
    </div>
    <div class="col-sm-3 mt20">
        <div class="form-group">
            <label class="control-label center-block"><strong>Kecamatan</strong></label>
            <input type="text" class="form-control" placeholder="Isikan nama kecamatan alamat pemohon" name="alamat_kecamatan_pengembang" value="{{ isset($pemohon->alamat_kecamatan_pengembang) ? $pemohon->alamat_kecamatan_pengembang : "" }}">
        </div>
    </div>


    <div class="col-sm-1 mt20">
        <div class="form-group">
            <label class="control-label center-block"><strong>&nbsp;</strong></label>
            <input type="text" class="form-control" placeholder="RT/RW" name="alamat_rt_pengembang" value="{{ isset($pemohon->alamat_rt_pengembang) ? $pemohon->alamat_rt_pengembang : "" }}"> 
        </div>
    </div>

    <div class="col-sm-2 mt20">
        <div class="form-group">
            <label class="control-label center-block"><strong>&nbsp;</strong></label>
            <input type="text" class="form-control" placeholder="Kode Pos" name="alamat_kodepos_pengembang" value="{{ isset($pemohon->alamat_kodepos_pengembang) ? $pemohon->alamat_kodepos_pengembang : "" }}">
        </div>
    </div>
    <div class="col-sm-3 mt20">
        <div class="form-group">
            <label class="control-label center-block"><strong>Nomor KTP *</strong></label>
            <input type="text" class="form-control" placeholder="Isikan no. KTP pengembang" name="nomor_ktp" value="{{ isset($pemohon->nomor_ktp) ? $pemohon->nomor_ktp : "" }}">
        </div>
    </div>
    <div class="col-sm-3 mt20">
        <div class="form-group">
            <label class="control-label center-block"><strong>Nomor Surat Permohonan *</strong></label>
            <input type="text" class="form-control" placeholder="Isikan no. surat permohonan" name="nomor_surat_permohonan" value="{{ isset($pemohon->nomor_surat_permohonan) ? $pemohon->nomor_surat_permohonan : "" }}">
        </div>
    </div>
    <div class="col-sm-3 mt20">
            <label class="control-label center-block "><strong>Tanggal Surat Permohonan *</strong></label>
            <div class="input-group">
                <input type="text" class="form-control datepicker" placeholder="mm-dd-yyyy" name="tanggal_surat_permohonan" autocomplete="off" value="{{ isset($pemohon->tanggal_surat_permohonan) ? $pemohon->tanggal_surat_permohonan : "" }}">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            </div>
    </div>

    <div class="col-md-12">
        <hr>
    </div>

    <div class="col-sm-3 mt20">
        <div class="form-group">
            <label class="control-label center-block"><strong>Nama Perumahan</strong></label>
            <input type="text" class="form-control" placeholder="Isikan nama perumahan" name="nama_perumahan" value="{{ isset($pemohon->nama_perumahan) ? $pemohon->nama_perumahan : "" }}">
        </div>
    </div>
    <div class="col-sm-3 mt20">
        <div class="form-group">
            <label class="control-label center-block"><strong>Kecamatan </strong></label>
            <select  class="form-control select2" id="kecamatan2-update" style="width: 100%" data-placeholder="Pilih kecamatan alamat perumahan" name="alamat_kecamatan_perumahan" >
                <option value="">&nbsp;</option>
                @foreach ($kecamatan as $k)
                @php
                $alamatKecamatanPerumahan = isset($pemohon->alamat_kecamatan_perumahan) ? $pemohon->alamat_kecamatan_perumahan : "";
                @endphp
                    <option value="{{ $k->id }}" data-kode="{{ $k->kode }}"
                        @if ($alamatKecamatanPerumahan == $k->id)
                        selected
                        @endif
                        >{{ $k->nama }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-sm-3 mt20">
        <div class="form-group">
            <label class="control-label center-block"><strong>Kelurahan</strong></label>
            <select  class="form-control" id="kelurahan2-update" style="width: 100%"  name="alamat_kelurahan_perumahan">
                @foreach ($kelurahan as $kel)
                    @php
                    $alamatKelurahanPerumahan = isset($pemohon->alamat_kelurahan_perumahan) ? $pemohon->alamat_kelurahan_perumahan : "";
                    @endphp
                    <option value="{{ $kel->id }}" 
                        @if ($alamatKelurahanPerumahan == $kel->id)
                            selected
                        @endif
                        >{{ $kel->nama }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-sm-3 mt20">
        <div class="form-group">
            <label class="control-label center-block"><strong>Jalan</strong></label>
            <input type="text" class="form-control" placeholder="Isikan nama jalan perumahan" name="alamat_jalan_perumahan" value="{{ isset($pemohon->alamat_jalan_perumahan) ? $pemohon->alamat_jalan_perumahan : "" }}">
        </div>
    </div>
    <div class="col-sm-1 mt20">
        <div class="form-group">
            <label class="control-label center-block"><strong>RT/RW</strong></label>
            <input type="text" class="form-control" placeholder="RT/RW" name="alamat_rt_perumahan" value="{{ isset($pemohon->alamat_rt_perumahan) ? $pemohon->alamat_rt_perumahan : "" }}">
        </div>
    </div>

    <div class="col-sm-2 mt20">
        <div class="form-group">
            <label class="control-label center-block"><strong>Kode Pos</strong></label>
            <input type="text" class="form-control" placeholder="Kode Pos" name="alamat_kodepos_perumahan" value="{{ isset($pemohon->alamat_kodepos_perumahan) ? $pemohon->alamat_kodepos_perumahan : "" }}">
        </div>
    </div>
    <div class="col-sm-3 mt20">
        <div class="form-group">
            <label class="control-label center-block"><strong>Luas Lahan</strong></label>
            <input type="text" class="form-control" placeholder="Isikan luas lahan perumahan" name="luas_lahan" value="{{ isset($pemohon->luas_lahan) ? $pemohon->luas_lahan : "" }}">
        </div>
    </div>
    <div class="col-sm-3 mt20">
        <div class="form-group">
            <label class="control-label center-block"><strong>Luas Kavling</strong></label>
            <input type="text" class="form-control" id="luas-kavling" placeholder="Isikan luas kavling" name="luas_kavling" value="{{ isset($pemohon->luas_kavling) ? $pemohon->luas_kavling : "" }}">
        </div>
    </div>
    <div class="col-sm-3 mt20">
        <div class="form-group">
            <label class="control-label center-block"><strong>Luas Prasarana dan Utilitas</strong></label>
            <input type="text" class="form-control" placeholder="Isikan luas prasarana perumahan" name="luas_prasarana" value="{{ isset($pemohon->luas_prasarana) ? $pemohon->luas_prasarana : "" }}">
        </div>
    </div>
    <div class="col-sm-3 mt20">
        <div class="form-group">
            <label class="control-label center-block"><strong>Luas Sarana</strong></label>
            <input  type="text" class="form-control format-ukuran" placeholder="" name="luas_sarana" value="{{ isset($pemohon->luas_sarana) ? $pemohon->luas_sarana : "" }}">
        </div>
    </div>
    <div class="col-sm-3 mt20">
        <div class="form-group">
            <label class="control-label center-block"><strong>Luas RTH</strong></label>
            <input type="text" class="form-control" placeholder="Isikan luas RTH perumahan" name="luas_rth" value="{{ isset($pemohon->luas_rth) ? $pemohon->luas_rth : "" }}">
        </div>
    </div>
    <div class="col-sm-6 mt20">
        <div class="form-group">
            <label class="control-label center-block"><strong>Keterangan</strong></label>
            <input type="text" class="form-control" placeholder="Isikan keterangan tambahan" name="keterangan" value="{{ isset($pemohon->keterangan) ? $pemohon->keterangan : "" }}">
        </div>
    </div>
    <div class="col-sm-12 mt20">
        <button class="btn btn-danger btn-lg btn-block" type="submit" id="btn-update-permohonan">UPDATE  </button>
    </div>
    </div>
    </form>
</div>
@else 
<div class="panel-body">
    <div class="col-md-12 mb20">
        <div class="separator"><h4 class="text-success">PEMOHON</h4></div>
    </div>
    @if (session('pemohon'))
        @php $pemohon = session('pemohon') @endphp
    @endif
    <form action="{{ route('permohonan.simpan') }}" method="POST" style="display: block; margin-top: 0em !important" id="form-permohonan">
    @csrf
    <input type="hidden" name="id" id="id_permohonan" @isset($id_permohonan) value="{{ $id_permohonan }}" @endisset>
    <div class="row mb20">
        <div class="col-sm-3 pull-right">
            <label><strong>Pengembang *</strong></label>
            <div class="input-group">
                <select name="pengembang_id" class="form-control" id="pemohon-pengembang">
                        <option value="">---</option>
                    @foreach ($pengembang as $pen)
                        <option value="{{ $pen->id }}">{{ $pen->nama_perusahaan }}</option>
                    @endforeach
                </select>
            <span class="input-group-addon" onclick="location.href = '{{ route('pengembang.create') }}';"><i class="glyphicon glyphicon-plus"></i></span>
            </div>
        </div>
        <div class="col-sm-3 pull-right">
            <div class="form-group">
                <label class="control-label center-block"><strong>Tahun *</strong></label>
                    @php
                        $currently_selected = date('Y');
                        $earliest_year = 1990;
                        $latest_year = date('Y');
                                    print '<select name="tahun" class="form-control select2" style="width: 100% !important">';
                                    print '<option value="">---</option>';
                                        foreach ( range( $latest_year, $earliest_year ) as $i ) {
                                            print '<option  value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
                                        }
                                     print '</select>';
                    @endphp
            </div>
    </div>
    <div class="col-md-12 mt20">
    </div>
    <div class="col-sm-3 ">
        <div class="form-group">
            <label class="control-label"><strong>Nama Pemohon *</strong></label>
            <input type="text" id="pemohon-nama" class="form-control" placeholder="Isikan nama lengkap pemohon" name="nama_lengkap_pengembang" value="{{ isset($pemohon->nama_lengkap_pengembang) ? $pemohon->nama_lengkap_pengembang : "" }}" required>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label class="control-label center-block"><strong>Pekerjaan</strong></label>
            <input type="text" id="pemohon-pekerjaan" class="form-control" placeholder="Isikan pekerjaan pemohon" name="pekerjaan" value="{{ isset($pemohon->pekerjaan) ? $pemohon->pekerjaan : "" }}">
        </div>
    </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label class="control-label center-block"><strong>Jabatan</strong></label>
                <input type="text" id="pemohon-jabatan" class="form-control" placeholder="Isikan jabatan pemohon" name="jabatan" value="{{ isset($pemohon->jabatan) ? $pemohon->jabatan : "" }}">
            </div>
         </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label class="control-label center-block"><strong>Kontak</strong></label>
            <input type="text" id="pemohon-kontak" class="form-control" placeholder="Isikan nomor telp / HP pemohon" name="telp" value="{{ isset($pemohon->telp) ? $pemohon->telp : "" }}">
        </div>
    </div>
    <div class="col-sm-3 mt20">
        <div class="form-group">
            <label class="control-label center-block"><strong>Jalan</strong></label>
            <input type="text" id="pemohon-jalan" class="form-control" placeholder="Isikan nama jalan alamat pemohon" name="alamat_jalan_pengembang" value="{{ isset($pemohon->alamat_jalan_pengembang) ? $pemohon->alamat_jalan_pengembang : "" }}">
        </div>
    </div>
    <div class="col-sm-3 mt20">
        <div class="form-group">
            <label class="control-label center-block"><strong>Kelurahan</strong></label>
            <input type="text" id="pemohon-kelurahan" class="form-control" placeholder="Isikan nama kelurahan alamat pemohon" name="alamat_kelurahan_pengembang" value="{{ isset($pemohon->alamat_kelurahan_pengembang) ? $pemohon->alamat_kelurahan_pengembang : "" }}">
        </div>
    </div>
    <div class="col-sm-3 mt20">
        <div class="form-group">
            <label class="control-label center-block"><strong>Kecamatan</strong></label>
            <input type="text" id="pemohon-kecamatan"class="form-control" placeholder="Isikan nama kecamatan alamat pemohon" name="alamat_kecamatan_pengembang" value="{{ isset($pemohon->alamat_kecamatan_pengembang) ? $pemohon->alamat_kecamatan_pengembang : "" }}">
        </div>
    </div>
    <div class="col-sm-1 mt20">
        <div class="form-group">
            <label class="control-label center-block"><strong>RT/RW</strong></label>
            <input type="text" id="pemohon-rt" class="form-control" placeholder="RT/RW" name="alamat_rt_pengembang" value="{{ isset($pemohon->alamat_rt_pengembang) ? $pemohon->alamat_rt_pengembang : "" }}"> 
        </div>
    </div>

    <div class="col-sm-2 mt20">
        <div class="form-group">
            <label class="control-label center-block"><strong>Kode Pos</strong></label>
            <input type="text" id="pemohon-kode-pos" class="form-control" placeholder="Kode Pos" name="alamat_kodepos_pengembang" value="{{ isset($pemohon->alamat_kodepos_pengembang) ? $pemohon->alamat_kodepos_pengembang : "" }}">
        </div>
    </div>
    <div class="col-sm-3 mt20">
        <div class="form-group">
            <label class="control-label center-block"><strong>Nomor KTP *</strong></label>
            <input type="text" id="pemohon-ktp" class="form-control" placeholder="Isikan no. KTP pengembang" name="nomor_ktp" value="{{ isset($pemohon->nomor_ktp) ? $pemohon->nomor_ktp : "" }}" required>
        </div>
    </div>
    <div class="col-sm-3 mt20">
        <div class="form-group">
            <label class="control-label center-block"><strong>Nomor Surat Permohonan *</strong></label>
            <input type="text" class="form-control" placeholder="Isikan no. surat permohonan" name="nomor_surat_permohonan" value="{{ isset($pemohon->nomor_surat_permohonan) ? $pemohon->nomor_surat_permohonan : "" }}" required>
        </div>
    </div>
    <div class="col-sm-3 mt20">
            <label class="control-label center-block "><strong>Tanggal Surat Permohonan *</strong></label>
            <div class="input-group">
                <input type="text" class="form-control datepicker" placeholder="mm-dd-yyyy" name="tanggal_surat_permohonan" autocomplete="off" value="{{ isset($pemohon->tanggal_surat_permohonan) ? $pemohon->tanggal_surat_permohonan : "" }}" required>
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            </div>
    </div>

    <div class="col-md-12 mt20">
       <div class="separator"><h4 class="text-success">PERUMAHAN</h4></div>
    </div>

    <div class="col-sm-3 mt20">
        <div class="form-group">
            <label class="control-label center-block"><strong>Nama Perumahan *</strong></label>
            <input type="text" class="form-control" placeholder="Isikan nama perumahan" name="nama_perumahan" value="{{ isset($pemohon->nama_perumahan) ? $pemohon->nama_perumahan : "" }}" required>
        </div>
    </div>
    <div class="col-sm-3 mt20">
        <div class="form-group">
            <label class="control-label center-block"><strong>Kecamatan *</strong></label>
            <select  class="form-control select1 kecamatan2" style="width: 100%" data-placeholder="Pilih kecamatan alamat perumahan" name="alamat_kecamatan_perumahan" required>
                <option value="">&nbsp;</option>
                @foreach ($kecamatan as $k)
                    @php
                        $alamatKecamatanPerumahan = isset($pemohon->alamat_kecamatan_perumahan) ? $pemohon->alamat_kecamatan_perumahan : "";
                    @endphp
                    <option value="{{ $k->id }}" data-kode="{{ $k->kode }}"
                        @if ($alamatKecamatanPerumahan == $k->id)
                        selected
                        @endif
                        >{{ $k->nama }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-sm-3 mt20">
        <div class="form-group">
            <label class="control-label center-block"><strong>Kelurahan *</strong></label>
            <select  class="form-control select1 kelurahan2" style="width: 100%" data-placeholder="Kelurahan" name="alamat_kelurahan_perumahan" required>
                <option value="">--Pilih kelurahan alamat perumahan--</option>
                @foreach ($kelurahan as $kel)
                        @php
                        $alamatKelurahanPerumahan = isset($pemohon->alamat_kelurahan_perumahan) ? $pemohon->alamat_kelurahan_perumahan : "";
                        @endphp
                    <option value="{{ $kel->id }}"
                        @if ($alamatKelurahanPerumahan == $kel->id)
                            selected
                        @endif
                        >{{ $kel->nama }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-sm-3 mt20">
        <div class="form-group">
            <label class="control-label center-block"><strong>Jalan *</strong></label>
            <input type="text" class="form-control" placeholder="Isikan nama jalan perumahan" name="alamat_jalan_perumahan" value="{{ isset($pemohon->alamat_jalan_perumahan) ? $pemohon->alamat_jalan_perumahan : "" }}" required>
        </div>
    </div>
    <div class="col-sm-1 mt20">
        <div class="form-group">
            <label class="control-label center-block"><strong>RT/RW</strong></label>
            <input type="text" class="form-control" placeholder="RT/RW" name="alamat_rt_perumahan" value="{{ isset($pemohon->alamat_rt_perumahan) ? $pemohon->alamat_rt_perumahan : "" }}">
        </div>
    </div>

    <div class="col-sm-2 mt20">
        <div class="form-group">
            <label class="control-label center-block"><strong>Kode Pos</strong></label>
            <input type="text" class="form-control" placeholder="Kode Pos" name="alamat_kodepos_perumahan" value="{{ isset($pemohon->alamat_kodepos_perumahan) ? $pemohon->alamat_kodepos_perumahan : "" }}">
        </div>
    </div>
    <div class="col-sm-3 mt20">
        <div class="form-group">
            <label class="control-label center-block"><strong>Luas Lahan (m<sup>2</sup>)</strong></label>
            <input type="text"  class="form-control" id="luas-lahan" placeholder="Isikan luas lahan perumahan" name="luas_lahan" >
        </div>
    </div>
    <div class="col-sm-3 mt20">
        <div class="form-group">
            <label class="control-label center-block"><strong>Luas Kavling (m<sup>2</sup>)</strong></label>
            <input type="text" class="form-control" id="luas-kavling" placeholder="Isikan luas kavling" name="luas_kavling">
        </div>
    </div>

    <div class="col-sm-3 mt20">
        <div class="form-group">
            <label class="control-label center-block"><strong>Luas Prasarana dan Utilitas (m<sup>2</sup>)</strong></label>
            <input type="text" class="form-control" id="luas-prasarana" placeholder="Isikan luas prasarana perumahan" name="luas_prasarana">
        </div>
    </div>
    <div class="col-sm-3 mt20">
        <div class="form-group">
            <label class="control-label center-block"><strong>Luas Sarana (m<sup>2</sup>)</strong></label>
            <input type="text" class="form-control" id="luas-sarana" placeholder="Isikan luas sarana" name="luas_sarana">
        </div>
    </div>
    <div class="col-sm-3 mt20">
        <div class="form-group">
            <label class="control-label center-block"><strong>Luas RTH (m<sup>2</sup>)</strong></label>
            <input type="text" class="form-control" id="luas-rth" placeholder="Isikan luas RTH perumahan" name="luas_rth" >
        </div>
    </div>
    <div class="col-sm-6 mt20">
        <div class="form-group">
            <label class="control-label center-block"><strong>Keterangan</strong></label>
            <input type="text" class="form-control" placeholder="Isikan keterangan tambahan" name="keterangan" >
        </div>
    </div>
    <div class="col-sm-12 mt20">
        <button class="btn btn-danger btn-lg btn-block" type="submit" id="btn-permohonan">SIMPAN</button>
    </div>
    </div>
    </form>
</div>

@endif
