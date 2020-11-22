
@if ($form == "edit")
<div class="col-md-12">
    <h3 class="mb20"><i class="fa fa-edit"></i> EDIT SARANA</h3><hr style="margin-bottom: 10px">
</div>
<div class="panel-body">
    <div class="row">
        <form action="{{ route('sarana.update', $pemohon->id) }}" method="POST" id="form-sarana-update">
            @csrf

             <div class="wrap_rth mb-40">
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 mt20 control-label text-success"><strong>1. RUANG TERBUKA HIJAU</strong></label>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label"><strong>JENIS</strong></label>
                            <input type="text" name="rth_jenis" class="form-control"  value="{{ $pemohon->rth->jenis ?? ""  }}">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <label class="control-label center-block"><strong>UKURAN BANGUNAN</strong></label>
                            <input type="text" name="rth_ukuran" class="form-control"  value="{{ $pemohon->rth->ukuran ?? "" }}">
                        </div>
                        <div class="col-sm-2">
                            <label class="control-label center-block"><strong>LUAS LAHAN</strong></label>
                            <input type="text" name="rth_luas_lahan" class="form-control"  value="{{ $pemohon->rth->luas_lahan ?? "" }}">
                        </div>
                        <div class="col-sm-3">
                            <label class="control-label center-block"><strong>KETERANGAN</strong></label>
                            <input type="text" name="rth_keterangan" class="form-control"  value="{{ $pemohon->rth->keterangan ?? "" }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrap_peribadatan mb-40">
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 mt20 control-label text-success"><strong>2. PERIBADATAN</strong></label>
                       <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label"><strong>JENIS</strong></label>
                                <input type="text" name="ibadah_jenis" class="form-control" value="{{ $pemohon->peribadatan->jenis ?? ""  }}">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <label class="control-label center-block"><strong>UKURAN BANGUNAN</strong></label>
                            <input type="text" name="ibadah_ukuran" class="form-control" value="{{ $pemohon->peribadatan->ukuran ?? ""  }}">
                        </div>
                        <div class="col-sm-2">
                            <label class="control-label center-block"><strong>LUAS LAHAN</strong></label>
                            <input type="text" name="ibadah_luas_lahan" class="form-control" value="{{ $pemohon->peribadatan->luas_lahan ?? ""  }}">
                        </div>
                        <div class="col-sm-3">
                            <label class="control-label center-block"><strong>KETERANGAN</strong></label>
                            <input type="text" name="ibadah_keterangan" class="form-control" value="{{ $pemohon->peribadatan->keterangan ?? ""  }}">
                        </div>
                    </div>
                </div>
            </div>


            <div class="wrap_rekreasi mb-40">
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 mt20 control-label text-success"><strong>3. REKREASI DAN OLAHRAGA</strong></label>
                      <div class="col-sm-2">
                        <div class="form-group">
                            <label class="control-label"><strong>JENIS</strong></label>
                            <input type="text" name="rekreasi_jenis" class="form-control" value="{{ $pemohon->rekreasi->jenis ?? ""  }}">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label class="control-label center-block"><strong>UKURAN BANGUNAN</strong></label>
                        <input type="text" name="rekreasi_ukuran" class="form-control" value="{{ $pemohon->rekreasi->ukuran ?? ""  }}" >
                    </div>
                    <div class="col-sm-2">
                        <label class="control-label center-block"><strong>LUAS LAHAN</strong></label>
                        <input type="text" name="rekreasi_luas_lahan" class="form-control" value="{{ $pemohon->rekreasi->luas_lahan ?? ""  }}">
                    </div>
                    <div class="col-sm-3">
                        <label class="control-label center-block"><strong>KETERANGAN</strong></label>
                        <input type="text" name="rekreasi_keterangan" class="form-control" value="{{ $pemohon->rekreasi->keterangan ?? ""  }}">
                    </div>
                    </div>
                </div>
            </div>

            <div class="wrap_pendidikan mb-40">
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 mt20 control-label text-success"><strong>4. PENDIDIKAN</strong></label>
                       <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label"><strong>JENIS</strong></label>
                                <input type="text" name="pendidikan_jenis" class="form-control" value="{{ $pemohon->pendidikan->jenis ?? ""  }}">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <label class="control-label center-block"><strong>UKURAN BANGUNAN</strong></label>
                            <input type="text" name="pendidikan_ukuran" class="form-control" value="{{ $pemohon->pendidikan->ukuran ?? ""  }}">
                        </div>
                        <div class="col-sm-2">
                            <label class="control-label center-block"><strong>LUAS LAHAN</strong></label>
                            <input type="text" name="pendidikan_luas_lahan" class="form-control" value="{{ $pemohon->pendidikan->luas_lahan ?? ""  }}">
                        </div>
                        <div class="col-sm-3">
                            <label class="control-label center-block"><strong>KETERANGAN</strong></label>
                            <input type="text" name="pendidikan_keterangan" class="form-control" value="{{ $pemohon->pendidikan->keterangan ?? ""  }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="wrap_kesehatan mb-40">
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 mt20 control-label text-success"><strong>5. KESEHATAN</strong></label>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label"><strong>JENIS</strong></label>
                                <input type="text" name="kesehatan_jenis" class="form-control" value="{{ $pemohon->kesehatan->jenis ?? ""  }}">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <label class="control-label center-block"><strong>UKURAN BANGUNAN</strong></label>
                            <input type="text" name="kesehatan_ukuran" class="form-control" value="{{ $pemohon->kesehatan->ukuran ?? ""  }}">
                        </div>
                        <div class="col-sm-2">
                            <label class="control-label center-block"><strong>LUAS LAHAN</strong></label>
                            <input type="text" name="kesehatan_luas_lahan" class="form-control" value="{{ $pemohon->kesehatan->luas_lahan ?? ""  }}">
                        </div>
                        <div class="col-sm-3">
                            <label class="control-label center-block"><strong>KETERANGAN</strong></label>
                            <input type="text" name="kesehatan_keterangan" class="form-control" value="{{ $pemohon->kesehatan->keterangan ?? ""  }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="wrap_perniagaan mb-40">
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 mt20 control-label text-success"><strong>6. PERNIAGAAN</strong></label>
                            <div class="col-sm-2">
                                    <div class="form-group">
                                        <label class="control-label"><strong>JENIS</strong></label>
                                        <input type="text" name="perniagaan_jenis" class="form-control" value="{{ $pemohon->perniagaan->jenis ?? ""  }}">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <label class="control-label center-block"><strong>UKURAN BANGUNAN</strong></label>
                                    <input type="text" name="perniagaan_ukuran" class="form-control" value="{{ $pemohon->perniagaan->ukuran ?? ""  }}">
                                </div>
                                <div class="col-sm-2">
                                    <label class="control-label center-block"><strong>LUAS LAHAN</strong></label>
                                    <input type="text" name="perniagaan_luas_lahan" class="form-control" value="{{ $pemohon->perniagaan->luas_lahan ?? ""  }}">
                                </div>
                                <div class="col-sm-3">
                                    <label class="control-label center-block"><strong>KETERANGAN</strong></label>
                                    <input type="text" name="perniagaan_keterangan" class="form-control" value="{{ $pemohon->perniagaan->keterangan ?? ""  }}">
                                </div>
                    </div>
                </div>
            </div>

            <div class="wrap_pelayanan_umum mb-40">
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 mt20 control-label text-success"><strong>7. PELAYANAN UMUM DAN
                                PEMERINTAHAN</strong></label>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label"><strong>JENIS</strong></label>
                                <input type="text" name="umum_jenis" class="form-control" value="{{ $pemohon->pelayananumum->jenis ?? ""  }}">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <label class="control-label center-block"><strong>UKURAN BANGUNAN</strong></label>
                            <input type="text" name="umum_ukuran" class="form-control" value="{{ $pemohon->pelayananumum->ukuran ?? ""  }}">
                        </div>
                        <div class="col-sm-2">
                            <label class="control-label center-block"><strong>LUAS LAHAN</strong></label>
                            <input type="text" name="umum_luas_lahan" class="form-control" value="{{ $pemohon->pelayananumum->luas_lahan ?? ""  }}">
                        </div>
                        <div class="col-sm-3">
                            <label class="control-label center-block"><strong>KETERANGAN</strong></label>
                            <input type="text" name="umum_keterangan" class="form-control" value="{{ $pemohon->pelayananumum->keterangan ?? ""  }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="wrap_parkir mb-40">
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 mt20 control-label text-success"><strong>8. PARKIR</strong></label>
                     <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label"><strong>JENIS</strong></label>
                                <input type="text" name="parkir_jenis" class="form-control" value="{{ $pemohon->parkir->jenis ?? ""  }}">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <label class="control-label center-block"><strong>UKURAN BANGUNAN</strong></label>
                            <input type="text" name="parkir_ukuran" class="form-control" value="{{ $pemohon->parkir->ukuran ?? ""  }}">
                        </div>
                        <div class="col-sm-2">
                            <label class="control-label center-block"><strong>LUAS LAHAN</strong></label>
                            <input type="text" name="parkir_luas_lahan" class="form-control" value="{{ $pemohon->parkir->luas_lahan ?? ""  }}">
                        </div>
                        <div class="col-sm-3">
                            <label class="control-label center-block"><strong>KETERANGAN</strong></label>
                            <input type="text" name="parkir_keterangan" class="form-control" value="{{ $pemohon->parkir->keterangan ?? ""  }}">
                        </div>
                    </div>
                </div>
            </div>
            <button  class="btn btn-danger btn-lg btn-block ">UPDATE</button>
        </form>
    </div>
