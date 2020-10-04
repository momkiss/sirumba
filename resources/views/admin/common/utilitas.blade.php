@if ($form == "edit")
<div class="col-md-12">
    <h3 class="mb20"><i class="fa fa-edit"></i> EDIT UTILITAS</h3><hr style="margin-bottom: 10px">
</div>
<div class="panel-body">
    <div class="row">
        <form action="{{ route('utilitas.update', $pemohon->id) }}" method="POST" id="form-utilitas-update">
            @csrf
        <input type="hidden" value="{{ $pemohon->id }}" name="pemohon_id" id="utilitas_id_permohonan_update">
            <div class="wrap_penerangan_jalan mb-40">
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label text-success"><strong>1. PENERANGAN JALAN UMUM</strong></label>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label center-block"><strong>TERSEDIA</strong></label>
                                <label class="rdiobox rdiobox-success rdiobox-inline mr20">
                                <input type="hidden" name="id_penerangan_jalan" value="{{ $pemohon->peneranganjalan->id ?? ""}} ">
                                    <input type="radio" name="penerangan_jalan" value="Ada" @if(isset($pemohon->peneranganjalan)) @if ($pemohon->peneranganjalan->tersedia == "Ada")
                                        checked
                                    @endif
                                    @endif>
                                    <span>Ada</span>
                                </label>
                                <label class="rdiobox rdiobox-danger rdiobox-inline">
                                    <input type="radio" name="penerangan_jalan" value="Tidak" @if(isset($pemohon->peneranganjalan)) @if ($pemohon->peneranganjalan->tersedia == "Tidak")
                                        checked
                                    @endif
                                    @endif>
                                    <span>Tidak</span>
                                </label>
                            </div>
                        </div>
                          <div class="col-sm-3">
                                <label class="control-label center-block"><strong>KETERANGAN</strong></label>
                                <input type="text" name="penerangan_jalan_keterangan" class="form-control"  value="{{ $pemohon->peneranganjalan->keterangan ?? "" }}">
                            </div>
                    </div>
                </div>

                <div class="wrap_air mb-40">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label text-success"><strong>2. JARINGAN AIR
                                    BERSIH</strong></label>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="control-label center-block"><strong>TERSEDIA</strong></label>
                                    <label class="rdiobox rdiobox-success rdiobox-inline mr20">
                                        <input type="hidden" name="id_air_bersih" value="{{ $pemohon->airbersih->id ?? "" }}">
                                        <input type="radio" name="jaringan_air_bersih" value="Ada" @if(isset($pemohon->airbersih)) @if ($pemohon->airbersih->tersedia  == "Ada")
                                        checked
                                    @endif
                                    @endif>
                                        <span>Ada</span>
                                    </label>
                                    <label class="rdiobox rdiobox-danger rdiobox-inline">
                                        <input type="radio" name="jaringan_air_bersih" value="Tidak" @if(isset($pemohon->airbersih)) @if ($pemohon->airbersih->tersedia  == "Tidak")
                                        checked
                                    @endif
                                    @endif>
                                        <span>Tidak</span>
                                    </label>
                                </div>
                            </div>
                             <div class="col-sm-3">
                                <label class="control-label center-block"><strong>KETERANGAN</strong></label>
                                <input type="text" name="jaringan_air_bersih_keterangan" class="form-control"  value="{{ $pemohon->airbersih->keterangan ?? "" }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="wrap_pemadam_kebakaran mb-40">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label text-success"><strong>3. PEMADAM KEBAKARAN</strong></label>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="control-label center-block"><strong>TERSEDIA</strong></label>
                                    <label class="rdiobox rdiobox-success rdiobox-inline mr20">
                                        <input type="hidden" name="id_pemadam_kebakaran" value="{{ $pemohon->pemadamkebakaran->id  ?? ""}}">
                                        <input type="radio" name="pemadam_kebakaran" value="Ada" @if(isset($pemohon->pemadamkebakaran)) @if ($pemohon->pemadamkebakaran->tersedia == "Ada")
                                        checked
                                    @endif
                                    @endif>
                                        <span>Ada</span>
                                    </label>
                                    <label class="rdiobox rdiobox-danger rdiobox-inline">
                                        <input type="radio" name="pemadam_kebakaran" value="Tidak" @if(isset($pemohon->pemadamkebakaran)) @if ($pemohon->pemadamkebakaran->tersedia == "Tidak")
                                        checked
                                    @endif
                                    @endif>
                                        <span>Tidak</span>
                                    </label>
                                </div>
                            </div>
                             <div class="col-sm-3">
                                <label class="control-label center-block"><strong>KETERANGAN</strong></label>
                                <input type="text" name="pemadam_kebakaran_keterangan" class="form-control" value="{{ $pemohon->pemadamkebakaran->keterangan ?? "" }}">
                            </div>
                        </div>
                    </div>
                </div>


                <div class="wrap_listrik mb-40">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label text-success"><strong>4. JARINGAN
                                    LISTRIK</strong></label>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="control-label center-block"><strong>TERSEDIA</strong></label>
                                    <label class="rdiobox rdiobox-success rdiobox-inline mr20">
                                        <input type="hidden" name="id_jaringan_listrik" value="{{ $pemohon->listrik->id ?? "" }}">
                                        <input type="radio" name="jaringan_listrik" value="Ada"  @if(isset($pemohon->listrik)) @if ($pemohon->listrik->tersedia == "Ada")
                                        checked
                                    @endif
                                    @endif>
                                        <span>Ada</span>
                                    </label>
                                    <label class="rdiobox rdiobox-danger rdiobox-inline">
                                        <input type="radio" name="jaringan_listrik" value="Tidak"  @if(isset($pemohon->listrik)) @if ($pemohon->listrik->tersedia == "Tidak")
                                        checked
                                    @endif
                                    @endif>
                                        <span>Tidak</span>
                                    </label>
                                </div>
                            </div>
                             <div class="col-sm-3">
                                <label class="control-label center-block"><strong>KETERANGAN</strong></label>
                                <input type="text" name="jaringan_listrik_keterangan" class="form-control"  value="{{ $pemohon->listrik->keterangan ?? "" }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="wrap_telepon mb-40">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label text-success"><strong>5. JARINGAN
                                    TELEPON</strong></label>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="control-label center-block"><strong>TERSEDIA</strong></label>
                                    <label class="rdiobox rdiobox-success rdiobox-inline mr20">
                                        <input type="hidden" name="id_jaringan_telepon" value="{{ $pemohon->telepon->id ?? "" }}">
                                        <input type="radio" name="jaringan_telepon" value="Ada"  @if(isset($pemohon->telepon)) @if ($pemohon->telepon->tersedia == "Ada")
                                        checked
                                    @endif
                                    @endif>
                                        <span>Ada</span>
                                    </label>
                                    <label class="rdiobox rdiobox-danger rdiobox-inline">
                                        <input type="radio" name="jaringan_telepon" value="Tidak"  @if(isset($pemohon->telepon)) @if ($pemohon->telepon->tersedia == "Tidak")
                                        checked
                                    @endif
                                    @endif>
                                        <span>Tidak</span>
                                    </label>
                                </div>
                            </div>
                             <div class="col-sm-3">
                                <label class="control-label center-block"><strong>KETERANGAN</strong></label>
                                <input type="text" name="jaringan_telepon_keterangan" class="form-control"  value="{{ $pemohon->telepon->keterangan ?? "" }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="wrap_gas mb-40">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label text-success"><strong>6. JARINGAN GAS</strong></label>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="control-label center-block"><strong>TERSEDIA</strong></label>
                                    <label class="rdiobox rdiobox-success rdiobox-inline mr20">
                                        <input type="hidden" name="id_jaringan_gas" value="{{ $pemohon->gas->id ?? "" }}">
                                        <input type="radio" name="jaringan_gas" value="Ada"  @if(isset($pemohon->gas)) @if ($pemohon->gas->tersedia  == "Ada")
                                        checked
                                    @endif
                                    @endif>
                                        <span>Ada</span>
                                    </label>
                                    <label class="rdiobox rdiobox-danger rdiobox-inline">
                                        <input type="radio" name="jaringan_gas" value="Tidak"  @if(isset($pemohon->gas)) @if ($pemohon->gas->tersedia  == "Tidak")
                                        checked
                                    @endif
                                    @endif>
                                        <span>Tidak</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label class="control-label center-block"><strong>KETERANGAN</strong></label>
                                <input type="text" name="jaringan_gas_keterangan" class="form-control" value="{{ $pemohon->gas->keterangan ?? "" }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="wrap_transportasi mb-40">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label text-success"><strong>7. JARINGAN
                                    TRANSPORTASI</strong></label>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="control-label center-block"><strong>TERSEDIA</strong></label>
                                    <label class="rdiobox rdiobox-success rdiobox-inline mr20">
                                        <input type="hidden" name="id_jaringan_transportasi" value="{{ $pemohon->transportasi->id ?? "" }}">
                                        <input type="radio" name="jaringan_transportasi" value="Ada"  @if(isset($pemohon->transportasi)) @if ($pemohon->transportasi->tersedia == "Ada")
                                        checked
                                    @endif
                                    @endif>
                                        <span>Ada</span>
                                    </label>
                                    <label class="rdiobox rdiobox-danger rdiobox-inline">
                                        <input type="radio" name="jaringan_transportasi" value="Tidak"  @if(isset($pemohon->transportasi)) @if ($pemohon->transportasi->tersedia == "Tidak")
                                        checked
                                    @endif
                                    @endif>
                                        <span>Tidak</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label class="control-label center-block"><strong>KETERANGAN</strong></label>
                                <input type="text" name="jaringan_transportasi_keterangan" class="form-control"  value="{{ $pemohon->transportasi->keterangan ?? "" }}">
                            </div>
                        </div>
                    </div>
                </div>


                <div class="wrap_penerangan mb-40">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label text-success"><strong>8. GORONG-GORONG</strong></label>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="control-label center-block"><strong>TERSEDIA</strong></label>
                                    <label class="rdiobox rdiobox-success rdiobox-inline mr20">
                                        <input type="hidden" name="id_gorong_gorong" value="{{ $pemohon->gorong->id ?? "" }}">
                                        <input type="radio" name="gorong_gorong" value="Ada"  @if(isset($pemohon->gorong)) @if ($pemohon->gorong->tersedia == "Ada")
                                        checked
                                    @endif
                                    @endif>
                                        <span>Ada</span>
                                    </label>
                                    <label class="rdiobox rdiobox-danger rdiobox-inline">
                                        <input type="radio" name="gorong_gorong" value="Tidak"  @if(isset($pemohon->gorong)) @if ($pemohon->gorong->tersedia == "Tidak")
                                        checked
                                    @endif
                                    @endif>
                                        <span>Tidak</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label class="control-label center-block"><strong>KETERANGAN</strong></label>
                                <input type="text" name="gorong_gorong_keterangan" class="form-control"  value="{{ $pemohon->gorong->keterangan ?? "" }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="wrap_penerangan mb-40">
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label text-success"><strong>9. DRAINASE</strong></label>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label center-block"><strong>TERSEDIA</strong></label>
                                 <label class="rdiobox rdiobox-success rdiobox-inline mr20">
                                        <input type="hidden" name="id_drainase" value="{{ $pemohon->drainase->id ?? "" }}">
                                        <input type="radio" name="drainase" value="Ada"  @if(isset($pemohon->drainase)) @if ($pemohon->drainase->tersedia == "Ada")
                                        checked
                                    @endif
                                    @endif>
                                        <span>Ada</span>
                                    </label>
                                    <label class="rdiobox rdiobox-danger rdiobox-inline">
                                        <input type="radio" name="drainase" value="Tidak"  @if(isset($pemohon->drainase)) @if ($pemohon->drainase->tersedia == "Tidak")
                                        checked
                                    @endif
                                    @endif>
                                        <span>Tidak</span>
                                    </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="control-label center-block"><strong>KETERANGAN</strong></label>
                            <input type="text" name="drainase_keterangan" class="form-control" value="{{ $pemohon->drainase->keterangan ?? "" }}">
                        </div>
                    </div>
                </div>
            </div>
                <div class="form-group">
                    <button  class="btn btn-danger btn-lg btn-block ">UPDATE<button>
                </div>
            </div>
    </div>
    </form>