</div>
@else 
<div class="panel-body">
    <div class="row">
        <form action="{{ route('sarana.simpan') }}" method="POST" id="form-sarana">
            @csrf
            <input type="hidden" value="@isset($pemohon->id) {{ $pemohon->id }} @endisset" name="pemohon_id" id="sarana_id_permohonan">
            <div class="wrap_rth mb-40">
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 mt20 control-label text-success"><strong>1. RUANG TERBUKA HIJAU</strong></label>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label"><strong>JENIS</strong></label>
                                <input type="text" name="rth_jenis" class="form-control" placeholder="Misal. Taman">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <label class="control-label center-block"><strong>UKURAN BANGUNAN</strong></label>
                            <input type="text" name="rth_ukuran" class="form-control" placeholder="Misal. 10x20 ">
                        </div>
                        <div class="col-sm-2">
                            <label class="control-label center-block"><strong>LUAS LAHAN</strong></label>
                            <input type="text" name="rth_luas_lahan" class="form-control" placeholder="Isikan luas lahan/bangunan">
                        </div>
                        <div class="col-sm-3">
                            <label class="control-label center-block"><strong>KETERANGAN</strong></label>
                            <input type="text" name="rth_keterangan" class="form-control" placeholder="Isikan keterangan jika ada">
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrap_peribadatan mb-40">
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 mt20 control-label text-success"><strong>2. PERIBADATAN</strong></label>
                       <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label"><strong>JENIS</strong></label>
                                <input type="text" name="ibadah_jenis" class="form-control" placeholder="Misal. Masjid/Langgar/Musholla">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <label class="control-label center-block"><strong>UKURAN BANGUNAN</strong></label>
                            <input type="text" name="ibadah_ukuran" class="form-control" placeholder="Misal. 10x20 ">
                        </div>
                        <div class="col-sm-2">
                            <label class="control-label center-block"><strong>LUAS LAHAN</strong></label>
                            <input type="text" name="ibadah_luas_lahan" class="form-control" placeholder="Isikan luas lahan/bangunan">
                        </div>
                        <div class="col-sm-3">
                            <label class="control-label center-block"><strong>KETERANGAN</strong></label>
                            <input type="text" name="ibadah_keterangan" class="form-control" placeholder="Isikan keterangan jika ada">
                        </div>
                    </div>
                </div>
            </div>


            <div class="wrap_rekreasi mb-40">
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 mt20 control-label text-success"><strong>3. REKREASI DAN OLAHRAGA</strong></label>
                      <div class="col-sm-2">
                        <div class="form-group">
                            <label class="control-label"><strong>JENIS</strong></label>
                            <input type="text" name="rekreasi_jenis" class="form-control" placeholder="Isikan jenis rekreasi keluarga">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <label class="control-label center-block"><strong>UKURAN BANGUNAN</strong></label>
                        <input type="text" name="rekreasi_ukuran" class="form-control" placeholder="Misal. 10x20 ">
                    </div>
                    <div class="col-sm-2">
                        <label class="control-label center-block"><strong>LUAS LAHAN</strong></label>
                        <input type="text" name="rekreasi_luas_lahan" class="form-control" placeholder="Isikan luas lahan/bangunan">
                    </div>
                    <div class="col-sm-3">
                        <label class="control-label center-block"><strong>KETERANGAN</strong></label>
                        <input type="text" name="rekreasi_keterangan" class="form-control" placeholder="Isikan keterangan jika ada">
                    </div>
                    </div>
                </div>
            </div>

            <div class="wrap_pendidikan mb-40">
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 mt20 control-label text-success"><strong>4. PENDIDIKAN</strong></label>
                       <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label"><strong>JENIS</strong></label>
                                <input type="text" name="pendidikan_jenis" class="form-control" placeholder="Misal. TK/SD/SLTP">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <label class="control-label center-block"><strong>UKURAN BANGUNAN</strong></label>
                            <input type="text" name="pendidikan_ukuran" class="form-control" placeholder="Misal. 10x20 ">
                        </div>
                        <div class="col-sm-2">
                            <label class="control-label center-block"><strong>LUAS LAHAN</strong></label>
                            <input type="text" name="pendidikan_luas_lahan" class="form-control" placeholder="Isikan luas lahan/bangunan">
                        </div>
                        <div class="col-sm-3">
                            <label class="control-label center-block"><strong>KETERANGAN</strong></label>
                            <input type="text" name="pendidikan_keterangan" class="form-control" placeholder="Isikan keterangan jika ada">
                        </div>
                    </div>
                </div>
            </div>

            <div class="wrap_kesehatan mb-40">
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 mt20 control-label text-success"><strong>5. KESEHATAN</strong></label>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label"><strong>JENIS</strong></label>
                                <input type="text" name="kesehatan_jenis" class="form-control" placeholder="Misal. Puskemas">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <label class="control-label center-block"><strong>UKURAN BANGUNAN</strong></label>
                            <input type="text" name="kesehatan_ukuran" class="form-control" placeholder="Misal. 10x20 ">
                        </div>
                        <div class="col-sm-2">
                            <label class="control-label center-block"><strong>LUAS LAHAN</strong></label>
                            <input type="text" name="kesehatan_luas_lahan" class="form-control" placeholder="Isikan luas lahan/bangunan">
                        </div>
                        <div class="col-sm-3">
                            <label class="control-label center-block"><strong>KETERANGAN</strong></label>
                            <input type="text" name="kesehatan_keterangan" class="form-control" placeholder="Isikan keterangan jika ada">
                        </div>
                    </div>
                </div>
            </div>

            <div class="wrap_perniagaan mb-40">
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 mt20 control-label text-success"><strong>6. PERNIAGAAN</strong></label>
                            <div class="col-sm-2">
                                    <div class="form-group">
                                        <label class="control-label"><strong>JENIS</strong></label>
                                        <input type="text" name="perniagaan_jenis" class="form-control" placeholder="Misal. Pasar Tradisional">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <label class="control-label center-block"><strong>UKURAN BANGUNAN</strong></label>
                                    <input type="text" name="perniagaan_ukuran" class="form-control" placeholder="Misal. 10x20 ">
                                </div>
                                <div class="col-sm-2">
                                    <label class="control-label center-block"><strong>LUAS LAHAN</strong></label>
                                    <input type="text" name="perniagaan_luas_lahan" class="form-control" placeholder="Isikan luas lahan/bangunan">
                                </div>
                                <div class="col-sm-3">
                                    <label class="control-label center-block"><strong>KETERANGAN</strong></label>
                                    <input type="text" name="perniagaan_keterangan" class="form-control" placeholder="Isikan keterangan jika ada">
                                </div>
                    </div>
                </div>
            </div>

            <div class="wrap_pelayanan_umum mb-40">
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 mt20 control-label text-success"><strong>7. PELAYANAN UMUM DAN
                                PEMERINTAHAN</strong></label>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label"><strong>JENIS</strong></label>
                                <input type="text" name="umum_jenis" class="form-control" placeholder="Isikan jenis pelayanan umum">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <label class="control-label center-block"><strong>UKURAN BANGUNAN</strong></label>
                            <input type="text" name="umum_ukuran" class="form-control" placeholder="Misal. 10x20 ">
                        </div>
                        <div class="col-sm-2">
                            <label class="control-label center-block"><strong>LUAS LAHAN</strong></label>
                            <input type="text" name="umum_luas_lahan" class="form-control" placeholder="Isikan luas lahan/bangunan">
                        </div>
                        <div class="col-sm-3">
                            <label class="control-label center-block"><strong>KETERANGAN</strong></label>
                            <input type="text" name="umum_keterangan" class="form-control" placeholder="Isikan keterangan jika ada">
                        </div>
                    </div>
                </div>
            </div>

            <div class="wrap_parkir mb-40">
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 mt20 control-label text-success"><strong>8. PARKIR</strong></label>
                     <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label"><strong>JENIS</strong></label>
                                <input type="text" name="parkir_jenis" class="form-control" placeholder="Isikan jenis parkir">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <label class="control-label center-block"><strong>UKURAN BANGUNAN</strong></label>
                            <input type="text" name="parkir_ukuran" class="form-control" placeholder="Misal. 10x20 ">
                        </div>
                        <div class="col-sm-2">
                            <label class="control-label center-block"><strong>LUAS LAHAN</strong></label>
                            <input type="text" name="parkir_luas_lahan" class="form-control" placeholder="Isikan luas lahan/bangunan">
                        </div>
                        <div class="col-sm-3">
                            <label class="control-label center-block"><strong>KETERANGAN</strong></label>
                            <input type="text" name="parkir_keterangan" class="form-control" placeholder="Isikan keterangan jika ada">
                        </div>
                    </div>
                </div>
            </div>
            <button id="btn-sarana" class="btn btn-danger btn-lg btn-block btn-next-sarana"><i class="glyphicon glyphicon-floppy-save"></i> SIMPAN</button>
        </form>
    </div>
</div>
@endif