</div>
@else 
<div class="panel-body">
    <div class="row">
        <form action="{{ route('utilitas.store') }}" method="POST" id="form-utilitas">
            
            @csrf
        <input type="hidden" value="@isset($id_permohonan) {{ $id_permohonan }} @endisset" name="pemohon_id" id="utilitas_id_permohonan">
        <div class="wrap_penerangan_jalan mb-40">
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-3 control-label text-success"><strong>1. PENERANGAN JALAN  UMUM</strong></label>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="control-label center-block"><strong>TERSEDIA</strong></label>
                            <label class="rdiobox rdiobox-success rdiobox-inline mr20">
                                <input type="radio" name="penerangan_jalan" value="Ada">
                                <span>Ada</span>
                            </label>
                            <label class="rdiobox rdiobox-danger rdiobox-inline">
                                <input type="radio" name="penerangan_jalan" value="Tidak">
                                <span>Tidak</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <label class="control-label center-block"><strong>KETERANGAN</strong></label>
                        <input type="text" name="penerangan_jalan_keterangan" class="form-control" placeholder="misal: terhubung jalur 1/2/3">
                    </div>
                </div>
            </div>

            <div class="wrap_air mb-40">
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label text-success"><strong>2. JARINGAN AIR
                                BERSIH</strong></label>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label center-block"><strong>TERSEDIA</strong></label>
                                <label class="rdiobox rdiobox-success rdiobox-inline mr20">
                                    <input type="radio" name="jaringan_air_bersih" value="Ada">
                                    <span>Ada</span>
                                </label>
                                <label class="rdiobox rdiobox-danger rdiobox-inline">
                                    <input type="radio" name="jaringan_air_bersih" value="Tidak">
                                    <span>Tidak</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="control-label center-block"><strong>KETERANGAN</strong></label>
                            <input type="text" name="jaringan_air_bersih_keterangan" class="form-control" placeholder="misal: terhubung jalur 1/2/3">
                        </div>
                    </div>
                </div>
            </div>

            <div class="wrap_pemadam_kebakaran mb-40">
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label text-success"><strong>3. PEMADAM KEBAKARAN</strong></label>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label center-block"><strong>TERSEDIA</strong></label>
                                <label class="rdiobox rdiobox-success rdiobox-inline mr20">
                                    <input type="radio" name="pemadam_kebakaran" value="Ada">
                                    <span>Ada</span>
                                </label>
                                <label class="rdiobox rdiobox-danger rdiobox-inline">
                                    <input type="radio" name="pemadam_kebakaran" value="Tidak">
                                    <span>Tidak</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="control-label center-block"><strong>KETERANGAN</strong></label>
                            <input type="text" name="pemadam_kebakaran_keterangan" class="form-control" placeholder="misal: terhubung jalur 1/2/3">
                        </div>
                    </div>
                </div>
            </div>


            <div class="wrap_listrik mb-40">
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label text-success"><strong>4. JARINGAN LISTRIK</strong></label>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label center-block"><strong>TERSEDIA</strong></label>
                                <label class="rdiobox rdiobox-success rdiobox-inline mr20">
                                    <input type="radio" name="jaringan_listrik" value="Ada">
                                    <span>Ada</span>
                                </label>
                                <label class="rdiobox rdiobox-danger rdiobox-inline">
                                    <input type="radio" name="jaringan_listrik" value="Tidak">
                                    <span>Tidak</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="control-label center-block"><strong>KETERANGAN</strong></label>
                            <input type="text" name="jaringan_listrik_keterangan" class="form-control" placeholder="misal: terhubung jalur 1/2/3">
                        </div>
                    </div>
                </div>
            </div>

            <div class="wrap_telepon mb-40">
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label text-success"><strong>5. JARINGAN TELEPON</strong></label>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label center-block"><strong>TERSEDIA</strong></label>
                                <label class="rdiobox rdiobox-success rdiobox-inline mr20">
                                    <input type="radio" name="jaringan_telepon" value="Ada">
                                    <span>Ada</span>
                                </label>
                                <label class="rdiobox rdiobox-danger rdiobox-inline">
                                    <input type="radio" name="jaringan_telepon" value="Tidak">
                                    <span>Tidak</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="control-label center-block"><strong>KETERANGAN</strong></label>
                            <input type="text" name="jaringan_telepon_keterangan" class="form-control" placeholder="misal: terhubung jalur 1/2/3">
                        </div>
                    </div>
                </div>
            </div>

            <div class="wrap_gas mb-40">
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label text-success"><strong>6. JARINGAN GAS</strong></label>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label center-block"><strong>TERSEDIA</strong></label>
                                <label class="rdiobox rdiobox-success rdiobox-inline mr20">
                                    <input type="radio" name="jaringan_gas" value="Ada">
                                    <span>Ada</span>
                                </label>
                                <label class="rdiobox rdiobox-danger rdiobox-inline">
                                    <input type="radio" name="jaringan_gas" value="Tidak">
                                    <span>Tidak</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="control-label center-block"><strong>KETERANGAN</strong></label>
                            <input type="text" name="jaringan_gas_keterangan" class="form-control" placeholder="misal: terhubung jalur 1/2/3">
                        </div>
                    </div>
                </div>
            </div>

            <div class="wrap_transportasi mb-40">
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label text-success"><strong>7. JARINGAN
                                TRANSPORTASI</strong></label>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label center-block"><strong>TERSEDIA</strong></label>
                                <label class="rdiobox rdiobox-success rdiobox-inline mr20">
                                    <input type="radio" name="jaringan_transportasi" value="Ada">
                                    <span>Ada</span>
                                </label>
                                <label class="rdiobox rdiobox-danger rdiobox-inline">
                                    <input type="radio" name="jaringan_transportasi" value="Tidak">
                                    <span>Tidak</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="control-label center-block"><strong>KETERANGAN</strong></label>
                            <input type="text" name="jaringan_transportasi_keterangan" class="form-control" placeholder="misal: terhubung jalur 1/2/3">
                        </div>
                    </div>
                </div>
            </div>


            <div class="wrap_penerangan mb-40">
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label text-success"><strong>8. GORONG-GORONG</strong></label>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label center-block"><strong>TERSEDIA</strong></label>
                                <label class="rdiobox rdiobox-success rdiobox-inline mr20">
                                    <input type="radio" name="gorong_gorong" value="Ada">
                                    <span>Ada</span>
                                </label>
                                <label class="rdiobox rdiobox-danger rdiobox-inline">
                                    <input type="radio" name="gorong_gorong" value="Tidak">
                                    <span>Tidak</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="control-label center-block"><strong>KETERANGAN</strong></label>
                            <input type="text" name="gorong_gorong_keterangan" class="form-control" placeholder="misal: terhubung jalur 1/2/3">
                        </div>
                    </div>
                </div>
            </div>

            <div class="wrap_penerangan mb-40">
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label text-success"><strong>9. DRAINASE</strong></label>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label center-block"><strong>TERSEDIA</strong></label>
                                <label class="rdiobox rdiobox-success rdiobox-inline mr20">
                                    <input type="radio" name="drainase" value="Ada">
                                    <span>Ada</span>
                                </label>
                                <label class="rdiobox rdiobox-danger rdiobox-inline">
                                    <input type="radio" name="drainase" value="Tidak">
                                    <span>Tidak</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="control-label center-block"><strong>KETERANGAN</strong></label>
                            <input type="text" name="drainase_keterangan" class="form-control" placeholder="misal: terhubung jalur 1/2/3">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button id="btn-utilitas" class="btn btn-danger btn-lg btn-block ">SIMPAN</button>
            </div>
        </div>
    </div>
    </form>
</div>
@endif

